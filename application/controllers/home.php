<?php /**
* 
*/
class Home extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	/*Trang chủ*/
	function index(){
		$data['temp']='home/content/content';
		$this->load->view('home/main',$data);
	}
	/*Chi tiết sản phẩm*/
	function product(){
		$data['temp']='home/product/product';
		$this->load->view('home/main',$data);
	}
	/*Danh sách sản phẩm*/
	function list_product(){
		$data['temp']='home/product/list_product';
		$this->load->view('home/main',$data);
	}
	/*Danh sách product theo thể loại*/
	function list_product_catalog(){
		$data['temp']='home/product/list_product';
		$this->load->view('home/main',$data);
	}
	/*Danh sách product theo hãng*/
	function list_product_suplier(){
		$data['temp']='home/product/list_product';
		$this->load->view('home/main',$data);
	}
	/*Giỏ hàng*/
	function shopcart(){
		
		$data['temp']='home/shopcart/index';
		$this->load->view('home/main',$data);
	}
	/*Thêm sản phẩm vào giỏ hàng*/
	function addcart(){
		$idUser=$this->session->userdata('user')->id;
		$idProduct=$this->uri->segment(3);
		$array_list_item_cart=$this->session->userdata('cart');//Lấy mảng chưa các sản phẩm trong gio hang của user 
		if($this->check_exits_item_cart($idProduct,$array_list_item_cart)){
			$array_list_item_cart[$idProduct]++;
		}else{
			echo 'sản phẩm muốn thêm chưa tồn tại';
			$array_list_item_cart[$idProduct]=1;
		}
		$this->session->set_userdata('cart',$array_list_item_cart);
		$array_list_item_cart=json_encode($array_list_item_cart);
		if($this->cart_model->update($idUser,array('product'=>$array_list_item_cart))){
			echo 'đã cập nhật gio hàng';
		}
		redirect(base_url().'index.php/home/shopcart');
	}
	/*Xóa sản phẩm trong giỏ hàng*/
	function del_cart(){
		$idProduct=$this->uri->segment(3);
		$array=$this->session->userdata('cart');
		unset($array[$idProduct]);

		$this->session->set_userdata('cart',$array);
		$array=json_encode($array);
		$data=array('product'=>$array);
		$idUser=$this->session->userdata('user')->id;
		$this->cart_model->update($idUser,$data);
		redirect(base_url().'index.php/home/shopcart');
	}
	/*Đăng xuất*/
	function logout(){
		if($this->session->userdata('user')){
			$this->session->unset_userdata('user');
			$this->session->unset_userdata('cart');
			redirect(base_url().'index.php/home');
		}
	}
	/*Kiểm tra tồn tại sản phẩm id trong giỏ hàng chưa*/
	function check_exits_item_cart($id,$arrayProduct=array()){
		foreach ($arrayProduct as $key => $value) {
			# code...
			if($id==$key){
				return true;
			}
		}
		return false;
	}
	/*Ajax xử lí tìm kiếm theo giá*/
	function result_search_price(){
		$x=array();
		$start_price=$_POST['start_price'];
		$end_price=$_POST['end_price'];
		$query='price>'.$start_price.' and '.'price<'.$end_price;
		$rules=array('where'=>$query);
		$list_product=$this->product_model->get_list_item($rules);
		die (json_encode($list_product));
	}
} ?>