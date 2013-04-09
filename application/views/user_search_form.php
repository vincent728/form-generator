<?php
$this->load->view('header');
$this->load->view('content');

$data = array('id' => '', 'class' => 'myformcreator');
echo form_open_multipart('mastersearch/loadsearchbox/', $data);
echo form_fieldset('');
?>
<ul>
    <li>

        <?php
//error checking
        if (form_error('section')) {
            echo '<div class="error">';
            echo form_error("section") . form_error();
            echo '</div>';
        }

        echo form_label('section');
        ?>
        <select name="section" class="searchsection">

            <option  value="" selected="">--Select section--</option>
            <?php
            $results = $this->dataFetcher->sectionsLoader();
            $out = '';
            foreach ($results->result_array() as $section) {

                $out.='<option value="' . $section['section_id'] . set_value('section') . '">' . $section['section_name'] . '</option>';
            } echo $out;
            ?>
        </select> 


    </li>
    <li>
        <?php
        if (form_error('cat')) {
            echo '<div class="error">';
            echo form_error("cat") . form_error();
            echo '</div>';
        }
        ?>
        <table class="mytable" width="" border="0">
            <tr>

            <div class="searchcategory">
                <!--.here the goes the ajax triggered selection.--> 


            </div>

            </tr>
            <tr>
            <li>

                <div class="subcategories">

                </div>

            </li>

            </tr>

        </table>

    </li>


</ul>

<?php
echo form_submit($name="submit", $value='search');
echo form_fieldset_close();
echo form_close();
$this->load->view('footer');
?>
