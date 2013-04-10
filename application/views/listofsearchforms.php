<?php
$this->load->view('header');
$this->load->view('content');

$results = $this->dataFetcher->loadofsearchformscreatedsections();

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

                $result_categories = $this->dataFetcher->searchforms($value['section_id']);
                ///load search forms by category
                $forms_output = '';
                $no = 0;
              
                foreach ($result_categories->result_array() as $forms) {

                    ///load subsection if present
                      $formid='';
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

                            $formid ='sec/';
                        }

                        $name = '-------';
                    }


                    $forms_output.='<tr><td>' . $name . '</td><td>' . $forms['cat_name'] . '</td>
                       
                    <td>' . anchor('mastersearch/editform/' . $formid . $forms['cat_id'], $title =img(array('src'=>'icons/edit.png')), $attrib = array('title' => 'edit', 'class' => ''), $attrib = array('title' => 'edit', 'class' => '')) . nbs(3) . anchor_popup('mastersearch/generateform/' . $formid . $forms['cat_id'], $title =img(array('src'=>'icons/accept.png')), $attrib = array('title' => 'view', 'class' => '')) . nbs(3) . anchor('mastersearch/deletesearchform/' . $formid . $forms['cat_id'],$title =img(array('src'=>'icons/cancel.png')), $attrib = array('title' => 'delete', 'class' => ''), $attrib = array('title' => 'delete', 'class' => '')) . '</td>
                       
</tr>';
                }


                $sn++;
                $table_output .= '<tr><td>' . $sn . '</td><td>' . $value['section_name'] . '</td><td><table width="100%" border="0" class="myinnertable">' . $forms_output . '</table></td></tr>';
            }
            echo $table_output;
            ?>
        </tbody>
    </table>
    <?php
} else {
    echo 'not search form created';
}
$this->load->view('footer');
?>
