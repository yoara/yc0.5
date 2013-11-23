<?php
require_once "application/config/My_constants.php";
/**
 *
 * 这个控制器会成为网站程序每次请求的中心
 * @author yoara
 *
 */
class Pages extends CI_Controller {

	public function home()
	{
		$data = array(
			'home_address' => ADR_HOME,
			'home_address_2' => '',
			'home_address_2_url' => '',
			'home_address_3' => ''
		);
		//读取热门博客
		$this->load->model('Blog_model','blog');
		$query_hot = $this->blog->query_hot_blogs();
		if($query_hot->num_rows()>0){
			$data['hot_infos'] = $query_hot->result_array();
		}else{
			$data['hot_infos'] = array();
		}
		//最近留言
		$mes_data['offset'] = 0;
		$mes_data['blog_id'] = NULL;
		$this->load->model('Message_model','message');
		
		$query_mes = $this->message->query_messages($mes_data,3);
		if($query_mes->num_rows()>0){
			$data['message_info'] = $query_mes->result_array();
		}else{
			$data['message_info'] = array();
		}
		
		//最近作品
		$this->load->model('Picture_model','picture');
		
		$query_pro = $this->picture->query_picture_show('3');
		if($query_pro->num_rows()>0){
			$data['product_latest_info'] = $query_pro->result_array();
		}else{
			$data['product_latest_info'] = array();
		}
		
		$this->_view('home',$data);
	}
	public function about()
	{
		//在ctrl中的function里面加缓存。 view后就能在cache文件夹下存在缓存页面
		if(PAGE_CACHE_ON===TRUE){
			$this->output->cache(60);
		}
		$data = array(
			'home_address' => ADR_ABOUTUS,
			'home_address_2' => '',
			'home_address_2_url' => '',
			'home_address_3' => ''
		);
		$this->_view('about',$data);
	}
	/**
	 * 跳转到工作展示页，包括图片和产品
	 * Enter description here ...
	 */
	public function portfolio()
	{
		$data = array(
			'home_address' => ADR_PRODUCT,
			'home_address_2' => '',
			'home_address_2_url' => '',
			'home_address_3' => ''
		);
		$this->load->model('Picture_model','picture');
		
		$query = $this->picture->query_picture_show();
		if($query->num_rows()>0){
			$data['picture_info'] = $query->result_array();
		}else{
			$data['picture_info'] = array();
		}
		
		$this->_view('portfolio',$data);
	}
	public function blog()
	{
		$data = array(
			'home_address' => ADR_BLOG,
			'home_address_2' => '',
			'home_address_2_url' => '',
			'home_address_3' => ''
		);
		
		$this->load->model('Blog_model','blog');
		//读取博客列表
		$_label = $this->input->post('labelT',TRUE);
		
		$query_blog = $this->blog->query_blogs($_label);
		if($query_blog->num_rows()>0){
			$data['blog_infos'] = $query_blog->result_array();
		}else{
			$data['blog_infos'] = array();
		}
		//读取热门博客
		$query_hot = $this->blog->query_hot_blogs();
		if($query_hot->num_rows()>0){
			$data['hot_infos'] = $query_hot->result_array();
		}else{
			$data['hot_infos'] = array();
		}
		
		//读取标签信息
		$this->load->model('Label_model','label');
		$query_label = $this->label->query_labels();
		if($query_label->num_rows()>0){
			$data['label_infos'] = $query_label->result_array();
		}else{
			$data['label_infos'] = array();
		}
		
		$this->_view('blog',$data);
	}
	/**
	 * 查看博客详细
	 */
	public function blog_view(){
		$this->load->model('Blog_model','blog');
		$id = $this->input->post('blog_id',TRUE);
		$query = $this->blog->get_blog($id);
		
		if ($query->num_rows()>0){
			$result = $query->row_array();
			//增加点击量
			$read = array(
				'blog_id'=>$result['blog_id'],
				'read_time'=>$result['read_time']+1
			);
			$this->blog->add_readtime_blog($read);
			
			//页面内容
			$data = array(
				'home_address' => ADR_PRODUCT,
				'home_address_2' => ADR_BLOG,
				'home_address_2_url' => ADR_BLOG_URL,
				'home_address_3' => $result['title'],
				'result' => $result
			);
			//留言内容
			$data['offset'] = '0';
			$data['blog_id'] = $id;
			$this->load->model('Message_model','message');
			
			$query = $this->message->query_messages($data);
			if($query->num_rows()>0){
				$data['message_info'] = $query->result_array();
			}else{
				$data['message_info'] = array();
			}
			
			$this->_view('blog_page',$data);
		}else{
			// 页面不存在
			show_404();
		}
	}
	/**
	 * 跳转到留言板页面
	 * 1.读取留言前10条
	 * 
	 */
	public function message()
	{
		$data = array(
			'home_address' => ADR_MESSAGE,
			'home_address_2' => '',
			'home_address_2_url' => '',
			'home_address_3' => '',
		);
		$offset = $this->input->post('offset');
		if(!$offset){
			$offset = '0';
		}
		$data['offset'] = $offset;
		$data['blog_id'] = NULL;
		$this->load->model('Message_model','message');
		
		$query = $this->message->query_messages($data);
		if($query->num_rows()>0){
			$data['messageInfo'] = $query->result_array();
		}else{
			$data['messageInfo'] = array();
		}
		$this->_view('message',$data);
	}
	/**
	 * 跳转到图片展示子页
	 */
	public function picture()
	{
		$data = array(
			'home_address' => ADR_PRODUCT,
			'home_address_2' => ADR_PRODUCT_PICTURE,
			'home_address_2_url' => '',
			'home_address_3' => ''
		);
		
		$this->load->model('Picture_model','picture');
		
		$query = $this->picture->query_picture();
		if($query->num_rows()>0){
			$data['pictureInfo'] = $query->result_array();
		}else{
			$data['pictureInfo'] = array();
		}
		
		$this->_view('portfolio_picture',$data);
	}
	/**
	 * 跳转到图片查看页面
	 */
	public function pictureView($id=0)
	{
		$this->load->model('Picture_model','picture');
		$query = $this->picture->get_pictrue($id);
		
		if ($query->num_rows()>0){
			$result = $query->row_array();
			$data = array(
				'home_address' => ADR_PRODUCT,
				'home_address_2' => ADR_PRODUCT_PICTURE,
				'home_address_2_url' => ADR_PRODUCT_PICTURE_URL,
				'home_address_3' => $result['PICTURE_NAME'],
				'value' => $result
			);
			
			$this->_view('portfolio_picture_page',$data);
		}else{
			// 页面不存在
			show_404();
		}
	}
	/**
	 * 跳转到产品展示子页
	 */
	public function product()
	{
		$data = array(
			'home_address' => ADR_PRODUCT,
			'home_address_2' => ADR_PRODUCT_PRODUCT,
			'home_address_2_url' => '',
			'home_address_3' => ''
		);
		
		$this->load->model('Product_model','product');
		
		$query = $this->product->query_products();
		if($query->num_rows()>0){
			$data['product_info'] = $query->result_array();
			
			$this->load->model('Picture_model','picture');
			for ($i = 0; $i < sizeof($data['product_info']); $i++) {
				//查询产品相关图片
				$query = $this->picture->get_product_show_pic($data['product_info'][$i]['id']);
				//设置主显图片
				$data['product_info'][$i]['show_pic'] = $query['URL'];
			}
		}else{
			$data['product_info'] = array();
		}
		
		$this->_view('portfolio_product',$data);
	}
	/**
	 * 跳转到产品查看详细页
	 */
	public function productView($id)
	{
		$this->load->model('Product_model','product');
		$query = $this->product->get_product($id);
		
		if ($query->num_rows()>0){
			$result = $query->row_array();
			//加载图片信息
			$this->load->model('Picture_model','picture');
			$query = $this->picture->query_product_pic($id);
			$result['pics'] = $query->result_array();
			$data = array(
				'home_address' => ADR_PRODUCT,
				'home_address_2' => ADR_PRODUCT_PRODUCT,
				'home_address_2_url' => ADR_PRODUCT_PRODUCT_URL,
				'home_address_3' => $result['product_name'],
				'value' => $result
			);
			
			$this->_view('portfolio_product_page',$data);
		}else{
			// 页面不存在
			show_404();
		}
	}
	/**
	 * 统一跳转方法
	 */
	private function _view($page,$data)
	{
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// 页面不存在
			show_404();
		}
		//view 第二个参数可带入数据
		$this->load->view('templates/header',$data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer',$data);
	}
	
	public function index(){
		$this->home();
	}
}
