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
    <li>
        <?php
        if (form_error('inputtypes')) {
            echo form_error('inputtypes');
        }
        echo form_label('input type');
        echo form_input(array('name' => 'inputtype', 'value' => '' . set_value('inputtype')));
        ?>

    </li>
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
