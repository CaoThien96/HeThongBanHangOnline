<?php /**
* 
*/
class Profile extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	function index(){
		$data['temp']='home/profile/index';
		$data['user']=$this->session->userdata('user');
		$this->load->view('home/main',$data);

	}
	function edit(){
		$user=$this->session->userdata('user');
		if($this->input->post()){
			$infor_user=array('name'=>$this->input->post('name'),
				'phone'=>$this->input->post('phone'),
				'email'=>$this->input->post('email'),
				'address'=>$this->input->post('address'));
			$this->user_model->update($user->id,$infor_user);
			$user=$this->user_model->get_infor($user->id);
			$this->session->set_userdata('user',$user);
			redirect(base_url('index.php/profile'));
		}
		$data['temp']='home/profile/edit_infor';
		$data['user']=$user;
		$this->load->view('home/main',$data);
	}
	function check_pass(){
		$user=$this->session->userdata('user');
		$pass=md5($this->input->post('old_pass'));
		if((string)$pass==(string)$user->pass_word){
			return true;
		}else {
			# code...
			$this->form_validation->set_message(__FUNCTION__,'Mất khẩu không đúng');
			return false;
		}
		// if((string)$pass==(string)$user->pass_word){
		// 	return true;
		// }else {
		// 	$this->form_validation->set_message(__FUNCTION__,'Mất khẩu không đúng');
		// }
	}
	function edit_pass(){
		if($this->input->post()){
			$this->form_validation->set_rules('old_pass','old_pass','callback_check_pass');
			$this->form_validation->set_rules('new_pass','new_pass','required');
			$this->form_validation->set_rules('rep_new_pass','rep_new_pass','matches[new_pass]');
			if($this->form_validation->run()){
				$pass=md5($this->input->post('new_pass'));
				$data=array('pass_word'=>$pass);
				if($this->user_model->update($this->session->userdata('user')->id,$data)){
					$this->session->unset_userdata('user');
					redirect(base_url().'index.php/admin/login');
				}else{
					echo 'Chưa thay đổi';
				}
			}
		}
		$data['temp']='home/profile/edit_pass';
		$this->load->view('home/main',$data);
	}
} ?>