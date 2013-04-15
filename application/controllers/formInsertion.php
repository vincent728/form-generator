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
            foreach ($results as $value) {
                array_push($fields_name, $value->input_name);
            }
            //check submitted fields
        } else {
            
        }
    }

}

?>
