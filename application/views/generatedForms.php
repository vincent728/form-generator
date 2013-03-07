<?php
/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */
$this->load->view('header');
$this->load->view('content');

$results = $this->dataFetcher->generatedformsInformations();


if ($results->num_rows() > 0) {
    ?>
    <table width="0" border="1">    
    <?php
    
        $out_sub = '';
        
        $output = '';
    foreach ($results->result_array() as $value) {

            $formid = '';
        if (empty($value['sections_without_subsections'])) {
            //if it is empty means its section without subsections 
            $sectionswithsubsectionsresults = $this->dataFetcher->loadSubsection($value['category_id']);
            foreach ($sectionswithsubsectionsresults->result_array() as $rowsvalue) {

                $out_sub.=$rowsvalue['cat_name'];
                $formid='sec/' . $rowsvalue['cat_id'];
            }
        }
        else{
              //if category is  not empty means  section with subsections
            $sectionwithoutsubsectionsresults = $this->dataFetcher->loadsection($value['sections_without_subsections']);
            foreach ($sectionwithoutsubsectionsresults->result_array() as $rows) {
                $out_sub.=$rows['cat_name'];
                $formid='subsec/' . $rows['cat_id'];
            }
         
        }

        //the final row output printed 
        $output.='<tr><td>' . $value['cat_name'] . '</td><td>' . anchor_popup('formGenerator/generateform/' . $formid, $title = 'click', $attrib = array('title' => 'click', 'class' => '')) . '</td></tr>';
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