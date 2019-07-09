<?php 

class Survey extends CI_Controller
{
	public function index(){
		$this->load->view('survey/view_survey_header');
		$this->load->view('survey/view_survey_default');
		$this->load->view('survey/view_survey_footer');
	}

	public function isi_survey(){
		$this->load->view('survey/view_survey_header');
		$this->load->view('survey/view_survey');
		$this->load->view('survey/view_survey_footer');
	}

}


