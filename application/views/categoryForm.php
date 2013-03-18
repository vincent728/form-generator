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

                    $fieldTobegenerated = form_label($label) . form_textarea(array('name' => $value['fieldtypename'], 'cols' => '25', 'rows' => '3')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

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

                    $fieldTobegenerated = form_label($label) . form_input(array('name' => $value['fieldtypename'], 'value' => '')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

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

                    $fieldTobegenerated = form_label($label) . form_checkbox(array('name' => $value['fieldtypename'], 'value' => '')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

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

                    $fieldTobegenerated = form_label($label) . '<input type="file" name="' . $value['fieldtypename'] . '[]" class="images"/>' . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

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

                    $fieldTobegenerated = form_label($label) . form_password(array('name' => $value['fieldtypename'], 'value' => '')) . '</br><i><font color="#1A9B50">' . form_label($tipsOnlabel, $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';

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
