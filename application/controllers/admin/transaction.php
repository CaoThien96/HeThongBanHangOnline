<?php /**
* 
*/
class Transaction extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		
	}
	function index(){
		$data['temp']='admin/transaction/index';
		
		$this->load->view('admin/main',$data);
	}
	
} ?>