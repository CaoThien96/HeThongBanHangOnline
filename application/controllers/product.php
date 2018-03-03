<?php /**
* 
*/
class Product extends MY_Controller
{
	//var $user='';
	function __construct()
	{
		# code...
		parent::__construct();
		//$user=$this->session->userdata('user');
	}
	function ajax_coment(){
		if(isset($_POST)){
			
			if($this->session->userdata('user')){
				$user=$this->session->userdata('user');
			}elseif ($this->session->userdata('admin')) {
				# code...
				$user=$this->session->userdata('admin');
			}
			$idUser=$user->id;
			$idProduct=$_POST['idProduct'];
			$title=$_POST['title'];
			$content=$_POST['content'];
			$data=array('idUser'=>$idUser,
						'idProduct'=>$idProduct,
						'title'=>$title,
						'content'=>$content,
						'time'=>date('Y-m-d H:i:s'));
			if($this->comment_model->insert($data)){
				echo 'Luu thành công';
			}
			
		}
	}
	function kt_session(){
		if($this->session->userdata('user')||$this->session->userdata('admin')){
			echo '1';
		}else{
			echo '0';
		}
	}
	function add_view(){
		$idProduct=$this->input->post('idProduct');
		$product=$this->product_model->get_infor($idProduct);
		$view=$product->view;
		$view=intval($view)+1;
		$data=array('view'=>$view);
		if($this->product_model->update($idProduct,$data)){
			echo 'Thêm 1 view';
		}
	}
} ?>