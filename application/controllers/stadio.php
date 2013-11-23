<?php
require_once "application/config/My_constants.php";
class Stadio extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$user_agent = $this->input->post('user_agent');
		if($user_agent){
			$_SERVER['HTTP_USER_AGENT'] = $user_agent;
		}
		$this->load->library('session');
	}
	/**
	 * 跳转到图片上传页面
	 */
	public function picture(){
		$this->check_user();

		if (! file_exists('application/views/uploadify/uploadPic.php')){
			show_404();
		}
		$data['user_agent'] = $this->session->userdata('user_agent');
		$data['admin_title'] = '图片上传';
		$this->load->view('templates/admin_header',$data);
		$this->load->view('uploadify/uploadPic',$data);
	}
	/**
	 * 上传图片预览ajax
	 */
	public function uploadify(){
		$this->check_user();
		
		if ( ! file_exists('application/views/uploadify/uploadify.php')){
			show_404();
		}
		$this->load->view('uploadify/uploadify');
	}
	/**
	 * 页面删除图片
	 */
	public function cancel_pic(){
		$this->check_user();
		
		$data['file_name'] = $this->input->post('file_name');
		
		$this->load->view('uploadify/removePic',$data);
	}
	/**
	 * 确定上传图片
	 */
	public function insert_pic(){
		$this->check_user();
		
		$name = $this->input->post('imgName');
		$imgUrl = $this->input->post('imgUrl');
		$memo = $this->input->post('imgMemo');
		
		$this->load->model('Picture_model','picture');
		$_audtor = $this->session->userdata(SESSION_NAME);
		for ($i = 0; $i < sizeof($imgUrl); $i++) {
			$picture_info = array(
				'url'=>$imgUrl[$i],
				'memo'=>$memo[$i],
				'audtor'=>$_audtor,
				'product_id'=>NULL,
				'is_product_pic'=>NULL,
				'picture_name'=>$name[$i]
			);
			$this->picture->insert_picture($picture_info);
		}
		echo "<script>alert('图片上传成功');</script>";
		$this->picture();
	}
	
	/**
	 * 图片删除页面
	 */
	public function go_delete_pic(){
		$this->check_user();
		
		$this->load->model('Picture_model','picture');
		$query = $this->picture->query_picture();
		if($query->num_rows()>0){
			$data['pictureInfo'] = $query->result_array();
		}else{
			$data['pictureInfo'] = array();
		}
		$data['admin_title'] = '图片删除';
		$this->load->view('templates/admin_header',$data);
		$this->load->view('uploadify/deletePic',$data);
	}
	
	/**
	 * 删除图片
	 */
	public function del_pic(){
		$this->check_user();
		
		$data['file_id'] = $this->input->post('file_id');
		$data['file_name'] = $this->input->post('file_name');
		
		//删除数据库记录
		$this->load->model('Picture_model','picture');
		$this->picture->delete_picture($data['file_id']);
		//注意file_name就是url,删除目录下的文件
		$this->load->view('uploadify/removePic',$data);
	}
	
	/**
	 * 跳转到产品上传页面
	 */
	public function product(){
		$this->check_user();

		if (! file_exists('application/views/uploadify/uploadPro.php')){
			show_404();
		}
		$data['user_agent'] = $this->session->userdata('user_agent');
		$data['admin_title'] = '产品上传';
		$this->load->view('templates/admin_header',$data);
		$this->load->view('uploadify/uploadPro',$data);
	}
	/**
	 * 确定上传产品
	 */
	public function insert_pro(){
		$this->check_user();

		$product_name = $this->input->post('product_name');
		$short_memo = $this->input->post('short_memo');
		$memo = $this->input->post('memo');
		$_audtor = $this->session->userdata(SESSION_NAME);
		$pro_url = $this->_upload_product();
		
		$product_info = array(
			'url'=>$pro_url,
			'audtor'=>$_audtor,
			'short_memo'=>$short_memo,
			'product_name'=>$product_name,
			'memo'=>$memo
		);
		//保存产品
		$this->load->model('Product_model','product');
		$this->product->insert_product($product_info);
		$p_id = $this->db->insert_id();
		
		//保存图片
		$is_show = $this->input->post('is_show');
		$imgUrl = $this->input->post('imgUrl');
		$this->load->model('Picture_model','picture');
		for ($i = 0; $i < sizeof($imgUrl); $i++) {
			$picture_info = array(
				'url'=>$imgUrl[$i],
				'audtor'=>$_audtor,
				'product_id'=>$p_id,
				'is_product_pic'=>$imgUrl[$i]===$is_show?"Y":"N",
				'picture_name'=>$imgUrl[$i]===$is_show?$product_name:NULL,
				'memo'=>$imgUrl[$i]===$is_show?$short_memo:NULL
			);
			$this->picture->insert_picture($picture_info);
		}
		echo "<script>alert('产品上传成功');</script>";
		$this->product();
	}
	/**
	 * 上传产品到目录
	 */
	private function _upload_product(){
		$tempFile = $_FILES['pro_upload']['tmp_name'];
		$targetName = iconv("UTF-8",LOCALE_CHARACTER,$_FILES['pro_upload']['name']);
		
		move_uploaded_file($tempFile,"./product/" . $targetName);
		return $_FILES['pro_upload']['name'];
	}
	
	/**
	 * 产品删除页面
	 */
	public function go_delete_pro(){
		$this->check_user();
		
		$this->load->model('Product_model','product');
		$query = $this->product->query_products();
		if($query->num_rows()>0){
			$data['product_info'] = $query->result_array();
		}else{
			$data['product_info'] = array();
		}
		$data['admin_title'] = '产品删除';
		$this->load->view('templates/admin_header',$data);
		$this->load->view('uploadify/deletePro',$data);
	}
	
	/**
	 * 删除产品
	 */
	public function del_pro(){
		$this->check_user();
		
		$ids = explode(",",$this->input->post('file_id'));
		
		$this->load->model('Picture_model','picture');
		$this->load->model('Product_model','product');
		foreach ($ids as $value) {
			//删除数据库相关图片记录
			$query = $this->picture->query_product_pic($value);
			if($query->num_rows()>0){
				$data_pic = $query->result_array();
				foreach ($data_pic as $value_pic) {
					$this->picture->delete_picture($value_pic['ID']);
					$this->_delete_pro_pic_url($value_pic['URL']);
				}
			}
			//删除数据库产品记录
			$query_pro = $this->product->get_product($value);
			if($query_pro->num_rows()>0){
				$data_pro = $query_pro->row_array();
				$this->product->delete_product($data_pro['id']);
				$this->_delete_pro_url($data_pro['url']);
			}
		}
		echo "success";
	}
	/**
	 * 删除产品的路径文件
	 */
	private function _delete_pro_url($url){
		$_file_here = iconv("UTF-8",LOCALE_CHARACTER,'./product' . '/' . $url);
		if (file_exists($_file_here)) {
			unlink($_file_here);
		}
	}
	
	/**
	 * 删除产品对应图片的路径文件
	 */
	private function _delete_pro_pic_url($url){
		$_file_here = iconv("UTF-8",LOCALE_CHARACTER,'./upload' . '/' . $url);
		if (file_exists($_file_here)) {
			unlink($_file_here);
		}
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
		$this->picture();
	}
}