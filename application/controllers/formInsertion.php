<?php

/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */

class FormInsertion extends CI_Controller {

    public function formsdataprocessor() {

        if ($this->input->post('submit')) {
            
            ///check if the  value is set then validate it if not dont parse
            $name=$this->input->post('name');
            $shortpromo=$this->input->post('txtarea');
            $phone=$this->input->post('phone');
            $email=$this->input->post('contact_email');
            $events=$this->input->post('events');
            
            
            if(is_array($name)){
            
             $form_name='';
            }
            else{
             $form_name='';
            } if(is_array($shortpromo)){
              $shortpromodescriptions='';             
            }
            else{
             $shortpromodescriptions='';  
            }if(is_array($phone)){
              $phonenumbers='';
             
            }
            else{
            $phonenumbers='';
            }if(is_array($email)){
             $formemail='';
            }
            else{
             $formemail='';
            }
            
            
            
            
        } else {
            
        }
    }

}

?>
