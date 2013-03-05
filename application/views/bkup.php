//     $(document).ready(function(){
//            $("#events").change(function(){
//            var y = $(this).val()
//            var data='';
//            if(y>0){
//            var dataz='<?php echo $optionValues; ?>';
//            var statuses='<?php echo $status_1.$status_2; ?>';
//            
//            if(y==1){
//                
//                 data +='<li><input type="checkbox" name="day[]" value="monday"></li>';
//                 data +='<li><input type="checkbox" name="day[]" value="tuesday"></li>';
//                 data +='<li><input type="checkbox" name="day[]" value="Wednesday"></li>';
//                 data +='<li><input type="checkbox" name="day[]" value="Thursday"></li>';
//                
//                
//            }
//            elseif(y==2){
//                
//                
//            }
//     
////       data +='</ul></fieldset>';
//           }
//            $('#display').html(data);
//            });
//            });






<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class FormGenerator extends CI_Controller {

    public function index() {
        //load the first phase form generator

        $this->load->view('formCreator');
    }

    /*     * controller function to load the subsections */

    public function setSectionId() {

        $results = $this->dataFetcher->subsectionLoader($this->input->post('id'));
     
        if ($results) {
            
                 $checkboxoutput = '';
            foreach ($results->result_array() as $value) {
                $data = array('name' => 'cat[]', 'value' => $value['cat_id'],'class' => 'categories');
                $checkboxoutput.=form_checkbox($data) . nbs(3) . $value['cat_name'] . '<br>';
            }
            echo $checkboxoutput;
            ///////////////////////////////////////////////////////////////////
        }
    }

    /*     * controller function for the ajax autoselect */

//    public function selectEventsRepeat() {
//
//
//        $results = $this->dataFetcher->getrepeats($this->input->post('e_id'));
//        if ($results) {
//            $checkboxoutput = '';
//
//            foreach ($results->result_array() as $value) {
//
//
//
//                if ($value['repeat_id'] == 1) {
//
//                    $checkboxoutput.=form_checkbox(array('name' => 'event[]', 'value' => '1')) . 'monday' . '</br>' .
//                            form_checkbox(array('name' => 'event[]', 'value' => '2')) . 'tuesday' . '</br>' .
//                            form_checkbox(array('name' => 'event[]', 'value' => '3')) . 'wednesday' . '</br>';
//                    echo $checkboxoutput;
//                } elseif ($value['repeat_id'] == 2) {
//
//                    $checkboxoutput = form_checkbox(array('name' => 'event[]', 'value' => '1')) . 'monday' . '</br>' .
//                            form_checkbox(array('name' => 'event[]', 'value' => '2')) . 'tuesday' . '</br>' .
//                            form_checkbox(array('name' => 'event[]', 'value' => '3')) . 'wednesday' . '</br>';
//
//                    echo $checkboxoutput;
//                }
//
////                $data = array('name' => 'event[]', 'value' => $value['repeat_id'], 'class' => 'repeat');
////                $checkboxoutput.=form_checkbox($data) . nbs(3) . $value['events'] . '<br>';
//            }
//            echo $checkboxoutput;
//            ///////////////////////////////////////////////////////////////////
//        }
//    }

    /** controller function for pre-process the form generation */
    public function formProcessor() {

        if ($this->input->post('submit')) {

            $datas = array();

            foreach ($_POST as $key => $value) {

                ///strip the selected values from dropdown


                if (strstr($key, "field_")) {
                    foreach ($_POST['cat'] as $category) {
                        $arr = explode('_', $key);
                        $checkboxId = $arr[1];
                        $selectedCheckboxValue = $_POST['count_' . $checkboxId];
                        $selectedLabel = $_POST['label_' . $checkboxId];
                        $data['no_input'] = $selectedCheckboxValue;
                        $data['input_type_id'] = $checkboxId;
                        $data['category_id'] = $category;
                        $data['form_label'] = $selectedLabel;
                        $data['input_tip'] = $_POST['tip_' . $checkboxId];

                        $datas[] = $data;
                    }
                }
            }

            $results = $this->db->insert_batch('form_tbl', $datas);

            if ($results) {
                $this->listOfCategoriesforms();
            } else {
                $this->load->view('formCreator');
            }
        } else {

            $this->load->view('formCreator');
        }
    }

    /*     * controller function for the pop up form anchor */

    public function generateform() {
        $id = $this->uri->segment(3);
        $data = $this->dataFetcher->categoryDetails($id);
        $this->load->view('categoryForm', $data);
    }

    /* list all the categories which already have generated forms* */

    public function listOfCategoriesforms() {
        $this->load->view('generatedForms');
    }

}

?>
