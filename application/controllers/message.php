<?php
class Message extends CI_Controller{
	/**
	 * 插入留言
	 * 回复留言，留言中的子留言，只支持一层，页面控制
	 * @return return_type
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-12 上午09:53:28
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function insert_message()
	{
		$data = array(
			'message_content'=>$this->input->post('message_content')?$this->input->post('message_content',TRUE):NULL,
			'message_name'=>$this->input->post('message_name')?$this->input->post('message_name',TRUE):'anyone',
			'message_email'=>$this->input->post('message_email')?$this->input->post('message_email',TRUE):'any@mail',
			'parent_message'=>$this->input->post('parent_message')?$this->input->post('parent_message',TRUE):NULL,
			'blog_id'=>$this->input->post('blog_id')?$this->input->post('blog_id',TRUE):NULL
		);
		
		//设置cookie
		$cookie = array(
		    'name'   => 'message_name',
		    'value'  => $data['message_name'],
		    'expire' => '0',
		);
		$this->input->set_cookie($cookie);
		$cookie = array(
		    'name'   => 'message_email',
		    'value'  => $data['message_email'],
		    'expire' => '0',
		);
		$this->input->set_cookie($cookie);
		
		$this->load->model('Message_model','message');
		$this->message->insert_message($data);
		$result = $this->db->insert_id();
		if(!$result){
			echo "0";		//插入失败
		}else{
			echo $result;
		}
	}
	
	/**
	 * 查询分页留言
	 * @return return_type
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-12 上午10:00:42
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function query_message_page()
	{
		$offset = $this->input->post('offset',TRUE);
		if(!$offset){
			$offset = '0';
		}
		$data['offset'] = $offset;
		$blog_id = $this->input->post('blog_id',TRUE);
		if(!$blog_id){
			$blog_id = NULL;
		}
		$data['blog_id'] = $blog_id;
		
		$this->load->model('Message_model','message');
		
		$query = $this->message->query_messages($data);
		if($query->num_rows()>0){
			$data['messageInfo'] = $query->result_array();
		}else{
			$data['messageInfo'] = array();
		}
		$this->load->view("pages/message_show",$data);
	}
}