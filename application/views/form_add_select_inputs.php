<?php
/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */
$this->load->view('header');
$this->load->view('content');

$data = array('name' => '', 'class' => 'myform');
echo form_open('formGenerator/addinputforselectfieldprocessor/', $data);
echo form_fieldset();
?>
<ul>

    <li>
        <?php
        if (form_error('inputname')) {
          echo '<div class="error">'.form_error('inputname').'</div>';
        }
        echo form_label('input name');
        echo form_input(array('name' => 'inputname', 'value' => '' . set_value('inputname')));
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