<?php

class Mastersearch extends CI_Controller {

    //index page
    public function index() {

        $this->load->view('searchform');
    }

    /* controller function for search filter    */

    public function searchfilter() {

        $results = $this->dataFetcher->subsectionLoader($this->input->post('id'));

        if ($results) {
            //check if the returned results is greater than one

            if ($results->num_rows() > 0) {
                //load subsections and their repective categories

                $checkboxoutput = '';
                foreach ($results->result_array() as $value) {
                    $checkboxoutput.='<option value="' . $value['subsections_id'] . '">' . $value['subsections'] . '</option>';
                }echo form_label('sub-section(s)') . '<select name="subcat" class="autoload" ><option value="">--select an option--</option>' . $checkboxoutput . '</select>' . '</br></br>';
            } else {
                ////////////
                //for sections with no subsections
                $checkboxoutput = '';
                $resultwithnosubsections = $this->dataFetcher->categoriesLoaderwithoutsubsections($this->input->post('id'));
                if ($resultwithnosubsections->num_rows() > 0) {

                    $selectopt_sub = '';
                    foreach ($resultwithnosubsections->result_array() as $subsectionscategorires) {
                        $checkboxoutput.='<option value="' . $subsectionscategorires['cat_id'] . '">' . $subsectionscategorires['cat_name'] . '</option>';
                    }
                    echo form_label('Categorie(s)') . '<select name="cat[]" class="autoload" ><option value="">--select an option--</option>' . $checkboxoutput . '</select>' . '</br></br>';
                    //load sections which does not have some categories
                }
                /////////////
            }

            ///////////////////////////////////////////////////////////////////
        }


        ///////////////////////////////////////////////////////////////////
    }

    /*     * controller function to load categories from subsection */

    public function selectCategory() {

        $results = $this->dataFetcher->categoriesautoLoader($this->input->post('catid'));

        if ($results) {

            if ($results->num_rows() > 0) {
                $concatenator = '';
                foreach ($results->result_array() as $value) {
                    $concatenator.='<option value="' . $value['cat_id'] . '">' . $value['cat_name'] . '</option>';
                }
                echo form_label('categories') . '<select name="cat[]"   class="form-category"><option value="">--select an option--</option>' . $concatenator . '</select>' . '</br></br>';
            }
        }
    }

//end
    public function processorforcreatedsearchform() {
        
              if ($this->input->post('submit')) {

            //validate form select field if the section has  been selected

            $this->form_validation->set_rules('section', 'section', 'required');
            $this->form_validation->set_rules('cat', 'form category', 'required','callback_checkdata_callback');
            $x = $this->input->post('cat');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('formCreator');
            } else {

                //form processing goes here
                $datas = array();
                foreach ($_POST as $key => $value) {

                    ///strip the selected values from dropdown
                    if (strstr($key, "field_")) {

                        ///check if the sections has subsections

                        if (!empty($_POST['cat']) && count($_POST['cat'])) {

                            foreach ($_POST['cat'] as $category) {
                                //check if the submitted data has subsection
                                if (!empty($_POST['subcat'])) {
                                    $subsection = $_POST['subcat'];
                                } else {
                                    $subsection = '';
                                }


                                $arr = explode('_', $key);
                                $checkboxId = $arr[1];
                                $selectedCheckboxValue = $_POST['count_' . $checkboxId];
                                $selectedLabel = $_POST['label_' . $checkboxId];
                                $data['no_input'] = $selectedCheckboxValue;
                                $data['displayorder'] = $_POST['order_'.$checkboxId];
                                $data['input_type_id'] = $checkboxId;
                                $data['sections_without_subsections'] = $subsection;
                                $data['category_id'] = $category;
                                $data['form_label'] = $selectedLabel;
                                $data['input_tip'] = $_POST['tip_' . $checkboxId];

                                $datas[] = $data;
                            }
                        }
                        //end
                    }
                }


                
                $results = $this->db->insert_batch('search_forms', $datas);
                if ($results) {
                    $this->listofcreatedsearchforms();
                } else {
                    $this->load->view('searchform');
                }


                //end the proccessing   
            }
        } else {

            $this->load->view('searchform');
        }
        
        
    }
    
    
    //list of created search forms
    public function listofcreatedsearchforms() {
        $this->load->view('listofsearchforms');
    }
    
    
    
      /*     * controller function for the pop up form anchor */

    public function generateform() {
        $id = $this->uri->segment(3);
        $data = $this->dataFetcher->searchform($id,$table="search_forms");
        $this->load->view('categoryForm', $data);

    }
    
    /* delete search forms*/
    public function deletesearchform() {
         $id = $this->uri->segment(3);
         $results= $this->dataFetcher->deletesearchforms($id,$table="search_forms");
         if($results){
           $this->listofcreatedsearchforms();  
         }
    }
    
    /**load search form*/
    public function loadsearchbox() {
        if($this->input->post('submit')){
            
         $this->form_validation->set_rules('section','section','required');   
         if($this->form_validation->run()==FALSE){
             $this->load->view('user_search_form');
          
         }else{
           $section=$this->input->post('section');  
           $subsection=$this->input->post('subcat');
           $category=$this->input->post('cat');
             
           //chek if is_array
           if(is_array($category)){
              $searchform_category=$category[0]; 
           }else{
               $searchform_category=$category;
              
           }
              $data =$this->dataFetcher->searchform($searchform_category);
              if($data['results']->num_rows()>0){
                  
                 $this->load->view('categoryForm', $data);  
              }else{
                  $this->load->view('location_search_form');  
              }
              
            //load the search form 
         }
            
        }else{
            $this->load->view('user_search_form');
        }
    }
    
    /**check  if data exists**/
    public function checkdata_callback($id) {
                 
           if(!empty($id)){     
           $this->db->where("category_id",$id);  
           $results=$this->db->get('search_forms');
           if($results->num_rows()>0){
             
            $this->form_validation->set_message("checkdata_callback","The %s already exists");
            return FALSE;
           }else{
               return TRUE;  
           }
         }
        
    }
    
    ///form editing goes here
        /** controller function for editing form */
    public function editform() {


        $subchekfilter = $this->uri->segment(3);
        $id = $this->uri->segment(3);
        /* set $table ="search_forms"*/
        $results = $this->dataFetcher->loadsectionfromcategory_test($id,$table='search_forms');
        
        foreach ($results->result_array() as $value) {
            $section_id = $value['section_id'];
            $section_name = $value['section_name'];
        }

        $data['section_id'] = $section_id;
        $data['sectionname'] = $section_name;
        //store section session 
//        $this->session->set_userdata('sectionid',$section_id);
//        $this->session->set_userdata('sectionname',$section_name);
        ///check whether section has got subsection




                $results = $this->dataFetcher->subcategoryDetails($id,'search_forms');
                
                $data['result'] = $results['results'];
                $subsec_results = $this->dataFetcher->getSectionSubsections($section_id, $id);
                //fetching the subsection selected id
                foreach ($subsec_results->result_array() as $rows) {
                    $subsectionid = $rows['subsections_id'];
                    $subsectionname = $rows['subsections'];
                    $catname = $rows['cat_name'];
                    $catid = $rows['cat_id'];
                }


                $data['subsection_id'] = $subsectionid;
                //store id into session in case an error occure then we would get advantage of session to retrieve id
                // $this->session->set_userdata('subsectionid', $subsectionid);
                $this->session->set_userdata('subsectionname', $subsectionname);
                $this->session->set_userdata('categoryname', $catname);
                $this->session->set_userdata('categoryid', $id);
                $data['catid'] = $catid;
                $data['category'] = $catname;
                $data['subsectionname'] = $subsectionname;
                $data['controller']='mastersearch/editorprocessor';

                $this->load->view('formCreatorUpdater', $data);

    }
    
        /*     * ** form update processor */

    public function editorprocessor() {

        if ($this->input->post('edit')) {

            $this->form_validation->set_rules('cat', 'input types', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('formCreatorUpdater');
            } else {
                //update the database information
                //form processing goes here
                $datas = array();

//                $subsectionsession = $this->session->userdata('subsectionid');
//                $catid = $this->session->userdata('cat');

                $category = $this->input->post('cat');
                $subsectionid = $this->input->post('subsection_id');
                $deleteresults = $this->dataFetcher->deletesearchforms($category[0],$table='search_forms');

                if ($deleteresults) {


                    foreach ($_POST as $key => $value) {

                        ///strip the selected values from dropdown
                        if (strstr($key, "field_")) {
                            ///check if the sections has subsections
                            if (!empty($_POST['cat'])) {

                                foreach ($_POST['cat'] as $category) {
                                    //check if the submitted data has subsection
                                    if (!empty($subsectionid)) {
//                                        $subsection = $this->session->userdata('subsectionid');
                                        $subsection = $_POST['subsection_id'];
                                    } else {
                                        $subsection = '';
                                    }

                                    $arr = explode('_', $key);
                                    $checkboxId = $arr[1];
                                    $selectedCheckboxValue = $_POST['count_' . $checkboxId];
                                    $selectedLabel = $_POST['label_' . $checkboxId];
                                    $data['no_input'] = $selectedCheckboxValue;
                                    $data['displayOrder'] = $_POST['order_'.$checkboxId];
                                    $data['input_type_id'] = $checkboxId;
                                    $data['sections_without_subsections'] = $subsection;
                                    $data['category_id'] = $category;
                                    $data['form_label'] = $selectedLabel;
                                    $data['input_tip'] = $_POST['tip_' . $checkboxId];
                                    $datas[] = $data;
                                }
                            }
                            //end
                        }
                    } $results = $this->db->insert_batch('search_forms', $datas);
                    if ($results) {
                        $this->listofcreatedsearchforms();
                    } else {
                        $this->load->view('search_form');
                    }
                }
                //end the proccessing   
                ///////
            }
        }
    }

}

?>
