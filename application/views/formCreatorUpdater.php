<?php
/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */

$this->load->view('header');
$this->load->view('content');


if (form_error()) {

    //set section id and name and subsection of any in session
} else {
    $section = '';
    $sectionid = '';
    $subsectionid = '';
    $subsectionname = '';
    $cat = '';
}

//retrieving from session
$catname = $this->session->userdata('categoryname');
$section = $this->session->userdata('sectionname');
$sectionid = $this->session->userdata('sectionid');
$subsectionname = $this->session->userdata('subsectionname');
$subsectionid = $this->session->userdata('subsectionid');
// $catid=$this->session->userdata('categoryid');

if (!empty($catname)) {
    $category = $catname;
}

$data = array('id' => '');
///the section name should be displayed of here

echo form_open_multipart('formGenerator/editorprocessor/', $data);
echo form_fieldset('');
echo 'section name :' . $sectionname . '</br>';
echo form_hidden('section_id', $section_id);
echo form_hidden('cat[]', $catid);

if (!empty($subsectionname)) {

    echo 'subsection name :' . $subsectionname . '</br>';
    echo form_hidden('subsection_id', $subsection_id);
}

echo 'Category :' . $category . '</br>';
?>
<ul>

    <li>

        <?php
        echo form_label('select the input types');
        ?>
        <ul>

            <?php
            echo form_fieldset();

            if (form_error('inputs')) {

                echo form_error('inputs');
            }

            $data['results'] = $result;
            $this->load->view('edit_form_input_types', $data);
            echo form_fieldset_close();
            ?>
        </ul>
   </li>
</ul> 

<?php
$data = array('name' => 'edit', 'value' => 'Edit');
echo form_submit($data);
echo form_fieldset_close();
echo form_close();
$this->load->view('footer');
?>