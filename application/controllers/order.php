<?php /**
* 
*/
class Order extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function index(){
		/* Kiểm tra session nếu có biến order thì lấy ra nhưng sản phẩm mà khách hàng định đặt ra */
		$listProduct=array();
		if(null!==$this->session->userdata('order_by')){
			/*Lấy mảng chứa đơn hàng*/
			$order_by=$this->session->userdata('order_by');
			/*Duyệt mảng chứa đơn hàng*/
			foreach ($order_by as $key => $value) {
				if (isset($value['quanty'])) {
					$product=$this->product_model->get_infor($value['idProduct']);
					$order_by[$key]['name']=$product->name;
					$order_by[$key]['price']=$product->price;
				}	

			}
			$this->session->set_userdata('order_by',$order_by);
		}
		$data['temp']='home/order/content';
		$this->load->view('home/order/index',$data);
	}
	/*Hầm điều hướng từ trang lấy thông tin đến trang đặt hàng*/
	function submit_order(){
		$data['temp']='home/order/submit';
		$this->load->view('home/order/index',$data);
	}
	/*Hàm result để tạo biến session chứa order_by  các sản phẩm mà khách hàng sẽ đặt*/
	function result(){
		$arr = $this->input->post('arr');
		$this->session->set_userdata('order_by',$arr);
	}
	/*Hàm lấy tên địa chỉ số điện thoại*/
	function result_shipper(){
		$arr=$this->input->post('arr');
		$order_by=$this->session->userdata('order_by');
		$order_by['address']=$arr[0];
		$order_by['user']=(array)$_SESSION['user'];
		$this->session->set_userdata('order_by',$order_by);
	}
	function check_exits($id_product,$array){
		foreach ($array as $key => $value) {
			# code...
			if(isset($value['quanty'])){
				if($id_product==$value['idProduct']){
					return true;
				}
			}
		}
	}
	/*Chèn sản phẩm vào database*/
	function insert_order(){
		$cart=$_SESSION['cart'];
		$user_session=$_SESSION['user'];
		$order_by=$_SESSION['order_by'];
		pre($user_session);
		$list_cart=array();
		foreach ($cart as $key => $value) {
			if(!$this->check_exits($key,$order_by)){
				$list_cart[$key]=$value;
			}
		}
		
		$this->session->set_userdata('cart',$list_cart);
		$cart=$_SESSION['cart'];
		$list_cart=json_encode($list_cart);
		$idCart=$user_session->id;
		$product=array('product'=>$list_cart);
		$this->cart_model->update($idCart,$product);
		$data_order=array('idUser'=>$order_by['user']['id'],
							'created'=>date('Y-m-d H:i:s'),
							'total_price'=>$order_by['total'],
							'full_name'=>$order_by['address']['name'],
							'phone'=>$order_by['address']['phone'],
							'full_address'=>$order_by['address']['address'],
							'status'=>0);
		// $rules=array('limit'=>array(
		// 		'row'=>1,
		// 		'start'=>0),
		// 		'order_by'=>'id');
		// 	$idOrder=$this->order_model->get_list_item($rules)[0]->id;
		// 	pre($idOrder);
		if($this->order_model->insert($data_order)){
			$this->session->set_flashdata('messager','Thêm thành công');
			$rules=array('limit'=>array(
				'row'=>1,
				'start'=>0),
				'order_by'=>'id');
			$idOrder=$this->order_model->get_list_item($rules)[0]->id;
			foreach ($order_by as $key => $value) {
				if (isset($value['quanty'])) {
					$data_order_detail=array('idOrder'=>$idOrder,
						'idProduct'=>$value['idProduct'],
						'quanty'=>$value['quanty']);
					$this->order_detail_model->insert($data_order_detail);
				}
				
			}
			
		}else{
			echo "Thêm thất bại";
		}
	}
	
} ?>