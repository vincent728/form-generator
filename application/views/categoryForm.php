<?php

/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */
?>
<?php

/*
 * @Author :VincenT David
 * @Email :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */
$this->load->view('header');
$this->load->view('content');
if ($results->num_rows() > 0) {

    $input_output = '';
    foreach ($results->result_array() as $value) {

        //check if input is more than one
        
        $inputfield = '';
        
        if ($value['no_input'] > 0) {


            ///check if it is textarea, select dropdown etc
             $fieldTobegenerated = '';

            switch (strtolower($value['input_type'])) {
                
                case "file":
                    $fieldTobegenerated = form_label($value['input_name']) . '<input type="file" name="file[]"/>';
                    break;
                case "textarea":

                    $fieldTobegenerated = form_label($value['input_name']) . form_textarea(array('name' => 'txtarea[]', 'cols' => '25', 'rows' => '3'));
                    break;
                
                case "select":

                    $fieldTobegenerated = form_label($value['input_name']);
                    $out='';
                    $repeatselectrtesults=$this->dataFetcher->getAllrepeats();
                    
                    foreach ($repeatselectrtesults->result_array()as $rows){
                        
                        $out.='<option value="'.$rows['repeat_id'].'">'.$rows['events'].'</option>';
                     
                    }
                    
                    $fieldTobegenerated = form_label($value['input_name']).'<select name="" class="events">'.$out.'</select><div class="events"></div>';

                    break;

                default:
                    break;
            }

///loop to get the exactly number of inputs required

            for ($a = 0; $a < $value['no_input']; $a++) {

                $inputfield.='<li>' . $fieldTobegenerated . '</li>';
            }
        } else {

            $inputfield = '';
        }


        $input_output.=form_fieldset() . '<ul>' . $inputfield . '' . '</ul>' . form_fieldset_close();
    } echo form_open_multipart('formGenerator/insertFormData/', $data = array('id' => '', 'class' => '')) .'<h1>'.$category.'</h1>'. $input_output . form_submit(array('name' => 'submit', 'value' => 'submit')) . form_close();
} else {
    
}

$this->load->view('footer');
?>
