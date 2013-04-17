<?php
  $this->load->view('header');      
  $this->load->view('content');      

$results=$this->datafetcher->formscreated();
 if ($results->num_rows()>0) {
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
            $output = '';
            $sn=0;
            foreach ($results->result_array() as $value) {
              $sn++; 
                /**
                 * check if the form category is empty if that is the case then means form as been set to 
                 * other level  rather than categorywise 
                 */
                if(!empty($value['category_id'])){
                    
                   $sectionname='';
                  //  
                }else{
                    
                    //check if it section level
                  $sectionname=$this->datafetcher->loadsectionById($id=$value['parentsectionid']);  
                    
                }
                
                $output.='<tr><td>'.$sn.'</td><td>'.$sectionname.'</td></tr>';
        
                
            } echo $output;
       ?>
            </tbody>
    </table>   
           
      <?php }else{
            echo 'no data ';
        }
  $this->load->view('footer');      
?>
