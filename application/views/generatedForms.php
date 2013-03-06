<?php
/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */
$this->load->view('header');
$this->load->view('content');


//check if there is any form generated  

//$results = $this->dataFetcher->getfomdetails();

//$results = $this->dataFetcher->loadSubsection();
$results = $this->dataFetcher->generatedformsInformations();


if ($results->num_rows() > 0) {
    ?>
    <table width="0" border="1">    
        <?php
        $output = '';
        foreach ($results->result_array() as $value) {

            $out_sub='';
            $formid='';
            
            if(empty($value['sections_without_subsections'])&& is_null($value['sections_without_subsections'])){
              //if it is empty means its section with subsections 
                $sectionswithsubsectionsresults=$this->dataFetcher->loadSubsection($value['category_id']);
                foreach ($sectionswithsubsectionsresults->result_array() as $rowsvalue) {
                    
                $out_sub.=$rowsvalue['subsections'];    
                $formid.='subsec/'.$rowsvalue['subsections_id'];
                }
               
            }
            
            if(empty($value['category_id'])|| is_null($value['category_id'])){
                //if category is  empty means  section without subsections
                $sectionwithoutsubsectionsresults=$this->dataFetcher->loadsection($value['sections_without_subsections']);
                
                foreach ($sectionwithoutsubsectionsresults->result_array() as $rows) {
                    
                $out_sub.=$rows['section_name'];   
                $formid.='sec/'.$rows['section_id'];
                }
            }
            
            
        // $output.='<tr><td>' . $value['subsections'] . '</td><td>' . anchor_popup('formGenerator/generateform/' . $value['subsections_id'], $title = 'click', $attrib = array('title' => 'click', 'class' => '')) . '</td></tr>';
         //   $output.='<tr><td>' . $value['cat_name'] . '</td><td>' . anchor_popup('formGenerator/generateform/' . $value['category_id'], $title = 'click', $attrib = array('title' => 'click', 'class' => '')) . '</td></tr>';
         $output.='<tr><td>' . $out_sub . '</td><td>' . anchor_popup('formGenerator/generateform/'.$formid, $title = 'click', $attrib = array('title' => 'click', 'class' => '')) . '</td></tr>';
        } echo $output;
        ?>
    </table> 
        <?php
    } else {

        ///handle exception

        echo 'no data for any form';
    }
    ?>



<?php
$this->load->view('footer');