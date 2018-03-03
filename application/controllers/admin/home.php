<?php /**
* 
*/
class Home extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->library('form_validation');
	}
	/*Module trang chủ admin*/
	function index(){
		$data['count_order']=$this->order_model->get_count('');
		$data['count_product']=$this->product_model->get_count('');
		$rules_user=array('where'=>array('id_group_user'=>2));
		$data['count_user']=$this->user_model->get_count($rules_user);
		$data['sum_total']=$this->order_model->get_sum();
		$data['list_order']=$this->order_model->get_list_item('');
		$data['temp']='admin/index';
		$this->session->set_flashdata('messager','Thêm thành công');
		$this->load->view('admin/main',$data);
	}
	/*Module giao dịch admin*/
	function transaction(){
		$data['temp']='admin/transaction/index';
		$data['data']=$this->order_model->get_list_item('');
		$this->load->view('admin/main',$data);
	}
	/*Module đơn hàng sản phẩm admin*/
	function order_product(){
		$data['temp']='admin/order/index';
		$rules=array('where'=>'order_detail.idProduct=product.id and order_detail.idOrder=order.id ',
			'select'=>'idOrder,idProduct,quanty,name,price,status,image_link,created');
		$data['data']=$this->order_product_model->get_list_item($rules);
		$this->load->view('admin/main',$data);
	}
	/*Module sản phẩm admin*/
	function product(){
		$this->load->library('pagination_library');
		$total_row=$this->product_model->get_count('');
		$data['total_row']=$total_row;
		$url=base_url().'index.php/admin/home/product';
		$segment=$this->pagination_library->pagination_page($total_row,10,$url,4);
		$rules=array('limit'=>array('row'=>10,'start'=>$segment));
		$rules['order']='id';
		$data['catalog']=$this->catalog_model->get_list_item('');
		$data['suplier']=$this->suplier_model->get_list_item('');
		$data['isPage']=1;
		$data['data']=$this->product_model->get_list_item($rules);
		/*Lọc dữ liệu sản phẩm theo tên loại nhà cung cấp*/
		if($this->input->post()){
			$where=array();
			$rules=array();
			$data['isPage']=0;
			/*Kiểm tra có nhập dữ liệu vào trường tên ko*/
			if(!empty($_POST['name'])){
				$name=$_POST['name'];
				$rules['like']=array('name'=>$name);
			}
			/*Kiểm tra xem KH có chọn loại và nhà sản xuất ko*/
			if(ctype_space($_POST['catalog'])&&ctype_space($_POST['suplier'])){
				$data['data']=$this->product_model->get_list_item($rules);
			}else{
				$idCatalog=$_POST['catalog'];
				$idSuplier=$_POST['suplier'];
				$data['data']=$this->rulesSelect($idCatalog,$idSuplier,$rules);

			}
		}
		/*Kiểm tra coi có biến flashdata thông báo không*/
		if($this->session->flashdata('messager')){
			$data['messager']=$this->session->flashdata('messager');
		}
		$data['temp']='admin/product/index_view';
		$this->load->view('admin/main',$data);
	}
	/*Module hãng sản xuất admin*/
	function suplier(){
		$data['temp']='admin/suplier/index';
		$this->load->view('admin/main',$data);
	}
	/*Module thể loại admin*/
	function catalog(){
		$data['temp']='admin/catalog/index';
		
		$this->load->view('admin/main',$data);
	}
	/*Module comment admin*/
	function comment(){
		$data['temp']='admin/comment/index';
		$rules=array('select'=>'comment.content,comment.idComment,comment.time,user.name,user.email,user.image_link,product.image_link,product.name,product.id',
					'from'=>'user,comment,product',
					'where'=>'comment.idUser=user.id AND comment.idProduct=product.id');
		$data['comment']=$this->catalog_model->get_list_item($rules);
		$this->load->view('admin/main',$data);
	}
	/*Module acount admin*/
	function admin(){
		$data['temp']='admin/admin/index';
		$rules=array('where'=>'id_group_user!=2');
		$data['admin']=$this->user_model->get_list_item($rules);
		$this->load->view('admin/main',$data);
	}
	/*Module acount user admin*/
	function user(){
		$rules=array('where'=>array('id_group_user'=>'2'));
		$data['user']=$this->user_model->get_list_item($rules);
		$data['temp']='admin/user/index';
		$this->load->view('admin/main',$data);
	}
	/*Module logout */
	function logout(){
		$this->session->unset_userdata('admin');
		redirect(admin_url('login'));
	}
	
	/*lấy dữ liệu theo loại hoặc nhà sản xuất */
	function rulesSelect($idCatalog='',$idSuplier='',$rules=array()){
		
		$data['data']=array();
		if(!ctype_space($idCatalog)&&ctype_space($idSuplier)){
			$rules['where']=array('idCatalog'=>$idCatalog);
			$data['data']=$this->product_model->get_list_item($rules);
			// pre($rules);
			return $data['data'];
		}
		/*Trường hợp chỉ chọn nhầ sản xuất*/
		if(ctype_space($idCatalog)&&!ctype_space($idSuplier)){
			$where['idSuplier']=$idSuplier;
			$rules['where']=array('idSuplier'=>$idSuplier);
			$data['data']=$this->product_model->get_list_item($rules);
			// pre($rules);
			return $data['data'];
		}
		/*Trường hợp chọn cả 2*/
		if(!ctype_space($idCatalog)&&!ctype_space($idSuplier)){
			$where['idCatalog']=$idCatalog;			
			$where['idSuplier']=$idSuplier;
			$rules['where']=array('idSuplier'=>$idSuplier,'idCatalog'=>$idCatalog);
			$data['data']=$this->product_model->get_list_item($rules);
			return $data['data'];
		}
		
	}
} ?>