<?php
/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */
$this->load->view('header');
$this->load->view('content');


if ($results->num_rows() > 0) {

    foreach ($results->result_array() as $value) {
        $id = $value['input_id'];
        $input_type = $value['input_type'];
        $input_name = $value['input_name'];
        $max_no_inputs = $value['max_no_inputs'];
    }

///check if form errors occured during submission

    if (form_error()) {
        $inputname = '';
        $inputtype = '';
        $maxnoinputs = '';
    } else {
        $inputname = $input_name;
        $inputtype = $input_type;
        $maxnoinputs = $max_no_inputs;
    }

    $data = array('name' => '', 'class' => 'myform');
    echo form_open('formGenerator/updateInputTypesDetails/', $data);
    echo form_fieldset();
    ?>
    <ul>

        <li>
            <?php
            if (form_error('inputname')) {
                echo form_error('inputname');
            }
            echo form_label('input name');
            echo form_input(array('name' => 'inputname', 'value' => '' . $inputname . set_value('inputname')));
//        echo form_hidden($name='id',$id);
            ?>

        </li>
        <li>
            <?php
            if (form_error('inputtypes')) {
                echo form_error('inputtypes');
            }
            echo form_label('input type');
            echo form_input(array('name' => 'inputtype', 'value' => '' . $inputtype . set_value('inputtype')));
            ?>

        </li>
        <li>
            <?php
            if (form_error('max_no_inputs')) {
                echo form_error('max_no_inputs');
            }
            echo form_label('Maximum number of inputs');
            echo form_input(array('name' => 'max_no_inputs', 'value' => '' . $maxnoinputs . set_value('max_no_inputs')));
            ?>

        </li>


        <li>
            <?php
            if (form_error('formfieldtype')) {
                echo form_error('formfieldtype');
            }
            echo form_label('form field type');
            ?>
            <select name="formfieldtype" class="">

                <option value="">choose a field type</option>
                <option value="textarea">TextArea</option>
                <option value="dateinput">Date picker</option>

                <option value="select">select</option>
                <option value="textarea">password input</option>
                <option value="checkbox">checkbox</option>
                <option value="textinput">Text input</option>
                <option value="radio">radio input</option>
                <option value="repeat">repeat</option>
                <option value="file">file input</option>
                <option value="price">price input</option>
                <option value="starttime">Start time</option>
                <option value="endtime">End time</option>


            </select>

        </li>
        <?php
        /*******************************draws from column****************************************************************/
        
        $results_drawsfrom=$this->dataFetcher->drawsFromColumn($id);
        if($results_drawsfrom->num_rows()>0){
            foreach ($results_drawsfrom->result_array() as $drawsfields) {
                
                //check  if the table exists and columns too
                if(is_null($drawsfields['draws_from'])||empty($drawsfields['draws_from'])){
                    
                  $tablename='<li>'.  form_label('Draws form table name').form_input(array('name' => 'tablename', 'value' => '' . set_value('tablename'))).'</li>';  
                  echo $tablename;
                  }
                else{
                 $tablename='<li>'.form_label('Draws form table name').form_input(array('name' => 'tablename', 'value' =>$drawsfields['draws_from'] . set_value('tablename'))).'</li>';   
                echo $tablename;
                 
                }
                ///column  id
                 if(is_null($drawsfields['column_id'])||empty($drawsfields['column_id'])){
                    
                  
                   $tablename='<li>'.  form_label('hidden display column id').form_input(array('name' => 'tablename', 'value' => '' . set_value('tablename'))).'</li>';  
                   echo $tablename;
                   
                }
                else{
                 $tablename='<li>'.form_label('hidden display column id').form_input(array('name' => 'tablename', 'value' =>$drawsfields['column_id'] . set_value('tablename'))).'</br><i><font color="#1A9B50">'.
                 form_label("Write the column ID as it is from the database", $name = "tips", $attributes = array('class' => 'tips')) . '</font></i></li>';   
                 echo $tablename;
                 
                }
                
                 ///column name 
                 if(is_null($drawsfields['display_id'])||empty($drawsfields['display_id'])){
                    
                  $tablename='<li>'.  form_label('Display column name').form_input(array('name' => 'tablename', 'value' => '' . set_value('tablename'))).'</br><i><font color="#1A9B50">'.
                  form_label("Write the column name which will go to output the description as it is from the database", $name = "tips", $attributes = array('class' => 'tips')) . '</font></i></li>';  
                  echo $tablename;
                  
                }
                else{
                 
                   $tablename='<li>'.form_label('Display column name').form_input(array('name' => 'tablename', 'value' =>$drawsfields['display_id'] . set_value('tablename'))).'</li>';   
                   echo $tablename;
                   
                }
                
                
                
                
            }
            
        }
        
        
        
        /*******************************end****************************************************************/
        ?>
        
        

        <?php
        /*         * ********************************************************************************* */
        $db_results = $this->dataFetcher->loadInputValidations();
        if ($db_results->num_rows() > 0) {
            $outputValidation = '';

            foreach ($db_results->result_array() as $inputValidations) {
                $checked = '';

                foreach ($this->dataFetcher->loadsValidationrulesByName($inputValidations['input_rules'], $id)->result_array() as $rules) {

                    if (strcasecmp($inputValidations['input_rules'], $rules['rule_name']) == 0) {
                        $checked = "checked";
                    } else {
                        $checked = "";
                    }
                }



                $outputValidation.='<li>' . form_label() . form_checkbox(array('name' => 'validation_chck[]', 'value' => $inputValidations['input_rules'], 'checked' => $checked)) . $inputValidations['input_rules'] . '</li>';
            } echo $outputValidation;
        }

        /*         * ********************************************************************************* */

        ?>



        <li>
            <?php
            echo form_label('');
            echo form_submit(array('name' => 'update', 'value' => 'Edit Input'));
            ?>

        </li>



    </ul>
    <?php
    echo form_fieldset_close();
    echo form_close();
    ?>  

    <?php
} else {
    //echo form error
    echo 'error';
}



$this->load->view('footer');
?>
