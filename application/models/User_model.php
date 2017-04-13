
<?php

class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_users()
	{
		$this->db->order_by('date_entered', 'ASC');
		$this->db->where('deleted', 0);
		$query = $this->db->get_where('users');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}
	public function get_user_details($user_id)
	{
		$query = $this->db->get_where('users', array('id' => $user_id));
		if($query->num_rows() == 1)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}
	public function add_user($data)
	{
		$this->db->insert('users', $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function delete_user($user_id)
	{
		//$query = $this->db->delete('users', array('id' => $user_id));
		$this->db->where('id', $user_id);
		$this->db->update('users', array('deleted' => 1));
		if($this->db->affected_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function edit_user($data, $user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
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