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



            /**
             *  check if it is textarea, select dropdown etc
             *  this is the place where all input types configured on a db and you want to appear in a generated form are configured
             * 
             */
            $fieldTobegenerated = '';

            switch (strtolower($value['input_type'])) {


                case "fullname_input":

                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    if (form_error('name')) {
                        $error = form_error('name');
                    } else {
                        $error = '';
                    }

                    $fieldTobegenerated = $error . form_label($label) . form_input(array('name' => 'name', 'value' => '' . set_value('name'), 'size' => '30')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
                    break;

                case "lastname":

                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_input(array('name' => 'lastname', 'value' => '', 'size' => '30')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
                    break;

                case "primaryphone":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_input(array('name' => 'primaryphone', 'value' => '', 'size' => '30')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
                    break;

                case "public_phone":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_input(array('name' => 'public_phone', 'value' => '', 'size' => '30')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
                    break;


                case "otherphone":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_input(array('name' => 'otherphone', 'value' => '', 'size' => '30')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
                    break;


                case "fax":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_input(array('name' => 'fax', 'value' => '', 'size' => '30')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
                    break;

                case "contact_email":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_input(array('name' => 'contact_email', 'value' => '', 'size' => '30')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
                    break;

                case "textarea":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_textarea(array('name' => 'txtarea', 'cols' => '25', 'rows' => '3')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
                    break;


                case "location":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label) . form_textarea(array('name' => 'location', 'cols' => '25', 'rows' => '3')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
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
                    $fieldTobegenerated = form_label($label) . '<input type="file" name="file[]" class="images"/>';
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
                case "area":

                    if (empty($value['input_tip'])) {
                        $tipsOnlabel = '';
                    } else {
                        $tipsOnlabel = $value['input_tip'];
                    }
                    $out = '';
                    $area = $this->dataFetcher->loadareas();

                    foreach ($area->result_array()as $rows) {

                        $out.='<option value="' . $rows['area_id'] . '">' . $rows['area_name'] . '</option>';
                    }

                    $label = (isset($value['form_label']) ? $value['form_label'] : $value['input_name']);
                    $fieldTobegenerated = form_label($label, $name = "area", $attributes = array('class' => 'area')) . '<select name="area[]" class="events" multiple>' . $out . '</select>' . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

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


        $input_output.=form_fieldset() . '' . $inputfield . '' . form_fieldset_close();
        //return validate()
        // 
    } echo form_open_multipart('formInsertion/formsdataprocessor/', $data = array('name' => 'myForm', 'id' => 'myform', 'class' => 'myform', 'onsubmit' => "")) . '<h1>' . $category . '</h1>' . '<!--.javascript form validation.-->
<div class="error_box" id ="error_box"></div>' . form_fieldset() . '<ul>' . form_hidden($name = "cat", $id = $catid) . $input_output . '<li>' . form_label() . form_submit(array('name' => 'submit', 'value' => 'submit', 'class' => 'submit')) . '</li></ul>' . form_fieldset_close() . form_close();
} else {
    
}
?>




<?php

$this->load->view('footer');
?>
