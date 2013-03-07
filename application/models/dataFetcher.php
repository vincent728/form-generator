<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataFetcher extends CI_Model {

    /**
     * @method :method to load all existed sections
     * @param :none
     * @return results
     * 
     */
    public function sectionsLoader() {

        $sql = "select* from section_tbl";
        $results = $this->db->query($sql);
        return $results;
    }

    /**
     * @method :select specific subsection if existing
     * @param: section id
     * @return subsection
     *  
     */
    public function subsectionLoader($id) {

        $sql = "select subsections_id,subsections,subsections.section_id from subsections,section_tbl
          where 
           subsections.section_id=section_tbl.section_id and
           section_tbl.section_id='$id'";
        $results = $this->db->query($sql);
        return $results;
    }
    
    /**
 * 
 * @Method : load all the categories
 * @param section Id
 * @return results
 */
public function categoriesLoaderwithoutsubsections($id) {
  
   $sql="select cat_name,categories.cat_id,section_tbl.section_id 
        from categories
        inner join section_tbl 
        on categories.section_id=section_tbl.section_id
        where section_tbl.section_id='$id'"; 
   
   $results=$this->db->query($sql);
   return $results;
}


    /**
 * 
 * @Method : Load all the categories
 * @param section Id
 * @return results
 */
public function categoriesLoader($id,$subcatid) {
    
   $sql="select cat_name,categories.cat_id,section_tbl.section_id 
        from categories
        inner join section_tbl 
        on categories.section_id=section_tbl.section_id
        where section_tbl.section_id='$id' and
              categories.subsections_id='$subcatid'"; 
   
   $results=$this->db->query($sql);
   return $results;
}


   /**
 * 
 * @Method : Load all the categories
 * @param section Id
 * @return results
 */
////////////////////////////////////////////////////////////////////////////////////////
public function categoriesautoLoader($subsectionid) {
    
   $sql="select cat_name,categories.cat_id,section_tbl.section_id 
        from categories
        inner join section_tbl 
        on categories.section_id=section_tbl.section_id
        where  categories.subsections_id='$subsectionid'"; 
   
   $results=$this->db->query($sql);
   return $results;
}
////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @method load the input types
     * @param none
     * @return results 
     */
    public function inputTypesLoader() {

        $sql = "select* from input_type_tbl";
        $results = $this->db->query($sql);
        return $results;
    }

    /**
     * @method :select form title
     *  @param section id
     * @return results (form title)
     * 
     */
    public function getformTitle($id) {

        $sql = "select section_name from section_tbl where section_id='$id'";
        $results = $this->db->query($sql);

        if ($results) {

            $name = '';
            foreach ($results->result_array() as $value) {

                $name = $value['section_name'];
            }
            return $name;
        } else {
            return FALSE;
        }
    }

    /**
     * @method :Insert forms name
     * @param section id
     * @return return form id
     * 
     */
    public function insertFormsTitle($section) {

        $title = $this->getformTitle($section);
        $sql = "insert into forms_titles(title) values('$title')";
        $results = $this->db->query($sql);
        $id = $this->db->insert_id();
        return $id;
    }
  ////////////////////////////////////////the discarded algorithm//////////////////////////////////////////////////////////////
    /**
     * @method :Insertion of pre-generated form settings
     * @param: variables
     * @return boolean
     * 
     */
    public function insertFormSettings($selections, $section, $categories_selected) {

        $count = 0;
        
        $last_inserted_ids=array();
        $data=array();
      
        
        foreach ($categories_selected as $key => $value) {
            $sectionId = $section;
            $categoryId = $value;
            $form_id = $this->insertFormsTitle($sectionId);
            //getting selected check box and their corresponding values

            array_push($last_inserted_ids, $form_id);
            
            foreach ($selections as $key => $value) {
                if (!empty($value)) {
                    $checkBoxIndex = $key;
                    $checkBoxSelectedValue = $value;
                           
                    
                    $sql = "INSERT INTO form_tbl(form_id,category_id,section_id,no_input,input_type_id)
              VALUES('$form_id',$categoryId,'$sectionId',$checkBoxSelectedValue,$checkBoxIndex)";

                    $results = $this->db->query($sql);

                    if ($results) {
                        $count++;
                    }
                }
            }
        }
                
       
       $data['last_inserted_ids']=$last_inserted_ids;
       $data['results']=$count;
        
        return $data;
    }
    
   /////////////////////////////////////////end////////////////////////////////////////////// 
    /**
     * @method :get last inserted form
     * @param : Variables
     * @return results
     * 
     * 
   **/
    
 public function getFormDetails($formids) {
     
    
     
     $sql="select label_name,input_tip,forms_titles.form_id,input_name,input_type,max_no_inputs,no_input,title from section_tbl,input_type_tbl,form_label_name_tbl,categories,forms_titles,form_tbl 
          where forms_titles.form_id=form_tbl.form_id and
          section_tbl.section_id=categories.section_id and
          form_tbl.section_id=section_tbl.section_id and
          form_label_name_tbl.input_id=form_tbl.input_type_id and
          
          form_tbl.category_id =categories.cat_id and
          input_type_tbl.input_id=form_tbl.input_type_id and
          forms_titles.form_id='$formids'
          ";
     $results=$this->db->query($sql);
     
     return $results;
     
 }
 
 
 /**
  * 
  * @method: get section name
  * @param: form id
  * @return section name
  */
 public function getSectionName($formId) {
     $sql="select distinct(section_name) from form_tbl,section_tbl,forms_titles
         where form_tbl.form_id=forms_titles.form_id and
         section_tbl.section_id=form_tbl.section_id and
         form_tbl.form_id='$formId'";
     $results=$this->db->query($sql);
     return $results;
     
 }

 
 
 /**
  * @method : fetch form details
  * @param : 
  * @return results
  * 
 **/
public function getfomdetails() {
    
    $sql="select distinct cat_name,category_id from categories,form_tbl,input_type_tbl where 
        categories.cat_id=form_tbl.category_id and
        input_type_tbl.input_id=form_tbl.input_type_id
        ";
    $results=$this->db->query($sql);
    return $results;
    
}


/**
 * @method :load subsections
 * @param: none
 * @return results
 * 
 */

public function loadSubsection($id) {
    
    $sql_new="select distinct cat_name,cat_id,category_id from form_tbl,categories
        where categories.cat_id=form_tbl.category_id and
        categories.cat_id='$id'";
    $results=$this->db->query($sql_new);
    return $results;
   
}

/**load section name and id for sections with no subsections*/

public function loadsection($id) {

    $sql="select distinct cat_name,cat_id from form_tbl,categories where
          form_tbl.sections_without_subsections=categories.subsections_id and
          form_tbl.category_id=categories.cat_id and
          form_tbl.sections_without_subsections='$id'
           ";
    
    $results=$this->db->query($sql);
    return $results;
   
}


/**
 * @method :load sections with no subsections
 * @param :none
 * @return results
 * 
 */
public function loadSectionWithNoSubsections($id) {
    
     $sql="select distinct section_name,section_id from section_tbl,form_tbl where 
        section_tbl.section_id=form_tbl.sections_without_subsections and
        section_tbl.section_id='$id'
         ";
    $results=$this->db->query($sql);
    return $results;
    
}

/**
 * @method: get specific form category information
 * @param:  category id
 * @return results
 * 
 */
public function categoryDetails($id) {
    $data=array();
   
    $sql="select * from categories,form_tbl,input_type_tbl where 
         form_tbl.category_id=categories.cat_id and
        input_type_tbl.input_id=form_tbl.input_type_id and
        form_tbl.category_id='$id'";
    
    $results=$this->db->query($sql);
    
    foreach ($results->result_array() as $value) {
        
            $category_name=$value['cat_name'];
        
    }
    $data['results']=$results;
    $data['category']=$category_name;
    return $data;
}

/**
 * @method: get specific form category information
 * @param:  category id
 * @return results
 * 
 */
public function subcategoryDetails($id) {
    $data=array();
    $sql="select * from section_tbl,form_tbl,categories,input_type_tbl where 
        section_tbl.section_id=categories.section_id and
        categories.subsections_id=form_tbl.sections_without_subsections and
        form_tbl.sections_without_subsections=categories.subsections_id and
        input_type_tbl.input_id=form_tbl.input_type_id and
        form_tbl.category_id=categories.cat_id and
        form_tbl.category_id='$id'
        ";
    $results=$this->db->query($sql);
    
    foreach ($results->result_array() as $value) {
        
            $category_name=$value['cat_name'];
        
    }
    $data['results']=$results;
    $data['category']=$category_name;
    return $data;
}




/**
 * @method :load  repeat events
 * @param :none
 * @return results
 * 
 */
public function getrepeats($id) {
   $sql="select * from repeatevents where repeatevents.repeat_id='$id'";
   $results=$this->db->query($sql);
   return $results;
    
    
}
/**
 * @method :load all options for repeat events
 * @param :none
 * @return results
 * 
 */
public function getAllrepeats() {
    $results=$this->db->get('repeatevents');
    return $results;
    
}


public function generatedformsInformations() {

    $sql_new="select distinct sections_without_subsections,cat_name,category_id,cat_id,section_id from categories,form_tbl 
              where 
              categories.cat_id=form_tbl.category_id
            
              ";
    
   $results=$this->db->query($sql_new);
   return $results;

}



    

}

?>
