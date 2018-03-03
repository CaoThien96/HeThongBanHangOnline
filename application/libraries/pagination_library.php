<?php 
	/**
	* 
	*/
	class Pagination_library 
	{
		var $CI='';
		function __construct()
		{
			$this->CI=& get_instance();
		}
		function pagination_page($total_rows='',$per_page='',$url='',$uri_segment=''){
			$this->CI->load->library('pagination');
			$config=array();
			$config['total_rows']=$total_rows;/*Tổng tất cả sản phẩm trên website*/
			$config['per_page']  =  $per_page;
			$config['next_link'] =  'Next »';
			$config['prev_link'] =  '« Prev';
			$config['base_url'] =  $url;
			$config['uri_segment']	 =  $uri_segment;
			$segment=$this->CI->uri->segment($uri_segment);
			$segment=intval($segment);
			$this->CI->pagination->initialize($config); 
			return $segment;
		}
		function abc(){
			echo 'load abc';
		}
	} 
?>