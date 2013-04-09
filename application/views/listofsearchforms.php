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

                $category_search_forms = $this->dataFetcher->searchforms($value['section_id']);
                ///load search forms by category
                $form_output = '';
                $no = 0;
                foreach ($category_search_forms->result_array() as $rows) {
                    $no++;
                    
                    //check if the cat has subsection or not
                    if($rows['sectionwithsubsection_id']==0){
                     ///no subsetion on this category  
                       $subsectionname='-----'; 
                    }else{
                      $subsection_rslt=$this->dataFetcher->loadsubsectionsearchforms($rows['category_id']); 
                      
                      foreach ($subsection_rslt->result_array() as $val) {
                          
                      }
                      $subsectionname=$val['subsections'];
                    }
                    
                    $options=anchor_popup('mastersearch/generateform/' .$rows['category_id'], $title =img(array('src'=>'icons/accept.png')), $attrib = array('title' => 'view', 'class' => '')) . nbs(3) . anchor('mastersearch/deletesearchform/'.$rows['category_id'],$title =img(array('src'=>'icons/cancel.png')), $attrib = array('title' => 'delete', 'class' => ''), $attrib = array('title' => 'delete', 'class' => '')) ;
                    
                    $form_output .= '<tr><td>' . $no .  nbs(3). ')'.  nbs(3).'</td><td>' . $rows['cat_name'] . '</td><td>'.$subsectionname.'</td>'.
                           '<td>' .$options. '</td>'   
                       . '</tr>';
                }


                $sn++;
                $table_output .= '<tr><td>' . $sn . '</td><td>' . $value['section_name'] . '</td><td><table border="0">' . $form_output . '</table></td></tr>';
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
