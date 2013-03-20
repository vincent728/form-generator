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
    $validation_arr = array();

    foreach ($results->result_array() as $value) {

        //check if input is more than one
        $val = array();


        $inputfield = '';

        if ($value['no_input'] > 0) {



            /**
             *  check if it is textarea, select dropdown etc
             *  this is the place where all input types configured on a db and you want to appear in a generated form are configured
             * form validation has done according to rickharrison library(for javascript Ci form validation)
             * 
             */
            $fieldTobegenerated = '';

            switch (strtolower($value['input_type'])) {

                case"textarea";
                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    /*                     * check if label has been modified */
                    if (empty($value['form_label'])) {
                        $label = $value['input_name'];
                    } else {
                        $label = $value['form_label'];
                    }


                    /*                     * **an array to feed the validation rules for this input* */
                    //fetch the validation rules as set by the user
                    $rulesin = '';
                    $rules_results = $this->dataFetcher->loadsValidationrules($value['input_id']);
                    foreach ($rules_results->result_array() as $rules) {
                        $rulesin.=$rules['rule_name'] . '|';
                    }
                    $val['name'] = $value['fieldtypename'];
                    $val['display'] = $label;
                    $val['rules'] = $rulesin;

                    $fieldTobegenerated = form_label($label) . form_textarea(array('name' => $value['fieldtypename'], 'cols' => '25', 'rows' => '3')) . '<i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

                    break;
                case"textinput":
                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    /*                     * check if label has been modified */
                    if (empty($value['form_label'])) {
                        $label = $value['input_name'];
                    } else {
                        $label = $value['form_label'];
                    }


                    /*                     * **an array to feed the validation rules for this input* */
                    //fetch the validation rules as set by the user
                    $rulesin = '';
                    $rules_results = $this->dataFetcher->loadsValidationrules($value['input_id']);
                    foreach ($rules_results->result_array() as $rules) {
                        $rulesin.=$rules['rule_name'] . '|';
                    }
                    $val['name'] = $value['fieldtypename'];
                    $val['display'] = $label;
                    $val['rules'] = $rulesin;

                    $fieldTobegenerated = form_label($label) . form_input(array('name' => $value['fieldtypename'], 'value' => '')) . '<i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

                    break;
                    
                    
                         case"dateinput":
                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    /*                     * check if label has been modified */
                    if (empty($value['form_label'])) {
                        $label = $value['input_name'];
                    } else {
                        $label = $value['form_label'];
                    }


                    /*                     * **an array to feed the validation rules for this input* */
                    //fetch the validation rules as set by the user
                    $rulesin = '';
                    $rules_results = $this->dataFetcher->loadsValidationrules($value['input_id']);
                    foreach ($rules_results->result_array() as $rules) {
                        $rulesin.=$rules['rule_name'] . '|';
                    }
                    $val['name'] = $value['fieldtypename'];
                    $val['display'] = $label;
                    $val['rules'] = $rulesin;

                    $fieldTobegenerated = form_label($label) . form_input(array('name' => $value['fieldtypename'], 'value' => '','class'=>'datepicker')) . '<i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

                    break;
                    
                    
                    
                    

                case"checkbox":
                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    /*                     * check if label has been modified */
                    if (empty($value['form_label'])) {
                        $label = $value['input_name'];
                    } else {
                        $label = $value['form_label'];
                    }


                    /*                     * **an array to feed the validation rules for this input* */
                    //fetch the validation rules as set by the user
                    $rulesin = '';
                    $rules_results = $this->dataFetcher->loadsValidationrules($value['input_id']);
                    foreach ($rules_results->result_array() as $rules) {
                        $rulesin.=$rules['rule_name'] . '|';
                    }
                    $val['name'] = $value['fieldtypename'];
                    $val['display'] = $label;
                    $val['rules'] = $rulesin;

                    $fieldTobegenerated = form_label($label) . form_checkbox(array('name' => $value['fieldtypename'], 'value' => '')) . '<i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

                    break;

                case"file":
                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    /*                     * check if label has been modified */
                    if (empty($value['form_label'])) {
                        $label = $value['input_name'];
                    } else {
                        $label = $value['form_label'];
                    }


                    /*                     * **an array to feed the validation rules for this input* */
                    //fetch the validation rules as set by the user
                    $rulesin = '';
                    $rules_results = $this->dataFetcher->loadsValidationrules($value['input_id']);
                    foreach ($rules_results->result_array() as $rules) {
                        $rulesin.=$rules['rule_name'] . '|';
                    }
                    $val['name'] = $value['fieldtypename'];
                    $val['display'] = $label;
                    $val['rules'] = $rulesin;

                    $fieldTobegenerated = form_label($label) . '<input type="file" name="' . $value['fieldtypename'] . '[]" class="images"/>' . '<i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

                    break;
                    
                    case"password":
                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    /*                     * check if label has been modified */
                    if (empty($value['form_label'])) {
                        $label = $value['input_name'];
                    } else {
                        $label = $value['form_label'];
                    }


                    /*                     * **an array to feed the validation rules for this input* */
                    //fetch the validation rules as set by the user
                    $rulesin = '';
                    $rules_results = $this->dataFetcher->loadsValidationrules($value['input_id']);
                    foreach ($rules_results->result_array() as $rules) {
                        $rulesin.=$rules['rule_name'] . '|';
                    }
                    $val['name'] = $value['fieldtypename'];
                    $val['display'] = $label;
                    $val['rules'] = $rulesin;

                    $fieldTobegenerated = form_label($label) . form_password(array('name' => $value['fieldtypename'], 'value' => '')) . '<i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

                    break;
                    
                    
                    
                    
                      
                     case"multiselect":
                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    /*                     * check if label has been modified */
                    if (empty($value['form_label'])) {
                        $label = $value['input_name'];
                    } else {
                        $label = $value['form_label'];
                    }


                    /*                     * **an array to feed the validation rules for this input* */
                    //fetch the validation rules as set by the user
                    $rulesin = '';
                    $rules_results = $this->dataFetcher->loadsValidationrules($value['input_id']);
                    foreach ($rules_results->result_array() as $rules) {
                        $rulesin.=$rules['rule_name'] . '|';
                    }
                    $val['name'] = $value['fieldtypename'];
                    $val['display'] = $label;
                    $val['rules'] = $rulesin;
                    
                    $out = '';
                    $tabletesults = $this->dataFetcher->selecTfromTable($value['draws_from']);

                    foreach ($tabletesults->result_array()as $rows) {

                        $out.='<option value="' . $rows[$value['column_id']] . '">' . $rows[$value['display_id']] . '</option>';
                    }
                    
                    

                    $fieldTobegenerated = form_label($label) . '<select  name="'.$value['fieldtypename'].'hapa[]'.'" class="" multiple="multiple" size="4"><option value="" selected>--Select an option--</option>' . $out . '</select>' . '<i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

                    break;

                   //selecTfromTable($table)
                    
                     case"select":
                    if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    /*                     * check if label has been modified */
                    if (empty($value['form_label'])) {
                        $label = $value['input_name'];
                    } else {
                        $label = $value['form_label'];
                    }


                    /*                     * **an array to feed the validation rules for this input* */
                    //fetch the validation rules as set by the user
                    $rulesin = '';
                    $rules_results = $this->dataFetcher->loadsValidationrules($value['input_id']);
                    foreach ($rules_results->result_array() as $rules) {
                        $rulesin.=$rules['rule_name'] . '|';
                    }
                    $val['name'] = $value['fieldtypename'];
                    $val['display'] = $label;
                    $val['rules'] = $rulesin;
                    
                    $out = '';
                    $tabletesults = $this->dataFetcher->selecTfromTable($value['draws_from']);

                    foreach ($tabletesults->result_array()as $rows) {

                        $out.='<option value="' . $rows[$value['column_id']] . '">' . $rows[$value['display_id']] . '</option>';
                    }
                    
                    

                    $fieldTobegenerated = form_label($label) . '<select name="'.$value['fieldtypename'].'" class=""><option value="" selected>--Select an option--</option>' . $out . '</select><div class="events_display"></div>' . '<i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

                    break;
                    
                     case "repeat":

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
                    /*                     * check if label has been modified */
                    if (empty($value['form_label'])) {
                        $label = $value['input_name'];
                    } else {
                        $label = $value['form_label'];
                    }

                    $fieldTobegenerated = form_label($label) . '<select name="" class="events"><option value="">Select</option>' . $out . '</select><div class="events_display"></div>';

                   case "price":
                        //$fieldTobegenerated='<table border="0"><tr><td></td><td></td></tr></table>';
                        if (!empty($value['input_tip'])) {
                        $tipsOnlabel = $value['input_tip'];
                    } else {
                        $tipsOnlabel = '';
                    }
                    /*                     * check if label has been modified */
                    if (empty($value['form_label'])) {
                        $label = $value['input_name'];
                    } else {
                        $label = $value['form_label'];
                    }


                    /*                     * **an array to feed the validation rules for this input* */
                    //fetch the validation rules as set by the user
                    $rulesin = '';
                    $rules_results = $this->dataFetcher->loadsValidationrules($value['input_id']);
                    foreach ($rules_results->result_array() as $rules) {
                        $rulesin.=$rules['rule_name'] . '|';
                    }
                    $val['name'] = $value['fieldtypename'];
                    $val['display'] = $label;
                    $val['rules'] = $rulesin;

                    $fieldTobegenerated = form_label($label) .'<table border="0"><tr>
                        <td>'.form_input(array('name' => $value['fieldtypename'], 'value' => '','class'=>'')) .'</td>
                        <td>'.'<select name="price"><option value="usd">$USD</option><option value="tzs">TZS</option></select>' .'</td>
                        </tr></table>'. '<i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

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


        $input_output.=$inputfield;


        $validation_arr[] = $val;
    }

    echo form_open_multipart('formInsertion/formsdataprocessor/', $data = array('name' => 'myForm', 'id' => 'myform', 'class' => 'myform', 'onsubmit' => "")) . '<h1>' . $category . '</h1>' . '<!--.javascript form validation.-->
<div class="error_box" id ="error_box"></div><div id="success_box"></div>' . form_fieldset() . '<ul>' . form_hidden($name = "cat", $id = $catid) . $input_output . '<li>' . form_label() . form_submit(array('name' => 'submit', 'value' => 'submit', 'class' => 'submit')) . '</li></ul>' . form_fieldset_close() . form_close();
} else {
    
}
?>
<?php
//json encoding for the form validations attributes;

$array_final = json_encode($validation_arr);
$array_final = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9]*)":/', '$1:', $array_final);
?>
<!--.form validation script goes here.-->
<script type="text/javascript">

 
    var validator = new FormValidator('myForm',<?php print_r($array_final); ?>, function(errors, event) {
        
        if (errors.length > 0) {
                       
            // Show the errors
            var errorString = '';
        
            for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
                errorString += errors[i].message + '<br />';
            }
        
            error_box.innerHTML = errorString;
            
          
           
      
        }
        
          
    });
    
 
</script>
<?php
$this->load->view('footer');
?>
