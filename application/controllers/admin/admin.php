<?php /**
* 
*/
class Admin extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->library('upload_library');
		$this->load->library('form_validation');
		$this->load->model('admin_model');
	}
	/*Hàm kiểm tra*/
	function check_admin(){
		$Username=$_POST['Username'];
		$where=array('user_name'=>$Username);
		if($this->user_model->check_exits($where)){
			$this->form_validation->set_message(__FUNCTION__,'Username đã tồn tại!!!');
			return false;
		}else {
			return true;
		}
	}

	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('Username','Username','required|callback_check_admin');
			$this->form_validation->set_rules('Password','Phone','required');
			$this->form_validation->set_rules('Password','Phone','required');

			$this->form_validation->set_rules('Phone','Phone','required');
			$this->form_validation->set_rules('Name','Name','required');
			if($this->form_validation->run()){

			}
		}

		$data['temp']='admin/admin/add_view';
		$this->load->view('admin/main',$data);
	}
	/*Hàm xử lí xóa acount bằng ajax*/
	function ajax_delete(){
		if(isset($_POST['idAdmin'])){
			$id=$_POST['idAdmin'];
			$this->user_model->delete($id);
		}
	}
} ?>