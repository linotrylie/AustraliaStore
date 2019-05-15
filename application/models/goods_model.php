<?php
class Goods_model extends CI_Model
{
	public $db;
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default',true);
	}
	public function getGoods()
	{
		$data = array();
		$this->db->from('goods');
		$query = $this->db->get();
		if($query && $query->num_rows() > 0)
		{
			$data = $query->result_array();
		}
		return $data;
	}

	public function getProduct($id)
	{
		$data = array();
		$this->db->from('products');
		$this->db->where('fid',$id);
		$query = $this->db->get();
		if($query && $query->num_rows() > 0)
		{
			$data = $query->result_array();
		}
		return $data;
	}

	public function updateSaled($product_id,$saled,$in_stock){
		$i = $in_stock - $saled;
		$this->db->where('product_id',$product_id);
		return $this->db->update('products',['saled'=>0,'in_stock'=>$i]);
	}
}