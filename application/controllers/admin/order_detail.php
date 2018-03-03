<?php /**
* 
*/
class ClassName extends MY_Controller
{
	
	function __construct(argument)
	{
		# code...
	}
	function index(){
		$data['temp']='admin/order/index';
		$this->load->view('admin/main',$data);
	}
} ?>