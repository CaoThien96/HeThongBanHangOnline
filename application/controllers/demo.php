<?php /**
* 
*/
class Demo extends CI_Controller
{
	
	
	function index(){
		
		$this->load->view('demo_view');
	}
	function result(){
		$arr = $this->input->post('arr');
		pre($arr);
	}
	
} ?>