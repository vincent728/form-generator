<?php

/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */


if($results->num_rows()>0){
 ?>
<table class="mytable" width="100%">
    
    <thead>
        <tr>
            <th>
                SN
            </th>
            <th>
                Input type name
            </th>
            <th>
                Input type (programming purpose)
            </th>
            <th>
                Order value
            </th>
            
            
        </tr>
        
    </thead>
    <?php
    $output='';
    $no=0;
    
 foreach ($results->result_array() as $value) {
     
     $output.='<tr><td></td></tr>';
     
     
 }
    
    
    ?>
    
    
    
</table> 
 <?php
    
}else{
    
}
?>
