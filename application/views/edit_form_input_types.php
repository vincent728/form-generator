<?php

/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */

//get results of the fethed category

$checked_arr = array();
$checked_select_value = array();
$checked_select_maxval = array();

foreach ($results->result_array() as $editvalue) {

    array_push($checked_arr, $editvalue['input_id']);
    array_push($checked_select_value, $editvalue['no_input']);
    array_push($checked_select_maxval, $editvalue['max_no_inputs']);
}

$allresults = $this->dataFetcher->inputTypesLoader();

if ($allresults && $allresults->num_rows() > 0) {

    $checkboxoutput = '';

    foreach ($allresults->result_array() as $value) {

        $dropdown_values = array();
        $dropdowns = '';


        $checked = '';
        $editno_input = '';
        $select = '';
////////////the values user set last time in db
        for ($i = 0; $i < count($checked_arr); $i++) {

            if ($value['input_id'] == $checked_arr[$i]) {

                $checked.= 'TRUE';
               
                $editno_input.=$checked_select_value[$i];
                //check if the select input value matches if then set select selected
                if ($value['max_no_inputs'] == $checked_select_maxval[$i]) {

                    $select.="selected";
                } else {
                    $select.="selected";
                }
            } else {
                $checked.= '';
                $editno_input.='';
                
            }
        }
////////////////////////////////////////////////////
        //the  loop for initiating the max number of input fixed number of selection as they are in db
        for ($a = 0; $a < $value['max_no_inputs']; $a++) {


            //check if the set number in the db matches is not empty
            if (!empty($editno_input)) {

                $selectVal = $editno_input;
            } else {
                $selectVal = '';
            }


            $dropdowns.='<option  ' . $select . ' value="' . ($a + 1) . set_value() . '">' . ($a + 1) . '</option>';
        }
        //end of the loop 

        $start_select = '<select name="count_' . $value['input_id'] . '"><option value="" >--no of input--</option>';
        $end_select = '</select>';
        //

        $data = array('name' => 'field_' . $value['input_id'], 'value' => 'field_' . set_value('inputs') . $value['input_id'], 'checked' => $checked);
        $checkboxoutput.=nbs(3) . form_checkbox($data) . nbs(3) .
                $value['input_name'] . nbs(8) . $start_select . $dropdowns . $end_select . nbs(4) .
                form_input(array('name' => 'label_' . $value['input_id'], 'value' => 'write the name of a label', 'size' => '30')) .
                form_input(array('name' => 'tip_' . $value['input_id'], 'value' => 'tip for the input goes here', 'size' => '30')) .
                '</br></br>';
    }
    echo $checkboxoutput;
} else {

    ///no checkboxes to generate
}
?>

