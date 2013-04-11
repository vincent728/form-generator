<?php

/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */
$this->load->view('header');
$this->load->view('content');

$this->load->view('form_add_select_inputs');
if($results->num_rows()>0){
 ?>


<table class="myinnertable" width="100%" border="0">
    
    <thead>
        <tr>
            <th>
                SN
            </th>
            <th>
                Input type name
            </th>
           
            <th>
                Option(s)
            </th>
            
            
        </tr>
        
    </thead>
    <tbody>
    <?php
    $output='';
    $no=0;
    
 foreach ($results->result_array() as $value) {
     $no++;
     $edit_anchor=anchor('formGenerator/laodselectdetails/'. $value['selectinputtypes_id'], $title =img(array('src'=>'icons/edit.png')), $attrib = array('title' => 'edit', 'class' => ''));
     $cancel_anchor=anchor('formGenerator/deleteinputforselect/'. $value['selectinputtypes_id'], $title =img(array('src'=>'icons/cancel.png')), $attrib = array('title' => 'cancel', 'class' => ''));
     $output.='<tr><td>'.$no.'</td><td>'.$value['selectinputtypes'].'</td><td>'.$edit_anchor.''.$cancel_anchor.'</td></tr>';
   
 }echo $output;
    
    
    ?>
    
    
    </tbody>  
</table> 
 <?php
    
}else{
    echo 'no input found'; 
}
$this->load->view('footer');
?>

