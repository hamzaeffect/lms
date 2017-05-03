<?php

//session_start(); 

Class User_Authentication extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('form');
		
		$this->load->library('form_validation');
		
		$this->load->library('session');
		
		$this->load->model('authentication_model');
		
		// if(isset($this->session->user_data['session_array']))
		// {
		// 	redirect('/Home', 'refresh');
		// }	
	}
	
	public function index()
	{
		//if(!isset($this->session->user_data['session_array']))
		if(!isset($this->session->user_data['session_array']))
		{
			$this->load->view('login');
		}
		else
		{
			redirect('/Home', 'refresh');			
		}
		//$this->load->view('xpages/login');
	}

	public function user_auth_process()
	{
	
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			//if(isset($this->session->userdata['session_array']))
			$this->load->view('login');
		} 
		else
		{
			$data = array(
				'username' => $this->input->post('username'), 
				'password' => $this->input->post('password')
			);
			$result = $this->authentication_model->login_auth($data);
			if ($result != FALSE)
			{
				$session_data = array(
					'user_id' => $result[0]->id,
					'user_name' => $result[0]->user_name,
					'type' => $result[0]->type,
				);
				//file_put_contents("logs.txt",$session_data);
				$this->session->set_userdata('session_array', $session_data);
				//$this->session->user_data['logged_in']['user_name'];
				//$data['session_info'] = $sess['logged_in']['user_name']; 
				//var_dump($session_data);
				redirect('/Home', 'refresh');
				//$this->load->view('home');
			}
			else
			{
				$data['error_message'] = 'Invalid Username or Password';
				$this->load->view('login', $data);
			}
		}
	}
	public function logout() 
	{
		$this->session->unset_userdata('session_array');
		redirect('/Authentication', 'refresh');
	}
}

?>