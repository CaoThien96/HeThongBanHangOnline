<?php 
class Suplier extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		
	}
	function index(){
		$data['temp']='admin/suplier/index';
		$this->load->view('admin/main',$data);
	}
	
} ?>
 