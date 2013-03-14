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
            
            $arrayOfinputssubmitted=array();
            $data=array();
            
               if($name){
            
             $form_name=$name;
            }
            else{
             $form_name='';
            } if($shortpromo){
              $shortpromodescriptions=$shortpromo;             
            }
            else{
             $shortpromodescriptions='';  
            }if($phone){
              $phonenumbers=$phone;
            }
            else{
            $phonenumbers='';
            }if($email){
             $formemail=$email;
            }
            else{
             $formemail='';
            }
            
            if($this->input->post('cat')){
                
                $data['name']=$form_name;
                $data['email']=$formemail;
                $data['phone']=$phonenumbers;
                $data['shortpromo']=$shortpromodescriptions;
                
            }
            $arrayOfinputssubmitted[]=$data;
            //some insertion algorithm goes here
            exit;
            $results=$this->db->insert_batch('datatest',$arrayOfinputssubmitted);
            if($results){
                
                echo 'inserted';
            }
            else{
                echo 'error in insertion';
            }
            //array_push($arrayOfinputssubmitted);
            
            
            
            
        } else {
            
        }
    }

}

?>
