<?php /**
* 
*/
class User extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	function ajax_delete(){
		if(isset($_POST['idUser'])){

			$id=$_POST['idUser'];
			$rules_del_cmt=array('where'=>array('idUser'=>$id));
			$rules_del_cart=array('where'=>array('id'=>$id));
			if($this->comment_model->delete_rule($rules_del_cmt)){
				$this->cart_model->delete_rule($rules_del_cart);
				$this->user_model->delete($id);
			}
			
		}
	}
} ?>