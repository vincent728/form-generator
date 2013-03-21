<?php
/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */
$this->load->view('header');
$this->load->view('content');


$data = array('name' => '', 'class' => 'myform');
echo form_open('formGenerator/addInputsTypes/', $data);
echo form_fieldset();
?>
<ul>

    <li>
        <?php
        if (form_error('inputname')) {
            echo form_error('inputname');
        }
        echo form_label('input name');
        echo form_input(array('name' => 'inputname', 'value' => '' . set_value('inputname')));
        ?>

    </li>
<!--    <li>
        <?php
//        if (form_error('inputtypes')) {
//            echo form_error('inputtypes');
//        }
//        echo form_label('input type');
//        echo form_input(array('name' => 'inputtype', 'value' => '' . set_value('inputtype')));
        ?>

    </li>-->
    <li>
        <?php
        if (form_error('max_no_inputs')) {
            echo form_error('max_no_inputs');
        }
        echo form_label('Maximum number of inputs');
        echo form_input(array('name' => 'max_no_inputs', 'value' => ''));
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
            <option value="time">Time</option>
            <option value="select">select</option>
            <option value="multiselect">Multi-select</option>
            <option value="textarea">password input</option>
            <option value="checkbox">check box</option>
            <option value="textinput">Text input</option>
            <option value="radio">radio input</option>
            <option value="repeat">repeat</option>
            <option value="file">file input</option>
            <option value="price">price input</option>
            <option value="starttime">Start time</option>
            <option value="endtime">End time</option>
            
            
        </select>
        
    </li>
    
    <div class="selectD"></div>
    
     <li>
        <?php
        if (form_error('tablename')) {
            echo form_error('tablename');
        }
        echo form_label('Draws form table name');
        echo form_input(array('name' => 'tablename', 'value' => '' . set_value('tablename')));
        ?>

    </li>
    <li>
        <?php
        if (form_error('displaycolumnid')) {
            echo form_error('displaycolumnid');
        }
        echo form_label('hidden display column id');
        
        echo form_input(array('name' => 'displaycolumnid', 'value' => '' . set_value('displaycolumnid'))).'</br><i><font color="#1A9B50">'.
             form_label("Write the column ID as it is from the database", $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
        ?>

    </li>
    <li>
        <?php
        if (form_error('displaycolumn')) {
            echo form_error('displaycolumn');
        }
        echo form_label('Display column name');
        
        echo form_input(array('name' => 'displaycolumn', 'value' => '' . set_value('displaycolumn'))).'</br><i><font color="#1A9B50">'.
             form_label("Write the column name which will go to output the description as it is from the database", $name = "tips", $attributes = array('class' => 'tips')) . '</font></i>';
        ?>

    </li>
    
            <?php
            $db_results=$this->dataFetcher->loadInputValidations();
            if($db_results->num_rows()>0){
                $outputValidation='';
                foreach ($db_results->result_array() as $inputValidations) {
                
                if(strcasecmp($inputValidations['input_rules'],"required")==0){
                   $checked="checked"; 
                }else{
                    $checked="";
                }    
                    
                $outputValidation.='<li>'.  form_label().form_checkbox(array('name'=>'validation_chck[]','value'=>$inputValidations['input_rules'],'checked'=>$checked)).$inputValidations['input_rules'].'</li>';
                } echo $outputValidation;
                
            }
          ?>
  

    <li>
        <?php
        echo form_label('');
        echo form_submit(array('name' => 'submit', 'value' => 'add'));
        ?>

    </li>



</ul>
<?php
echo form_fieldset_close();
echo form_close();

$this->load->view('footer');
?>
