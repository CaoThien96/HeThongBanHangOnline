<?php 
	
	class Auto_complete extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function index(){
			$data['temp']='home/search/index';
			if(isset($_POST['key-search'])){
				$rules=array('where'=>array('name'=>$_POST['key-search']));
			}
			$list_product=$this->product_model->get_infor_rules($rules);
			$idCatalog=$list_product->idCatalog;
			$data['name_catalog']=$this->catalog_model->get_infor($idCatalog);
			$data['product']=$list_product;
			$rules=array('select'=>'',
				'from'=>'user,comment',
				'where'=>'comment.idProduct='.$list_product->id.' and user.id=comment.idUser');
			$this->data['comment']=$this->comment_model->get_list_item($rules);
			$this->load->view('home/main',$data);
		}
		function ajax_auto_complete(){
			if(!isset($_REQUEST['term'])){
				exit();
			}
			$rules=array('like'=>array('name'=>ucfirst($_REQUEST['term'])));
			$list_product=$this->product_model->get_list_item($rules);
			$array=array();
			foreach ($list_product as $key => $value) {
				array_push($array,$value->name);
			}
			echo json_encode($array);
		}
	}
 ?>