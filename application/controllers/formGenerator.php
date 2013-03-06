<?php

/*
 * @Author :VincenT David 
 * @Email  :vincentdaudi@gmail.com
 * @Skype id :vincentdaudi
 */
?>
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

    /* * controller function to load the subsections */

    public function setSectionId() {

        $results = $this->dataFetcher->subsectionLoader($this->input->post('id'));

        if ($results) {

            
            //check if the returned results is greater than one
            
            if($results->num_rows()>0){
                
               $checkboxoutput = '';
             foreach ($results->result_array() as $value) {

                $data = array('name' => 'cat[]', 'value' => $value['subsections_id'], 'class' => 'categories');

              $checkboxoutput.=form_checkbox($data) . nbs(3) . $value['subsections'] . '<br>';
          
            }echo $checkboxoutput;  
                
            }
           
            ///////////////////////////////////////////////////////////////////
        }
    }
    
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
                            form_checkbox(array('name' => 'event[]', 'value' => '4')) . 'Thursday' . '</br>'.
                            form_checkbox(array('name' => 'event[]', 'value' => '5')) . 'Friday' . '</br>' ;
//                            echo $checkboxoutput;


                            break;
                        
                         case "2":
                             //if repeated bi-weekly selected
                             $checkboxoutput.=form_checkbox(array('name' => 'event[]', 'value' => '1')) . 'monday' . '</br>' .
                            form_checkbox(array('name' => 'event[]', 'value' => '2')) . 'tuesday' . '</br>' .
                            form_checkbox(array('name' => 'event[]', 'value' => '3')) . 'Wedsnesdayday' . '</br>' .
                            form_checkbox(array('name' => 'event[]', 'value' => '4')) . 'Thursday' . '</br>'.
                            form_checkbox(array('name' => 'event[]', 'value' => '5')) . 'Friday' . '</br>' ;


                            break;
                        
                         case "3":
                             //if repeated monthly selected
                             
                             $months='';
                             for($a=0; $a<30; $a++){
                               
                                 switch ($a+1) {
                                     case "1":
                                        
                                          $supercript='st';

                                         break;
                                     case "2":
                                         $supercript='nd';

                                         break;
                                      case "3":
                                         $supercript='rd';

                                         break;

                                     default:
                                         $supercript='th';
                                         break;
                                 }
                                 $months.='<option value="'.($a+1).'" >'.($a+1).$supercript.'</option>';
                             
                             }
                             $checkboxoutput.='<table>
				<tr>
					<td>				
						<input type="radio" name="RepeatsMonthly" value="1" > Repeats the 
						<select name="RecurrenceMonthID">'.$months.'</select> day of each month
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

       
                $datas = array();
                

                
                
                foreach ($_POST as $key => $value) {
                    
                    ///strip the selected values from dropdown
                 

                        if(strstr($key,"field_")){
                            
                            
                            ///check if the sections has subsections
                            
                             foreach($_POST['cat'] as $category)
                            {
                                $arr= explode('_', $key);
                                $checkboxId = $arr[1];
                                $selectedCheckboxValue= $_POST['count_' . $checkboxId];
                                $selectedLabel= $_POST['label_' . $checkboxId];
                                $data['no_input'] = $selectedCheckboxValue;
                                $data['input_type_id'] = $checkboxId;
                                $data['category_id'] = $category;
                                $data['form_label']=$selectedLabel;
                                $data['input_tip']=$_POST['tip_'.$checkboxId];
                                
                                $datas[] = $data;
                            }
                            
//                            if(count($_POST['cat'])>0){
//                                
//                           
//                                
//                                
//                                
//                                
//                            }
//                            else{
//                                
//                                
//                                
//                            }
                            
                            
                           


                        }

                    }

                     $results=$this->db->insert_batch('form_tbl',$datas);
                     if($results){
                       $this->listOfCategoriesforms();
                     }
                     else{
                        $this->load->view('formCreator');
                     }
                   

                    
        } else {

            $this->load->view('formCreator');
        }
    }
    
    
    
    /**controller function for the pop up form anchor*/
    
    public function generateform() {
        $id=$this->uri->segment(3);
        $data=$this->dataFetcher->categoryDetails($id);
        $this->load->view('categoryForm',$data);
        
    }
    /*list all the categories which already have generated forms**/
    
    public function listOfCategoriesforms() {
       $this->load->view('generatedForms');
        
    }

}

?>


