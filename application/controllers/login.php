<?php
require_once "application/config/My_constants.php";
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		if ( ! file_exists('application/views/admin/login_admin.php'))
		{
			// 页面不存在
			show_404();
		}
		$login_status = $this->session->userdata(SESSION_LOGIN_STATUS);
		if($login_status!==TRUE){
			$this->load->view('admin/login_admin');
		}else{
			$this->login_menu();
		}
	}
	public function login_in()
	{
		$date = array(
			'name'		=>$this->input->post('name'),
			'password'	=>$this->input->post('password')
		);
		$this->load->model('User_model','user');
		$query = $this->user->getUserByNameAndPwd($date);
		
		if($query->num_rows()>0){
			$newsession = array(
				SESSION_NAME		=>$date['name'],
				SESSION_LOGIN_STATUS=>TRUE
			);
			$this->session->set_userdata($newsession);
			$this->load->view('admin/admin_menu');
		}else{
			echo "<script language=javascript>alert('用户名密码错误');history.back();</script>";
		}
	}
	public function login_out()
	{
		$this->session->sess_destroy();
		$this->load->view('admin/login_out');
	}
	public function login_menu()
	{
		//判断用户
		$login_status = $this->session->userdata(SESSION_LOGIN_STATUS);
		if($login_status!==TRUE){
			show_error('没有登录哟亲' ,403 ,"木有权限哦");
		}
		$this->load->view('admin/admin_menu');
	}
}