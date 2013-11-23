<?php
class Message_model extends CI_Model{
	var $message_content;
	var $message_name;
	var $message_email;
	var $parent_message;
	var $blog_id;

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * 查出分页留言
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午04:07:55
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function query_messages($data,$size='10'){
		$this->load->database();
		
		//不是博客留言
		$this->db->where('blog_id',$data['blog_id']);
		$this->db->order_by('id','desc');
		$query = $this->db->get('Message',$size,$data['offset']);
		return $query;
	}
	
	public function query_child_messages($id){
		$this->db->datebase();
		$this->db->where('id',$id);
		$query = $this->db->get('Message');
		return $query;
	}
	
	/**
	 * 插入一条新留言
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午04:28:51
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function insert_message($date){
		$this->message_content = $date['message_content'];
		$this->message_name = $date['message_name'];
		$this->message_email = $date['message_email'];
		$this->parent_message = $date['parent_message'];
		$this->blog_id = $date['blog_id'];
		
		$this->load->database();
		$this->db->insert('MESSAGE',$this);
	}
}