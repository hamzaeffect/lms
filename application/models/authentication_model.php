<?php

Class authentication_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function login_auth($data) 
	{
		$user_name = $data['username'];
		$user_hash = $data['password'];
		$query = $this->db->get_where('users', array('user_name' => $user_name, 'user_hash' => md5($user_hash)));
		/*$condition = "email =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();*/
		if ($query->num_rows() == 1) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}
	
	public function read_user_information($username) 
	{
		$query = $this->db->get_where('users', array('email' => $username));
		/*$condition = "email =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();*/
		
		if ($query->num_rows() == 1)
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}
	
	public function get_author_details($user_id)
	{
		$query = $this->db->get_where('users', array('email' => $user_id));
		if($query->num_rows() == 1)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

}

?>