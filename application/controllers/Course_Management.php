<?php

class Course_Management extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Courses');
		$this->load->model('TeacherCourses');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
    public function index()
    {
    	$result = $this->Courses->get_courses();

		if($result)
			$data['courses'] = $result;
		else
			$data['message'] = 'You have no course yet :(';

        if ( ! file_exists(APPPATH.'views/course/course_management.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $this->load->view('main', $data);
        $this->load->view('course/course_management', $data);
    }

    public function course_create_form()
    {	
    	$this->load->view('main', []);
    	$this->load->view('course/create_course');
    }

    public function create_course()
	{
		// $this->form_validation->set_rules('user_name','Username','required');
		// $this->form_validation->set_rules('password','Password','required');
		// if($this->form_validation->run() == FALSE)
		if(FALSE)
		{
			$this->load->view('main', []);
			$this->load->view('course/create_course');
		}
		else
		{
			$user_hash = md5($this->input->post('password'));
			$post_array = array(
			// 'id' => strtolower(trim(com_create_guid(), '{}')),
			'name' => $this->input->post('name'),
			'short_name' => $this->input->post('short_name'),
			// 'deleted' => 0,
			'code' => $this->input->post('code'),
			'credit_hours' => $this->input->post('credit_hours'),
			'description' => $this->input->post('description')
			);
			$result = $this->Courses->add_course($post_array);
			$data['user_data'] = $post_array;
			$result = true;
			if($result)
			{
				redirect('/Course_Management', 'refresh');
				//$this->load->view('user_management', $data);
			}
			else
			{
				$data['message'] = 'Some problem occured!! Could not save the course :(';
				$this->load->view('main', $data);
				$this->load->view('course/course_management', $data);
			}
		}
	}
	public function delete_course($course_id)
	{
		$result = $this->Courses->delete_course($course_id);
		if($result)
		{
			redirect('/Course_Management', 'refresh');
		}
		else
		{
			$data['message'] = 'Some problem occured!! Could not delete course :(';
			$this->load->view('main', $data);
			$this->load->view('course/course_management', $data);
		}
	}
	public function edit_course($course_id)
	{
		$result = $this->Courses->get_course_details($course_id);
		if($result)
		{
			$data['course'] = $result;
			// $this->form_validation->set_rules('user_name','Username','required');
			// if($this->form_validation->run() == FALSE)
			if(empty($this->input->post()))
			{
				$this->load->view('main', $data);
				$this->load->view('course/edit_course', $data);
			}
			else
			{
				$data = array(
				'name' => $this->input->post('name'),
				'short_name' => $this->input->post('short_name'),
				'code' => $this->input->post('code'),
				'credit_hours' => $this->input->post('credit_hours'),
				'description' => $this->input->post('description'),
				);
				$result = $this->Courses->edit_course($data, $course_id);
				if($result)
				{
					redirect('/Course_Management', 'refresh');
				}
				else
				{
					$data['message'] = 'Some problem occured!! Could not edit the course :(';
					$this->load->view('main', $data);
					$this->load->view('course/course_management', $data);
				}
			}
		}
		else
		{
			$data['message'] = 'Some problem occured!! Could not load the user :(';
			$this->load->view('main', $data);
			$this->load->view('course/course_management', $data); 
		}
	}

	public function assign_teachers($course_id){

		$result = $this->Courses->get_course_details($course_id);
		$teachers = $this->db->get_where('users' , [ 'type' => 'teacher' ]);
		$teachers = $teachers->result();

		$post = $this->input->post();
		if(!empty($post)){
			
			$data = [
				'course_id' => $course_id,
				'teacher_id' => $post['teachers'],
			];
			$this->TeacherCourses->add_course($data);

			redirect('/Course_Management', 'refresh'); 
		}

		$this->load->view('main', []);
		$this->load->view('course/assign_teachers', [
			'course' => $result,
			'teachers' => $teachers,
		]);	
	}
}