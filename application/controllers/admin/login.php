<?php /**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	function check_login(){
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$where=array('user_name'=>$username,'pass_word'=>$password);
		/* 
			Kiểm tra đăng nhập là admin hay user
		*/
		$rules=array('where'=>$where);
		if($this->user_model-> get_infor_rules($rules)){
			$idGroup=$this->user_model-> get_infor_rules($rules)->id_group_user;
		}
		
		if($this->user_model->check_exits($where)&&($idGroup=='1'||$idGroup=='3')){
			//Nếu là admin thì tạo session chứa admin
			$rules=array('where'=>$where);
			$user=$this->user_model->get_infor_rules($rules);
			$this->session->set_userdata('admin',$user);
			return true;
		}elseif ($this->user_model->check_exits($where)&&$idGroup=='2') {
			// đăng nhập là user
			/* 
				Nếu đăng nhập là user thì lấy tạo một session user chưa user và một session chứa thông tin giỏ hàng của khách hàng. Nếu là khách hàng đăng nhập lần đầu tiên thì sẽ tạo cho khách hàng một giỏ hàng trong database
			*/
			$rules=array('where'=>$where);
			$user=$this->user_model->get_infor_rules($rules);
			/* 
				Kiểm tra khách hàng đã có giỏ hàng trong database chưa
			*/
			if($this->cart_model->check_exits(array('id'=>$user->id)))
			{	
				//Nếu có thì lấy giỏ hàng từ database ra lưu vào session
				$rules=array('where'=>array('id'=>$user->id));
				$cart=$this->cart_model->get_infor_rules($rules);
				$array_product_cart=json_decode($cart->product,true);
				$this->session->set_userdata('user',$user);
				$this->session->set_userdata('cart',$array_product_cart);
				
			}
			else{
				//Chưa có thì tạo một giỏ hàng cho khách hàng rồi tạo một biến session vs mảng rỗng
				$array=array();
				$data_cart=array('id'=>$user->id,'product'=>json_encode($array));
				if($this->cart_model->insert($data_cart)){
					$this->session->set_userdata('cart',array());
					$this->session->set_userdata('user',$user);
				}
			}
			return true;
		}else{
			# code...
			$this->form_validation->set_message(__FUNCTION__,'username or password not corect');
			return false;
		}
	}
	function index(){
		if($this->input->post()){
			$this->form_validation->set_rules('login','login','callback_check_login');
			if($this->form_validation->run()){
				/* Kiểm tra nếu đăng nhập vào là admin thì chuyển đến trang quản trị admin còn nếu đăng nhập là user thì chuyển đến trang chủ*/
				if($this->session->userdata('admin')){
					redirect(admin_url('home'));
				}
				elseif($this->session->userdata('user')) {
					redirect(base_url().'index.php/home');
				}
			}
		}
		$this->load->view('admin/login');
	}
} ?>