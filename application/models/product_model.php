<?php
class Product_model extends CI_Model{
	var $id;
	var $url;				//下载url
	var $memo;
	var $audtor;
	var $product_name;
	var $short_memo;
	var $pro_date;
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * 获得所有产品
	 * @return return_type
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午02:38:11
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function query_products(){
		$this->load->database();
		$query = $this->db->get('PRODUCT');
		
		return $query;
	}
	
	/**
	 * 通过id获得产品
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午02:41:32
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function get_product($id){
		
		$this->load->database();
		$this->db->where('id',$id);
		$query = $this->db->get('PRODUCT');
		
		return $query;
	}
	
	/**
	 * 插入一条新产品信息
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午04:30:20
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function insert_product($date)
	{
        $this->url = $date['url'];
		$this->memo = $date['memo'];
		$this->audtor = $date['audtor'];
		$this->product_name = $date['product_name'];
		$this->short_memo = $date['short_memo'];
		
		$this->load->database();
		$this->db->insert('PRODUCT',$date);
	}
	/**
	 * 删除产品
	 */
	public function delete_product($id){
		$this->load->database();
		$this->db->where('id', $id);
		$this->db->delete('PRODUCT');
	}
}