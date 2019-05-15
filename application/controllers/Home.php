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

        public function getSubmit(){
        	$list = $_GET['list'];
        	$form = $_GET['form'];
        	$form = (array)json_decode($form);
        	$count = $_GET['count'];
  
        	$priceTotal = $_GET['priceTotal'];
        	$html = "
<!DOCTYPE html>
<html>
<head>
	<title>Think You!</title>
</head>
<body>
	<h1>From Grocery Store</h1>
	<p>In order to ensure that you can receive our reply, we have sent you the information of your order submitted in the form of e-mail, which is confirmed by you personally. At the same time, on behalf of our successful receipt of your order information, we will send your order to you in the fastest time. Please wait patiently.</p>
	<table border='1px' cellspacing='0'>
		<tr>
			<th>Picture</th>
			<th>CommodityName</th>
			<th>CommodityPrice</th>
			<th>QuantityOfCommodities</th>
			<th>TotalCommodities</th>
		</tr>
";
		foreach ($list as $key => $v) {
			$v =(array) json_decode($v);
			$html .="
		<tr>
			<td><img src=".$v['product_images']." width='200px' height='200px'></td>
			<td>".$v['product_name']."</td>
			<td>".$v['unit_price']."</td>
			<td>".$v['saled']."</td>
			<td>".$v['saled']*$v['unit_price']."</td>
		</tr>
";
		}
		
		$html .= "
	</table>
	<p>A total of ".$count." items were purchased.</p>
	<p>The total value is $".$priceTotal.".</p>
</body>
</html>
";
		    $config['protocol'] = 'smtp';
		    $config['smtp_host'] = 'smtp.163.com';
		    $config['smtp_user'] = 'lll2669877481@163.com';
		    $config['smtp_pass'] = 'lll553553';
		    $config['smtp_port'] = '456';
		    $config['charset'] = 'utf-8';
		    $config['wordwrap'] = TRUE;
		    $config['mailtype'] = 'html';
        	$this->load->library('email',$config);
		//     $this->email->initialize($config);
			$this->email->from('lll2669877481@163.com', 'Grocery Store');
			$this->email->to($form['email']);
			$this->email->subject('Grocery Store');
			$this->email->message($html);
			$this->email->send();

			foreach ($list as $key => $v) {
				# code...
				$v =(array) json_decode($v);
				$res = $this->goods_model->updateSaled($v['product_id'],$v['saled'],$v['in_stock']);
				var_dump($res);
			}
        }

}