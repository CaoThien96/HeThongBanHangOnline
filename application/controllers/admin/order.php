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
	function xu_li(){
		$id=$this->uri->segment(4);
		echo $id;
		$rule=array('status'=>1);
		$this->order_model->update($id,$rule);
		redirect(admin_url('home/transaction'));
	}
	function ajax_delete(){
		if(isset($_POST['idOrder'])){
			$idOrder=$_POST['idOrder'];
			$rules=array('where'=>array('idOrder'=>$idOrder));
			if($this->order_detail_model->del($rules)){
				echo "Xóa";
				$this->order_model->delete($idOrder);
			}else {
				echo "Chưa xóa";
			}
		}
	}
	function show_detail_transaction(){
		if(isset($_POST['idOrder'])){
			$idOrder=$_POST['idOrder'];
			$rules=array('where'=>'order.idUser=user.id and order.id=order_detail.idOrder',
				'from'=>'order,user,order_detail ');
			$order=$this->order_model->get_infor($idOrder);
			$user=$this->user_model->get_infor($order->idUser);
			$product=$this->order_detail_model->get_list_item(array('where'=>array('idOrder'=>$idOrder)));
			$data=array('order'=>$order,'user'=>$user,'product'=>$product);
			// $data=array();
			// array_push($data,1);
			$data=json_encode($data);
			echo $data;
		}
	}

	
	
} ?>