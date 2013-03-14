<?php
/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */


$this->load->view('header');
$this->load->view('content');
$results = $this->dataFetcher->formsCreatedSections();

if ($results->num_rows() > 0) {
    ?>
    <table width="100%" border="0" class="mytable">

        <thead>

            <tr>

                <th>
                    S/N
                </th>
                <th>
                    Section name
                </th>
                <th>
                    Categories & Subsection(s)
                </th>

            </tr>
        <tbody>


            <?php
            $table_output = '';
            $sn = 0;
            foreach ($results->result_array() as $value) {
                $sn++;
                //check if subsections detected 
                $result_categories = $this->dataFetcher->sectionCategory($value['section_id']);

                $forms_output = '';
                
                foreach ($result_categories->result_array() as $forms) {

                    ///load subsection if present
                    $formid = '';
                    if (!empty($forms['sections_without_subsections'])) {

                        //get the subsection name 
                        $results_subsections = $this->dataFetcher->getSectionSubsections($value['section_id'], $forms['cat_id']);

                        $subs_name = '';
                        ///
                        //if category is  not empty means  section with subsections
                        $sectionwithoutsubsectionsresults = $this->dataFetcher->loadsection($forms['sections_without_subsections']);
                        foreach ($sectionwithoutsubsectionsresults->result_array() as $rows) {
                            $formid = 'subsec/';
                        }


                        /////
                        foreach ($results_subsections->result_array() as $subsectionsname) {
                            $subs_name.=$subsectionsname['subsections'];
                        }

                        $name = $subs_name;
                    } else {


                        $sectionswithsubsectionsresults = $this->dataFetcher->loadSubsection($forms['cat_id']);
                        foreach ($sectionswithsubsectionsresults->result_array() as $rowsvalue) {

                            $formid = 'sec/';
                        }

                        $name = '-------';
                    }


                    $forms_output.='<tr><td>' . $forms['cat_name'] . '</td><td>' . $name . '</td>
                       
                    <td>' . anchor('formGenerator/editform/' . $formid . $forms['cat_id'], $title = 'click', $attrib = array('title' => 'click', 'class' => '')) . nbs(3) . anchor_popup('formGenerator/generateform/' . $formid . $forms['cat_id'], $title = 'click', $attrib = array('title' => 'click', 'class' => '')) . nbs(3) . anchor('formGenerator/formdelete/' . $formid . $forms['cat_id'], $title = 'click', $attrib = array('title' => 'click', 'class' => '')) . '</td>
                       
</tr>';
                }
                $table_output.='<tr><td>' . $sn . '</td><td>' . $value['section_name'] . '</td><td><table width="100%" border="0" class="myinnertable">' . $forms_output . '</table></td></tr>';
            }
            echo $table_output;
            ?>





        </tbody>

    </thead>




    </table>    
    <?php
}
else{
    
    echo 'no data found';
}
?>





<?php
$this->load->view('footer');