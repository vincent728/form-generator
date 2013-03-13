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


                case "fullname_input":

                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel =$value['input_tip'];
                    } else {
                        $tipsOnlabel ='';
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
//                    $$tipsOnlabel = (isset($value['input_tip']) ? $value['input_tip'] : $value['input_name']);

                    $fieldTobegenerated = form_label($label) . form_input(array('name' => 'name[]', 'value' => '', 'size' => '30')) .'</br><i><font color="#1A9B50">'.form_label($tipsOnlabel).'</font></i>';
                    break;
                case "input_phone":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_input(array('name' => 'phone[]', 'value' => '', 'size' => '30')).'</br><i><font color="#1A9B50">'.form_label($tipsOnlabel).'</font></i>';
                    break;

                case "contact_email":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_input(array('name' => 'contact_email[]', 'value' => '', 'size' => '30')).'</br><i><font color="#1A9B50">'.form_label($tipsOnlabel).'</font></i>';
                    break;

                case "textarea":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_textarea(array('name' => 'txtarea[]', 'cols' => '25', 'rows' => '3')).'</br><i><font color="#1A9B50">'.form_label($tipsOnlabel).'</font></i>';
                    break;

                case "images":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . '<input type="file" name="images[]" class="images"/>';
                    break;

                case "file":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . '<input type="file" name="file[]" class"file"/>';
                    break;

                case "select":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $out = '';
                    $repeatselectrtesults = $this->dataFetcher->getAllrepeats();

                    foreach ($repeatselectrtesults->result_array()as $rows) {

                        $out.='<option value="' . $rows['repeat_id'] . '">' . $rows['events'] . '</option>';
                    }

                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . '<select name="" class="events">' . $out . '</select><div class="events_display"></div>';

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
    } echo form_open_multipart('formInsertion/formsdataprocessor/', $data = array('id' => 'myform', 'class' => 'myform')) . '<h1>' . $category . '</h1>' . form_fieldset() . '<ul>' . $input_output . '<li>' . form_label() . form_submit(array('name' => 'submit', 'value' => 'submit', 'class' => 'submit')) . '</li>' . form_fieldset_close() . form_close() . '</ul>';
} else {
    
}
?>
<!--..submitted forms javascript validations-->
<script  type="text/javascript">
    var frmvalidator = new Validator("myform");
    frmvalidator.addValidation("name[]","req","Please enter the name");
    frmvalidator.addValidation("phone[]","req","please enter an email address");
    frmvalidator.addValidation("phone[]","numeric");
    frmvalidator.addValidation("contact_email[]","maxlen=50");
    frmvalidator.addValidation("contact_email[]","req","please enter an email address");
    frmvalidator.addValidation("txtarea[]","req","please enter details");
    frmvalidator.addValidation("images[]","req","please attach an image ");
 
    

</script>    




<?php
$this->load->view('footer');
?>
