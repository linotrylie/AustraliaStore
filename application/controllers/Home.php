<?php

class Home extends CI_Controller
{

	public function __construct() {
            parent::__construct();
            $this->load->helper('utils_helper');
            $this->load->model('goods_model');
    }

	public function index()
	{
		$goods = $this->goods_model->getGoods();
		$arr = $this->arr_sort(0,$goods);
		$fa  = $this->product($arr);
		$data['goods'] = json_encode($fa);
		$this->load->view('home/index',$data);
	}

	 public function arr_sort($pid=0,$arr)
        {
            $fa = array();
            foreach ($arr as $k=>$v){
                if($v['pid'] == $pid){
                    unset($arr[$k]);
                    if($this->arr_sort($v['id'],$arr)){
                        $fa[] = array(
                            'id'=>$v['id'],
                            'name'=>$v['name'],
                            'children'=>$this->arr_sort($v['id'],$arr)
                            );
                    }else{
                        $fa[] = array(
                            'id'=>$v['id'],
                            'name'=>$v['name'],
                        );
                    }
                }
            }
            return $fa;
        }

        public function product($arr)
        {
        	$pro = array();
        	foreach ($arr as $key => &$value) {
        		if(is_array($value)){
	        		if(array_key_exists('children',$value)){

	        			$arr[$key]['children'] = $this->product($value['children']);
	        		}else{
	        			$data = $this->goods_model->getProduct($value['id']);
	        			if($data){
		        			$arr[$key]['children'] = $data;
	        			}
	        		}
        		}
        	}
        	return $arr;
        }
}