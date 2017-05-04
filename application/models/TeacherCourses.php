
<?php

class TeacherCourses extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	// public function get_courses()
	// {
	// 	// $this->db->order_by('date_entered', 'ASC');
	// 	// $this->db->where('deleted', 0);
	// 	$query = $this->db->get_where('courses');
	// 	if($query->num_rows() > 0)
	// 	{
	// 		return $query->result_array();
	// 	}
	// 	return false;
	// }
	// public function get_course_details($course_id)
	// {
	// 	$query = $this->db->get_where('courses', array('id' => $course_id));
	// 	if($query->num_rows() == 1)
	// 	{
	// 		return $query->result_array();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }
	public function add_course($data)
	{
		$this->db->insert('teacher_courses', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function delete_course($course_id)
	{
		//$query = $this->db->delete('users', array('id' => $user_id));
		$this->db->where('id', $course_id)->delete('courses');
		// $this->db->update('courses', array('deleted' => 1));
		if($this->db->affected_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function edit_course($data, $course_id)
	{
		$this->db->where('id', $course_id);
		$this->db->update('courses', $data);
		if($this->db->affected_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	// public function get_username($user_id)
	// {
	// 	$query = $this->db->get_where('users', array('email' => $user_id));
	// 	if($query->num_rows() == 1)
	// 	{
	// 		return $query->result_array();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }
}
?>