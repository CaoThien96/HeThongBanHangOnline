<?php /**
* 
*/
class Comment extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		
	}
	/*Hàm xóa comment bằng ajax*/
	function ajax_delete(){
		if(isset($_POST['idComment'])){
			$id=$_POST['idComment'];
			$rules=array('where'=>array('idComment'=>$id));
			if($this->comment_model->del($rules)){
				echo "Xóa";
			}else {
				echo 'Ko xóa';
			}
			
		}
	}
} ?>