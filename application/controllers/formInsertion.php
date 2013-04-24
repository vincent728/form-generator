<?php

/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */

class FormInsertion extends CI_Controller {

    public function formsdataprocessor() {

        if ($this->input->post('submit')) {



            //load all the input names as per db
            $results = $this->datafetcher->listAllInputstypes();
            $fields_name = array();
            $x = 0;
            foreach ($results->result_array() as $value) {
                $x++;
                array_push($fields_name, $value['input_name']);
                //////////////////////////////
     
            }
       
            echo count($fields_name);
            
            for($a=0;$a<count($fields_name); $a++){
                
                $data_to_db='';
                
                foreach ($_POST as $rows) {
                    
                if(isset($_POST[$fields_name[$a]])&&!empty($_POST[$fields_name[$a]])){
                   
                    $data_to_db.=$fields_name[$a].'hahaha'.'<br>';
                }
                
            }echo $data_to_db;
            }
            
            
            
            
            
            // echo $data_out;
            //echo $_POST['searchbyjobcategory'];
        } else {
            
        }
    }

}

?>
