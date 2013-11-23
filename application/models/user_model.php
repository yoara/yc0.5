<?php
class User_model extends CI_Model{
	var $name;
	var $password;
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function getUserByNameAndPwd($date){
		$this->name = $date['name'];
		$this->password = $date['password'];
		
		$this->load->database();
		$this->db->where('name', $this->name);
		$this->db->where('password', $this->password);
		$query = $this->db->get('USER');
		
		return $query;
	}
}