<?php

class Mastersearch extends CI_Controller {

    //index page
    public function index() {

        $this->load->view('searchform');
    }

    /* controller function for search filter    */

    public function searchfilter() {

        // $data['name'] = $this->dataFetcher->sectionNames($this->input->post('id'));
        $results = $this->dataFetcher->subsectionLoader($this->input->post('id'));

        if ($results) {
            //check if the returned results is greater than one

            if ($results->num_rows() > 0) {
                //load subsections and their repective categories

                $checkboxoutput = '';
                foreach ($results->result_array() as $value) {
                    $checkboxoutput.='<option value="' . $value['subsections_id'] . '">' . $value['subsections'] . '</option>';
                }echo form_label('sub-section(s)') . '<select name="subcat" class="autoload" ><option value="">--select an option--</option>' . $checkboxoutput . '</select>' . '</br></br>';
            } else {
                ////////////
                //for sections with no subsections
                $checkboxoutput = '';
                $resultwithnosubsections = $this->dataFetcher->categoriesLoaderwithoutsubsections($this->input->post('id'));
                if ($resultwithnosubsections->num_rows() > 0) {

                    $selectopt_sub = '';
                    foreach ($resultwithnosubsections->result_array() as $subsectionscategorires) {
                        $checkboxoutput.='<option value="' . $subsectionscategorires['cat_id'] . '">' . $subsectionscategorires['cat_name'] . '</option>';
                    }
                    echo form_label('Categorie(s)') . '<select name="cat[]" class="autoload" ><option value="">--select an option--</option>' . $checkboxoutput . '</select>' . '</br></br>';
                    //load sections which does not have some categories
                }
                /////////////
            }

            ///////////////////////////////////////////////////////////////////
        }


        ///////////////////////////////////////////////////////////////////
    }

    /*     * controller function to load categories from subsection */

    public function selectCategory() {

        $results = $this->dataFetcher->categoriesautoLoader($this->input->post('catid'));

        if ($results) {

            if ($results->num_rows() > 0) {
                $concatenator = '';
                foreach ($results->result_array() as $value) {
                    $concatenator.='<option value="' . $value['cat_id'] . '">' . $value['cat_name'] . '</option>';
                }
                echo form_label('categories') . '<select name="cat[]"   class="form-category"><option value="">--select an option--</option>' . $concatenator . '</select>' . '</br></br>';
            }
        }
    }

//end
    public function processorforcreatedsearchform() {
        
              if ($this->input->post('submit')) {

            //validate form select field if the section has  been selected

            $this->form_validation->set_rules('section', 'section', 'required');
            $this->form_validation->set_rules('cat', 'form category', 'required');
            $x = $this->input->post('cat');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('formCreator');
            } else {

                //form processing goes here
                $datas = array();
                foreach ($_POST as $key => $value) {

                    ///strip the selected values from dropdown
                    if (strstr($key, "field_")) {

                        ///check if the sections has subsections

                        if (!empty($_POST['cat']) && count($_POST['cat'])) {

                            foreach ($_POST['cat'] as $category) {
                                //check if the submitted data has subsection
                                if (!empty($_POST['subcat'])) {
                                    $subsection = $_POST['subcat'];
                                } else {
                                    $subsection = '';
                                }


                                $arr = explode('_', $key);
                                $checkboxId = $arr[1];
                                $selectedCheckboxValue = $_POST['count_' . $checkboxId];
                                $selectedLabel = $_POST['label_' . $checkboxId];
                                $data['no_input'] = $selectedCheckboxValue;
                                $data['displayorder'] = $_POST['order_'.$checkboxId];
                                $data['input_type'] = $checkboxId;
                                $data['sectionwithsubsection_id'] = $subsection;
                                $data['category_id'] = $category;
                                $data['label'] = $selectedLabel;
                                //$data['input_tip'] = $_POST['tip_' . $checkboxId];

                                $datas[] = $data;
                            }
                        }
                        //end
                    }
                }


                
                $results = $this->db->insert_batch('search_forms', $datas);
                if ($results) {
                    $this->listofcreatedsearchforms();
                } else {
                    $this->load->view('searchform');
                }


                //end the proccessing   
            }
        } else {

            $this->load->view('searchform');
        }
        
        
    }
    
    
    //list of created search forms
    public function listofcreatedsearchforms() {
        $this->load->view('listofsearchforms');
    }
    
    
    
      /*     * controller function for the pop up form anchor */

    public function generateform() {
        $id = $this->uri->segment(3);
        $data = $this->dataFetcher->searchform($id);
         $this->load->view('categoryForm', $data);

    }

}

?>
