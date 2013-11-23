<?php
class Blog_model extends CI_Model{
	var $blog_id;
	var $title;
	var $content;
	var $short_content;
	var $label;
	var $audtor;
	var $read_time;
	var $reply_time;
	
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * 获得博客列表
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午02:11:11
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function query_blogs($label=FALSE)
	{
		$this->load->database();
		$this->db->order_by('blog_id','desc');
		
		if($label){
			$this->db->like('label',$label);
		}
		echo $label;
		$query = $this->db->get('BLOG');
		return $query;
	}
	
	/**
	 * 获得一篇博文
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午04:24:31
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function get_blog($id)
	{
		$this->load->database();
		$this->db->where('blog_id',$id);
		$query = $this->db->get('BLOG');
		
		return $query;
	}
	
	/**
	 * 插入一条新博客
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午04:28:32
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function insert_blog($data)
	{
		$this->title = $data['title'];
		$this->content = $data['content'];
		$this->short_content = $data['short_content'];
		$this->label = "";
		$this->audtor = $data['audtor'];
		$this->read_time = 0;
		$this->reply_time = 0;
		foreach ($data['label'] as $value) {
			$this->label = $this->label.$value.";";
		}
		$this->load->database();
		$this->db->insert('BLOG',$this);
	}
	/**
	 * 编辑博客
	 */
	public function edit_blog($data){
		$label = "";
		foreach ($data['label'] as $value) {
			$label = $label.$value.";";
		}
		$data['label'] = $label;
		$this->load->database();
		$this->db->where('blog_id', $data['blog_id']);
		
		$this->db->update('BLOG',$data);
	}
	/**
	 * 读取热门博客
	 */
	public function query_hot_blogs(){
		$this->load->database();
		$this->db->order_by('read_time','desc');
		$query = $this->db->get('BLOG','3',0);
		return $query;
	}
	
	/**
	 * 删除博客
	 */
	public function delete_blog($id){
		$this->load->database();
		$this->db->where('blog_id', $id);
		$this->db->delete('BLOG');
	}
	/**
	 * 读取博客时增加点击量
	 */
	public function add_readtime_blog($read){
		$this->load->database();
		$this->db->where('blog_id', $read['blog_id']);
		$this->db->update('BLOG',$read);
	}
}