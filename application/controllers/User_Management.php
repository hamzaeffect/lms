<?php

class User_Management extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
    public function index()
    {
    	$result = $this->User_model->get_users();

		if($result)
			$data['users'] = $result;
		else
			$data['message'] = 'You have no user yet :(';

        if ( ! file_exists(APPPATH.'views/user_management.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $this->load->view('user_management', $data);
    }
    public function user_create_form()
    {
    	$this->load->view('create_user');
    }
    public function create_user()
	{
		$this->form_validation->set_rules('user_name','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('create_user');
		}
		else
		{
			$user_hash = md5($this->input->post('password'));
			$post_array = array(
			'id' => strtolower(trim(com_create_guid(), '{}')),
			'user_name' => $this->input->post('user_name'),
			'user_hash' => $user_hash,
			'deleted' => 0,
			'date_entered' => date("Y-m-d H:i:s"),
			'date_modified' => date("Y-m-d H:i:s"),
			'active' => $this->input->post('active'),
			'type' => $this->input->post('type')
			);
			$result = $this->User_model->add_user($post_array);
			$data['user_data'] = $post_array;
			$result = true;
			if($result)
			{
				redirect('/User_Management', 'refresh');
				//$this->load->view('user_management', $data);
			}
			else
			{
				$data['message'] = 'Some problem occured!! Could not save the user :(';
				$this->load->view('user_management', $data);
			}
		}
	}
	public function delete_user($user_id)
	{
		$result = $this->User_model->delete_user($user_id);
		if($result)
		{
			redirect('/User_Management', 'refresh');
		}
		else
		{
			$data['message'] = 'Some problem occured!! Could not delete user :(';
			$this->load->view('user_management', $data);
		}
	}
	public function edit_user($user_id)
	{
		$result = $this->User_model->get_user_details($user_id);
		if($result)
		{
			$data['user'] = $result;
			$this->form_validation->set_rules('user_name','Username','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_user', $data);
			}
			else
			{
				$data = array(
				'user_name' => $this->input->post('user_name'),
				'date_modified' => date("Y-m-d H:i:s"),
				'active' => $this->input->post('active'),
				'type' => $this->input->post('type')
				);
				$result = $this->User_model->edit_user($data, $user_id);
				if($result)
				{
					redirect('/User_Management', 'refresh');
				}
				else
				{
					$data['message'] = 'Some problem occured!! Could not edit the user :(';
					$this->load->view('user_management', $data);
				}
			}
		}
		else
		{
			$data['message'] = 'Some problem occured!! Could not load the user :(';
			$this->load->view('user_management', $data); 
		}
	}
}