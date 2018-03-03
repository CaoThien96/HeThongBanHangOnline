<?php /**
* 
*/
class Register extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper("form");
		$this->load->library("form_validation");
	}
	function check_register(){
		if(isset($_POST['username'])){
			$username=$_POST['username'];
			$where=array('user_name'=>$username);
			if($this->user_model->check_exits($where)){
				$this->form_validation->set_message(__FUNCTION__,'username đã tồn tại');
				return false;
			}
		}
		return true;
	}
	function index(){
		if($this->input->post()){
			$this->form_validation->set_rules('username','username',"required|callback_check_register");
			$this->form_validation->set_rules('password','password',"required");
			$this->form_validation->set_rules('re_password','re_password',"required|matches[password]");
			$this->form_validation->set_rules('email','email',"required");
			$this->form_validation->set_rules('name','name',"required");
			$this->form_validation->set_rules('phone','phone',"required");
			$this->form_validation->set_rules('address','address',"required");
			if($this->form_validation->run()){
				$username=$_POST['username'];
				$password=md5($_POST['password']);
				$email=$_POST['email'];
				$name=$_POST['name'];
				$phone=$_POST['phone'];
				$address=$_POST['address'];

				// $where=array('user_name'=>$username,'pass_word'=>$password);
				// $rules=array('where'=>$where);
				// $user=$this->user_model->get_infor_rules($rules);
				// $array=array();
				// $data_cart=array('id'=>$user->id,'product'=>json_encode($array));
				// if($this->cart_model->insert($data_cart)){
				// 	$this->session->set_userdata('cart',array());
				// 	$this->session->set_userdata('user',$user);
				// }
				$this->session->set_userdata('user',$user);
				$user=array('user_name'=>$username,'pass_word'=>$password,'email'=>$email,'name'=>$name,'phone'=>$phone,'address'=>$address,'id_group_user'=>2);
				if($this->user_model->insert($user)){
					$where=array('user_name'=>$username,'pass_word'=>$password);
					$rules=array('where'=>$where);
					$user=$this->user_model->get_infor_rules($rules);
					$array=array();
					$data_cart=array('id'=>$user->id,'product'=>json_encode($array));
					if($this->cart_model->insert($data_cart)){
						$this->session->set_userdata('cart',array());
						$this->session->set_userdata('user',$user);
					}
					redirect('http://localhost/HeThongBanHangOnline/index.php/home');
				}
			}
		}
		$this->load->view('admin/register');
	}
} ?>