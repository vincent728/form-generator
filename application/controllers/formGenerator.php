<?php

/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
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


            //check if the returned results is greater than one

            if ($results->num_rows() > 0) {
                //load subsections and their repective categories

                $checkboxoutput = '';
                foreach ($results->result_array() as $value) {
                    $checkboxoutput.='<option value="' . $value['subsections_id'] . '">' . $value['subsections'] . '</option>';
                }echo form_label('sub-section(s)'). '<select name="subcat" class="autoloadcat" >' . $checkboxoutput . '</select>' . '</br></br>';
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
                    echo form_label('Categorie(s)') . '<select name="cat[]" class="autoloadcat" multiple="multiple" size="4" >' . $checkboxoutput . '</select>' . '</br></br>';
                    //load sections which does not have some categories
                }
                /////////////
            }

            ///////////////////////////////////////////////////////////////////
        }
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
                echo form_label('categories') . '<select name="cat[]" multiple="multiple" size="4">' . $concatenator . '</select>' . '</br></br>';
            }
        }
    }

//end
    public function selectEventsRepeat() {


        $results = $this->dataFetcher->getrepeats($this->input->post('e_id'));
        if ($results) {

            $checkboxoutput = '';

            foreach ($results->result_array() as $value) {

                if ($results) {


                    switch ($value['repeat_id']) {
                        case "1":
                            //if repeated weekly selected
                            $checkboxoutput.=form_checkbox(array('name' => 'event[]', 'value' => '1')) . 'monday' . '</br>' .
                                    form_checkbox(array('name' => 'event[]', 'value' => '2')) . 'tuesday' . '</br>' .
                                    form_checkbox(array('name' => 'event[]', 'value' => '3')) . 'Wedsnesdayday' . '</br>' .
                                    form_checkbox(array('name' => 'event[]', 'value' => '4')) . 'Thursday' . '</br>' .
                                    form_checkbox(array('name' => 'event[]', 'value' => '5')) . 'Friday' . '</br>';
//                            echo $checkboxoutput;


                            break;

                        case "2":
                            //if repeated bi-weekly selected
                            $checkboxoutput.=form_checkbox(array('name' => 'event[]', 'value' => '1')) . 'monday' . '</br>' .
                                    form_checkbox(array('name' => 'event[]', 'value' => '2')) . 'tuesday' . '</br>' .
                                    form_checkbox(array('name' => 'event[]', 'value' => '3')) . 'Wedsnesdayday' . '</br>' .
                                    form_checkbox(array('name' => 'event[]', 'value' => '4')) . 'Thursday' . '</br>' .
                                    form_checkbox(array('name' => 'event[]', 'value' => '5')) . 'Friday' . '</br>';


                            break;

                        case "3":
                            //if repeated monthly selected

                            $months = '';
                            for ($a = 0; $a < 30; $a++) {

                                switch ($a + 1) {
                                    case "1":

                                        $supercript = 'st';

                                        break;
                                    case "2":
                                        $supercript = 'nd';

                                        break;
                                    case "3":
                                        $supercript = 'rd';

                                        break;

                                    default:
                                        $supercript = 'th';
                                        break;
                                }
                                $months.='<option value="' . ($a + 1) . '" >' . ($a + 1) . $supercript . '</option>';
                            }
                            $checkboxoutput.='<table>
				<tr>
					<td>				
						<input type="radio" name="RepeatsMonthly" value="1" > Repeats the 
						<select name="RecurrenceMonthID">' . $months . '</select> day of each month
					</td>
				</tr>
				<tr>	
					<td>				
						<input type="radio" name="RepeatsMonthly" value="2" > Repeats the 
						<select name="RepeatsMonthWeekDayNumber">
							<option value="1st" >First</option>
							<option value="2nd" >Second</option>
							<option value="3rd" >Third</option>
							<option value="4th" >Fourth</option>
							<option value="5th" >Last</option>
						</select>
						<select name="RepeatsMonthWeekDay">
							<option value="Monday" >Monday</option>
							<option value="Tuesday" >Tuesday</option>
							<option value="Wednesday" >Wednesday</option>
							<option value="Thursday" >Thursday</option>
							<option value="Friday" >Friday</option>
							<option value="Saturday" >Saturday</option>
							<option value="Sunday" >Sunday</option>
						</select> of each month
					</td>
				</tr>
				
			
			</table>';


                            break;

                        case "4":
                            //epeats Weekly or Bi-weekly on

                            $checkboxoutput = '<table><tr>
			
				<td>				
					<input type="checkbox" name="RecurrenceDayID[]" value="1" > Monday
				</td>
				
				<td>				
					<input type="checkbox" name="RecurrenceDayID[]" value="2" > Wednesday
				</td>
				
				<td>				
					<input type="checkbox" name="RecurrenceDayID[]" value="3" > Friday
				</td>
				
				<td>				
					<input type="checkbox" name="RecurrenceDayID[]" value="4" > Sunday
				</td>
				
					</tr><tr>
				
				<td>				
					<input type="checkbox" name="RecurrenceDayID[]" value="5" > Tuesday
				</td>
				
				<td>				
					<input type="checkbox" name="RecurrenceDayID[]" value="6" > Thursday
				</td>
				
				<td>				
					<input type="checkbox" name="RecurrenceDayID[]" value="7" > Saturday
				</td>
				
			</tr></table>';



                            break;

                        default:
                            break;
                    }
                }
            }
            echo $checkboxoutput;
            ///////////////////////////////////////////////////////////////////
        }
    }

    /** controller function for pre-process the form generation */
    function formProcessor() {

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
                                $data['displayOrder'] = $_POST['order_'.$checkboxId];
                                $data['input_type_id'] = $checkboxId;
                                $data['sections_without_subsections'] = $subsection;
                                $data['category_id'] = $category;
                                $data['form_label'] = $selectedLabel;
                                $data['input_tip'] = $_POST['tip_' . $checkboxId];

                                $datas[] = $data;
                            }
                        }
                        //end
                    }
                }


                
                $results = $this->db->insert_batch('form_tbl', $datas);
                if ($results) {
                    $this->listOfCreatedForms();
                } else {
                    $this->load->view('formCreator');
                }


                //end the proccessing   
            }
        } else {

            $this->load->view('formCreator');
        }
    }

    /*     * ** form update processor */

    public function editorprocessor() {

        if ($this->input->post('edit')) {

            $this->form_validation->set_rules('cat', 'input types', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('formCreatorUpdater');
            } else {
                //update the database information
                //form processing goes here
                $datas = array();

//                $subsectionsession = $this->session->userdata('subsectionid');
//                $catid = $this->session->userdata('cat');

                $category = $this->input->post('cat');
                $subsectionid = $this->input->post('subsection_id');

                $deleteresults = $this->dataFetcher->deletecateggory($category[0]);

                if ($deleteresults) {


                    foreach ($_POST as $key => $value) {

                        ///strip the selected values from dropdown
                        if (strstr($key, "field_")) {
                            ///check if the sections has subsections
                            if (!empty($_POST['cat'])) {

                                foreach ($_POST['cat'] as $category) {
                                    //check if the submitted data has subsection
                                    if (!empty($subsectionid)) {
//                                        $subsection = $this->session->userdata('subsectionid');
                                        $subsection = $_POST['subsection_id'];
                                    } else {
                                        $subsection = '';
                                    }

                                    $arr = explode('_', $key);
                                    $checkboxId = $arr[1];
                                    $selectedCheckboxValue = $_POST['count_' . $checkboxId];
                                    $selectedLabel = $_POST['label_' . $checkboxId];
                                    $data['no_input'] = $selectedCheckboxValue;
                                    $data['displayOrder'] = $_POST['order_'.$checkboxId];
                                    $data['input_type_id'] = $checkboxId;
                                    $data['sections_without_subsections'] = $subsection;
                                    $data['category_id'] = $category;
                                    $data['form_label'] = $selectedLabel;
                                    $data['input_tip'] = $_POST['tip_' . $checkboxId];
                                    $datas[] = $data;
                                }
                            }
                            //end
                        }
                    } $results = $this->db->insert_batch('form_tbl', $datas);
                    if ($results) {
                        $this->listOfCreatedForms();
                    } else {
                        $this->load->view('formCreator');
                    }
                }
                //end the proccessing   
                ///////
            }
        }
    }

    /**
     * @controller function to delete the form
     */
    public function formdelete() {

        $id = $this->uri->segment(4);
        $deleteresults = $this->dataFetcher->deletecateggory($id);
        //check if category has been deleted
        if ($deleteresults) {

            $this->listOfCreatedForms();
        } else {

            echo 'an error occured during deletion';
        }
    }

    /*     * controller function for the pop up form anchor */

    public function generateform() {
        $id = $this->uri->segment(4);
        $sectionfilter = strtolower($this->uri->segment(3));

        //checking if the section or subsection
         $data = $this->dataFetcher->categoryDetails($id);
                $this->load->view('categoryForm', $data);

    }

    /* list all the categories which already have generated forms* */

    public function listOfCategoriesforms() {
        $this->load->view('generatedForms');
    }

    /** controller function for editing form */
    public function editform() {


        $subchekfilter = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $results = $this->dataFetcher->loadsectionFromcategory($id);
        foreach ($results->result_array() as $value) {
            $section_id = $value['section_id'];
            $section_name = $value['section_name'];
        }
        // $data['subsection_chek']=$this->dataFetcher->getSectionSubsections($data['section_id']);
        $data['section_id'] = $section_id;
        $data['sectionname'] = $section_name;
        //store section session 
//        $this->session->set_userdata('sectionid',$section_id);
//        $this->session->set_userdata('sectionname',$section_name);
        ///check whether section has got subsection

        switch ($subchekfilter) {
            case "subsec":



                $results = $this->dataFetcher->subcategoryDetails($id);
                $data['result'] = $results['results'];
                $subsec_results = $this->dataFetcher->getSectionSubsections($section_id, $id);
                //fetching the subsection selected id
                foreach ($subsec_results->result_array() as $rows) {
                    $subsectionid = $rows['subsections_id'];
                    $subsectionname = $rows['subsections'];
                    $catname = $rows['cat_name'];
                    $catid = $rows['cat_id'];
                }


                $data['subsection_id'] = $subsectionid;
                //store id into session in case an error occure then we would get advantage of session to retrieve id
                // $this->session->set_userdata('subsectionid', $subsectionid);
                $this->session->set_userdata('subsectionname', $subsectionname);
                $this->session->set_userdata('categoryname', $catname);
                $this->session->set_userdata('categoryid', $id);
                $data['catid'] = $catid;
                $data['category'] = $catname;
                $data['subsectionname'] = $subsectionname;
                //$data['category']=$catname;

                $this->load->view('formCreatorUpdater', $data);

                break;
            case "sec":


                $results = $this->dataFetcher->categoryDetails($id);
                $data['catid'] = $results['catid'];
                $data['subsection_id'] = '';
                $data['subsectionname'] = '';
                $data['category'] = $results['category'];
                $data['result'] = $results['results'];
                $this->load->view('formCreatorUpdater', $data);
                break;

            default:
                break;
        }
    }

    /*     * controller function for loading sections ,subsections if any and categories */

    public function listOfCreatedForms() {

        $this->load->view('listofforms');
    }
    /*
     * controller function for adding form inputs
     */
    public function addInputsTypes() {
        
        if($this->input->post('submit')){
            
            $this->form_validation->set_rules('inputname','input name','required');
            //$this->form_validation->set_rules('inputtype','input types','required');
            $this->form_validation->set_rules('formfieldtype','input type','required');
            $this->form_validation->set_rules('max_no_inputs','Maximum number of inputs','required');
            if($this->form_validation->run()==FALSE){
                
               $this->load->view('addFormInputsTypes');
            }
            else{
                
                
            $inputname=$this->input->post('inputname');    
            //$inputtypes=$this->input->post('inputtype');  
            $formfieldtype=$this->input->post('formfieldtype');
            $fieldtypename = str_replace(' ', '', $inputname);
            
            $tablename=$this->input->post('tablename');
            $tablecolumnid=$this->input->post('displaycolumnid');
            $tabledisplaycolumn=$this->input->post('displaycolumn');
            $max_no_inputs=$this->input->post('max_no_inputs'); 
            
            $validation_chkboxes=$this->input->post('validation_chck');
                
            
            $results=$this->dataFetcher->addFormInputsTypes($inputname,$formfieldtype,$max_no_inputs,$fieldtypename,$validation_chkboxes,$tablename,$tablecolumnid,$tabledisplaycolumn);
            
            if($results){
              //load the  list of tables
                $this->loadInputs();
            }
            else{
                
            }
                
            }
        }
        else{
            $this->load->view('addFormInputsTypes');
        }
        
    }
    
    /*
     * controller function to list all input types  from the db**/
   public function loadInputs() {
       $data['results']=$this->dataFetcher->listAllInputstypes();
       $this->load->view('listOfinputs',$data);
       
   }
   /**controller function for fetching inputs details*/
   public function editinputs() {
       $id=$this->uri->segment(3);
       $this->session->set_userdata('update_id',$id);
       $data['results']=$this->dataFetcher->loadInputTypesDetails($id);
       $this->load->view('editFormInputs',$data);
       
   }
   public function updateInputTypesDetails() {
       if($this->input->post('update')){
            
            $this->form_validation->set_rules('inputname','input name','required');
            $this->form_validation->set_rules('inputtype','input types','required');
            $this->form_validation->set_rules('max_no_inputs','Maximum number of inputs','required');
            if($this->form_validation->run()==FALSE){
                
               $this->load->view('editFormInputs');
            }
            else{
                
                
             $inputname=$this->input->post('inputname');    
            $inputtypes=$this->input->post('inputtype');  
            $max_no_inputs=$this->input->post('max_no_inputs'); 
            $results=$this->dataFetcher->updateInputsTypesDetails($inputname,$inputtypes,$max_no_inputs,$this->session->userdata('update_id'));
            
            if($results){
              //load the  list of tables
                $this->loadInputs();
            
            }
            else{
                
            }
                
            }
        }
   
       
       
   }
   /**delete input type*/
   public function deleteInput() {
       $results=$this->dataFetcher->deleteInput($this->uri->segment(3));
       if($results){
         $this->loadInputs();  
           
       }
   }
   
   /**load the select table*/
   public function addSelectFieldsInput() {
       $value=$this->input->post('select');
       $out='';
       if(strcasecmp($value,"select")==0){
           $Tablename=form_input(array('name'=>'tablename','value'=>''));
           $displaycolumn=form_input(array('name'=>'displayname','value'=>''));
           $displayid=form_input(array('name'=>'displayid','value'=>''));
           $out.='<li>'.form_input(array('name'=>'tablename','value'=>'')).'</li>
                 <li>'.form_input(array('name'=>'displayname','value'=>'')).'</li>
                 <li>'.$displayid=form_input(array('name'=>'displayid','value'=>'')).'</li>';
       
           echo $out;
       }
       
       
   }

}
?>



