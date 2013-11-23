<?php
require_once "application/config/My_constants.php";
class Blog extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	/**
	 * 插入一条博客
	 */
	
	public function insert_blog()
	{
		$this->check_user();
		
		$data = array(
			'title'=>$this->input->post('title')?$this->input->post('title'):'无标题',
			'content'=>$this->input->post('content')?$this->input->post('content'):'无内容',
			'short_content'=>$this->input->post('short_content')?$this->input->post('short_content'):'无显示内容',
			'label'=>$this->input->post('labels')?$this->input->post('labels'):array('杂文'),
			'audtor'=>$this->session->userdata(SESSION_NAME)
		);
		if($data['short_content']){
			if(sizeof($data['short_content'])>200){
				$data['short_content'] = substr($data['short_content'], 0,200);
			}else{
				$data['short_content'] = substr($data['short_content'], 0);
			}
		}
		//先增加对应的标签
		$this->load->model('Label_model','label');
		foreach ($data['label'] as $value) {
			$_label['name'] = $value;
			$this->label->add_label_num($_label);
		}
		
		$this->load->model('Blog_model','blog');
		$this->blog->insert_blog($data);
		
		echo "<script>alert('博客编写完成');</script>";
		$this->blog_list();
	}
	/**
	 * 跳转到博客编写页面
	 */
	public function go_blog(){
		$this->check_user();
		$id = $this->input->post('blog_id');
		if($id!=NULL){
			$this->load->model('Blog_model','blog');
			$query = $this->blog->get_blog($id);
			$data['blog_info'] = $query->row_array();
		}else{
			$data['blog_info'] = array(
				'title'=>'',
				'short_content'=>'',
				'content'=>''
			);
		}
		$data['admin_title'] = '博客编写';
		$this->load->view('templates/admin_header',$data);
		$this->load->view('admin/blog_form',$data);
	}
	
	/**
	 * 博客管理列表
	 */
	public function blog_list(){
		$this->check_user();
		
		$this->load->model('Blog_model','blog');
		$query = $this->blog->query_blogs();
		if($query->num_rows()>0){
			$data['blog_info'] = $query->result_array();
		}else{
			$data['blog_info'] = array();
		}
		
		$data['admin_title'] = '博客管理';
		$this->load->view('templates/admin_header',$data);
		$this->load->view('admin/blog_list',$data);
	}
	
	/**
	 * 编辑博客
	 */
	public function edit_blog(){
		$this->check_user();
		
		$data = array(
			'title'=>$this->input->post('title')?$this->input->post('title'):'无标题',
			'content'=>$this->input->post('content')?$this->input->post('content'):'无内容',
			'short_content'=>$this->input->post('short_content')?$this->input->post('short_content'):'无显示内容',
			'label'=>$this->input->post('labels')?$this->input->post('labels'):array('杂文'),
			'audtor'=>$this->session->userdata(SESSION_NAME),
			'blog_id'=>$this->input->post('blog_id')
		);
		if($data['short_content']){
			if(sizeof($data['short_content'])>200){
				$data['short_content'] = substr($data['short_content'], 0,200).'...';
			}else{
				$data['short_content'] = substr($data['short_content'], 0).'...';
			}
		}
		//先增加对应的标签
		$this->load->model('Label_model','label');
		foreach ($data['label'] as $value) {
			$_label['name'] = $value;
			$this->label->add_label_num($_label);
		}
		
		$this->load->model('Blog_model','blog');
		$this->blog->edit_blog($data);
		
		echo "<script>alert('博客编辑完成');</script>";
		$this->blog_list();
	}
	
	/**
	 * 
	 * 删除博客
	 */
	public function delete_blog(){
		$this->check_user();
		$id=$this->input->post('blog_id');
		$this->load->model('Blog_model','blog');
		$query_blog = $this->blog->get_blog($id);
		if($query_blog->num_rows()>0){
			$result = $query_blog->row_array();
			$labels = explode(";",$result['label']);
			$this->load->model('Label_model','label');
			foreach ($labels as $value) {
				if($value!==''){
					//标签数量-1
					$this->label->cut_label_num($value);
				}
			}
			//删除博客
			$this->blog->delete_blog($id);
			//删除对应图片
		}
		
		$this->blog_list();
	}
	/**
	 * 判断用户
	 */
	private function check_user(){
		//判断用户
		$login_status = $this->session->userdata(SESSION_LOGIN_STATUS);
		if($login_status!==TRUE){
			show_error('没有登录哟亲' ,403 ,"木有权限哦");
		}
	}
	public function index(){
		$this->go_blog();
	}
}