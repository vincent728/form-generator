<?php
/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */
$this->load->view('header');
$this->load->view('content');


//check if there is any form generated
$results =$this->dataFetcher->getfomdetails();
if ($results->num_rows() > 0) {
    ?>
    <table width="0" border="1">    
    <?php
    $output = '';
    foreach ($results->result_array() as $value) {
        
        
        $output.='<tr><td>'.$value['cat_name'].'</td><td>'.anchor_popup('formGenerator/generateform/'.$value['category_id'],$title='click',$attrib=array('title'=>'click','class'=>'')).'</td></tr>';
        
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