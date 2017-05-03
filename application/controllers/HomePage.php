<?php

class HomePage extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');	
	}

	public function index()
	{
		if(!empty($this->session->userdata['session_array']['type']))
		{
			if($this->session->userdata['session_array']['type'] == 'admin')
			{
				$this->load->view('home_admin');
			}
			else if ($this->session->userdata['session_array']['type'] == 'student')
			{
				$this->load->view('home_student');	
			}
			else if ($this->session->userdata['session_array']['type'] == 'teacher')
			{
				$this->load->view('home_teacher');	
			}
			else if ($this->session->userdata['session_array']['type'] == 'parent')
			{
				$this->load->view('home_parent');
			}	
		}
		else
		{
			redirect('/Authentication', 'refresh');	
		}			
	}
}