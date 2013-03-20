<?php
$this->load->view('header');
$this->load->view('content');
?>
<?php
$data = array('id' => '', 'class' => 'myformcreator');
echo form_open_multipart('formGenerator/formProcessor/', $data);
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
        <select name="section" class="section">

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

            <div class="categories">
                <!--.here the goes the ajax triggered selection.--> 


            </div>

            </tr>
            <tr>
            <li>

                <div class="subcat">

                </div>

            </li>

            </tr>

        </table>




    </li>

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

            $this->load->view('form_input_types');
            echo form_fieldset_close();
            ?>



        </ul>


    </li>

    <li>
        <?php
        $data = array('name' => 'submit', 'value' => 'submit', 'class' => 'submit');
        echo form_submit($data);
        echo form_fieldset_close();
        echo form_close();
        ?>

    </li>

</ul> 


<?php
$this->load->view('footer');
?>