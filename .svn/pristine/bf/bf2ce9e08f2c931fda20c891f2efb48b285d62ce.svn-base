<?php
class Picture_model extends CI_Model{
	var $id;
	var $url;				//图片url
	var $memo;
	var $audtor;
	var $product_id;		//对应产品id，如果有
	var $is_product_pic;	//是否产品主显图像
	var $picture_name;		
	var $pic_date;
	
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * 插入图片
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-7 上午08:59:08
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function insert_picture($date)
	{
        $this->url = $date['url'];
		$this->memo = $date['memo'];
		$this->audtor = $date['audtor'];
		$this->product_id = $date['product_id'];
		$this->is_product_pic = $date['is_product_pic'];
		$this->picture_name = $date['picture_name'];
		
		$this->load->database();
		
		$this->db->where('url', $this->url);
		$query = $this->db->get('PICTURE');
		if($query->num_rows()>0&&$date['product_id']===NULL){	//如果存在url的图片且不是产品图片，则更新
			$this->db->where('url', $this->url);
			$this->db->update('PICTURE', $this); 
		}else{						//否则新增
			$this->db->insert('PICTURE',$this);
		}
		
	}
	/**
	 * 删除图片
	 */
	public function delete_picture($id){
		$this->load->database();
		$this->db->where('ID', $id);
		$this->db->delete('PICTURE');
	}
	
	/**
	 * 获得产品相关图片
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午01:53:53
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function query_product_pic($id)
	{
		$this->product_id = $id;
		
		$this->load->database();
		$this->db->where('PRODUCT_ID', $this->product_id);
		$query = $this->db->get('PICTURE');
		
		return $query;
	}
	
	/**
	 * 获得产品主显图片
	 * @return return_type
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午01:55:38
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function get_product_show_pic($id)
	{
		$this->load->database();
		$this->db->where('PRODUCT_ID', $id);
		$this->db->where('IS_PRODUCT_PIC', 'Y');
		$query = $this->db->get('PICTURE');
		
		return $query->row_array();
	}
	
	/**
	 * 通过id获得某张图片
	 * @return return_type
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午02:33:52
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function get_pictrue($img_id){
		$this->id = $img_id;
		
		$this->load->database();
		$this->db->where('id', $this->id);
		$query = $this->db->get('PICTURE');
		
		return $query;
	}
	
	/**
	 * 获得所有图片
	 * @return return_type
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午02:38:24
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function query_picture(){
		$this->load->database();
		$this->db->get('PICTURE');
		$this->db->or_where('PRODUCT_ID',NULL);
		$query = $this->db->get('PICTURE');
		
		return $query;
	}
	/**
	 * 查询所有图片及产品展示主图
	 * Enter description here ...
	 */
	public function query_picture_show($size=NULL){
		$this->load->database();
		$this->db->where('IS_PRODUCT_PIC','Y');
		$this->db->or_where('PRODUCT_ID',NULL);
		$this->db->order_by('ID','desc');
		if($size!==NULL){
			$query = $this->db->get('PICTURE',3,0);
		}else{
			$query = $this->db->get('PICTURE');
		}
		return $query;
	}
}