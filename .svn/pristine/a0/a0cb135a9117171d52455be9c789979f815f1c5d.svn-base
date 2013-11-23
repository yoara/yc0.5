<?php
class Blog_pic_model extends CI_Model{
	var $blog_id;
	var $pic_url;
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * 查找对应博客图片
	 */
	public function query_blog_pics($blog_id)
	{
		$this->load->database();
		$this->db->where('blog_id',$blog_id);
		$query = $this->db->get('BLOG_PIC');
		return $query;
	}
	
	/**
	 * 插入对应博客图片
	 */
	public function insert_blog($data)
	{
		$this->blog_id = $data['blog_id'];
		$this->pic_url = $data['pic_url'];
		
		$this->load->database();
		$this->db->insert('BLOG_PIC',$this);
	}
}