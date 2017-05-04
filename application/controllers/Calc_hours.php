<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calc_hours extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->library("form_validation");
	}

	public function index(){
		$this->load->view('calc_hours_view');
	}

	public function check_hours(){
		$this->form_validation->set_rules('txt_h_start_monday', 'time', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('calc_hours_view');
		}
		else{
			$txt_money_per_h = $this->input->get('txt_money_per_h');

			$txt_h_start_monday = $this->input->get('txt_h_start_monday');
			$txt_h_end_monday = $this->input->get('txt_h_end_monday');

			$txt_h_start_tuesday = $this->input->get('txt_h_start_tuesday');
			$txt_h_end_tuesday = $this->input->get('txt_h_end_tuesday');
		
			$txt_h_start_wednesday = $this->input->get('txt_h_start_wednesday');
			$txt_h_end_wednesday = $this->input->get('txt_h_end_wednesday');
		
			$txt_h_start_thursday = $this->input->get('txt_h_start_thursday');
			$txt_h_end_thursday = $this->input->get('txt_h_end_thursday');
		
			$txt_h_start_friday = $this->input->get('txt_h_start_friday');
			$txt_h_end_friday = $this->input->get('txt_h_end_friday');
		
			$txt_h_start_saturday = $this->input->get('txt_h_start_saturday');
			$txt_h_end_saturday = $this->input->get('txt_h_end_saturday');

			$txt_h_start_sunday = $this->input->get('txt_h_start_sunday');
			$txt_h_end_sunday = $this->input->get('txt_h_end_sunday');

			//Calculate hours of monday
			$h_start_monday = new DateTime($txt_h_start_monday);
			$h_end_monday = new DateTime($txt_h_end_monday);
			$tot_h_monday = $h_start_monday->diff($h_end_monday)->format('%h.%i');

			//Calculate hours of tuesday
			$h_start_tuesday = new DateTime($txt_h_start_tuesday);
			$h_end_tuesday = new DateTime($txt_h_end_tuesday);
			$tot_h_tuesday = $h_start_tuesday->diff($h_end_tuesday)->format('%h.%i');

			//Calculate hours of wednesday
			$h_start_wednesday = new DateTime($txt_h_start_wednesday);
			$h_end_wednesday = new DateTime($txt_h_end_wednesday);
			$tot_h_wednesday = $h_start_wednesday->diff($h_end_wednesday)->format('%h.%i');
			//Calculate hours of thursday

			$h_start_thursday = new DateTime($txt_h_start_thursday);
			$h_end_thursday = new DateTime($txt_h_end_thursday);
			$tot_h_thursday = $h_start_thursday->diff($h_end_thursday)->format('%h.%i');

			//Calculate hours of friday
			$h_start_friday = new DateTime($txt_h_start_friday);
			$h_end_friday = new DateTime($txt_h_end_friday);
			$tot_h_friday = $h_start_friday->diff($h_end_friday)->format('%h.%i');

			//Calculate hours of saturday
			$h_start_saturday = new DateTime($txt_h_start_saturday);
			$h_end_saturday = new DateTime($txt_h_end_saturday);
			$tot_h_saturday = $h_start_saturday->diff($h_end_saturday)->format('%h.%i');

			//Calculate hours of sunday
			$h_start_sunday = new DateTime($txt_h_start_sunday);
			$h_end_sunday = new DateTime($txt_h_end_sunday);
			$tot_h_sunday = $h_start_sunday->diff($h_end_sunday)->format('%h.%i');

			//total of hours
			$tot_h = $tot_h_monday+$tot_h_tuesday+$tot_h_wednesday+$tot_h_thursday+$tot_h_friday+$tot_h_saturday+$tot_h_sunday;

			$salary_weekly = $tot_h*$txt_money_per_h;


			$array_tot_h = array(
				"tot_h_monday" => $tot_h_monday,"tot_h_tuesday" => $tot_h_tuesday,
				"tot_h_wednesday" => $tot_h_wednesday,"tot_h_thursday"=>$tot_h_thursday,
				"tot_h_friday" => $tot_h_friday, "tot_h_saturday"=>$tot_h_saturday,
				"tot_h_sunday" => $tot_h_sunday, "tot_h" => $tot_h,"salary_weekly" => $salary_weekly
			);

			$this->load->view('calc_hours_view',$array_tot_h);
		}	

	}

	public function validate_time($str)
	{
		//Assume $str SHOULD be entered as HH:MM

		list($hh, $mm) = split('[:]', $str);	

		if (!is_numeric($hh) || !is_numeric($mm))
		{
    		$this->form_validation->set_message('validate_time', 'Not numeric');
    		return FALSE;
		}
		else if ((int) $hh > 24 || (int) $mm > 59)
		{
    		$this->form_validation->set_message('validate_time', 'Invalid time');
    		return FALSE;
		}
		else if (mktime((int) $hh, (int) $mm) === FALSE)
		{
    		$this->form_validation->set_message('validate_time', 'Invalid time');
    		return FALSE;
		}

		return TRUE;
	}
}
