<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$results = $this->dataFetcher->inputTypesLoader();

if ($results && $results->num_rows() > 0) {

    $checkboxoutput = '';

    foreach ($results->result_array() as $value) {

        $dropdown_values = array();
        $dropdowns = '';

        //the  loop for initiating the max number of input fixed number of selection as they are in db

        for ($a = 0; $a < $value['max_no_inputs']; $a++) {

            $dropdowns.='<option   value="' . ($a + 1) . set_value('') . '">' . ($a + 1) . '</option>';
        }
        //end of the loop 

        $start_select = '<select name="count_' . $value['input_id'] . '"><option value="" >--no of input--</option>';
        $end_select = '</select>';
        //

        $data = array('name' => 'field_' . $value['input_id'], 'value' => 'field_' . set_value('inputs') . $value['input_id']);

        $checkboxoutput.=nbs(3) . form_checkbox($data) . nbs(3) .
                $value['input_name'] . nbs(8) . $start_select . $dropdowns . $end_select . nbs(4) .
                form_input(array('name' => 'label_' . $value['input_id'], 'value' => 'write the name of a label', 'size' => '30')) .
                form_input(array('name' => 'tip_' . $value['input_id'], 'value' => 'tip for the input goes here', 'size' => '30')) .
                '</br></br>';
    }
    echo $checkboxoutput;
}
?>
