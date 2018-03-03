<?php /**
* 
*/
class MY_Controller extends CI_Controller
{
	public $data=array();

	function __construct()
	{
		# code...
		
		parent::__construct();
		$this->load->model('user_model');
		$controller=$this->uri->segment(1);
		switch ($controller) {
			/**
				Kiểm tra nếu trên url đang vào admin thì kiểm tra xem đã login chưa
			**/
			case 'admin':
				$controller_3=$this->uri->segment(3);
				/*Kiểm tra nếu là quản lí bán hàng thì ko đk vào quản lí acount*/
				if($controller_3=='admin'||$controller_3=='user'){
					$user=$this->session->userdata('admin');
					
					if($user->id_group_user=='3'){
						redirect(base_url().'index.php/admin/home');
					}
				}
				$this->load->helper('admin');
				$this->load->helper('home');
				$this->load->model('order_detail_model');
				$this->load->model('order_product_model');
				$this->load->model('order_model');
				$this->load->model('product_model');
				$this->load->model('user_model');
				$this->load->model('suplier_model');
				$this->load->model('cart_model');
				$this->load->model('catalog_model');
				$this->load->model('comment_model');
				$this->load->model('model');
				# code...
				$this->_check_login();
				break;
			/**
				Mặc định vào các trang giao diện khách hàng
			**/
			default:
				# code...
				$this->load->helper('home');
				$this->load->model('user_model');
				$this->load->model('catalog_model');
				$this->load->model('suplier_model');
				$this->load->model('product_model');
				$this->load->model('cart_model');
				$this->load->model('order_model');
				$this->load->model('order_detail_model');
				$this->load->model('order_product_model');
				$this->load->model('comment_model');
				$controller_2=$this->uri->segment(2);
				switch ($controller_2) {
					case 'shopcart':
						if(!$this->session->userdata('user')){
							redirect(base_url().'index.php/admin/login');
						}
						$sessionCart=$this->session->userdata('cart');
						$list_product_cart=array();
						foreach ($sessionCart as $key => $value) {
							# code...
							$list_product_cart[$key]=$this->product_model->get_infor($key);
						}
						$this->data['list_product_cart']=$list_product_cart;
						
						# code...
						break;
					case 'addcart':
						if(!$this->session->userdata('user')){
							redirect(base_url().'index.php/admin/login');
						}
						# code...
						break;
					case 'product':
						$idProduct=$this->uri->segment(3);
						$product=$this->product_model->get_infor($idProduct);
						$this->data['name_catalog']=$this->catalog_model->get_infor($product->idCatalog);
						
						$this->data['product']=$this->product_model->get_infor($idProduct);
						$rules=array('select'=>'',
									'from'=>'user,comment',
									'where'=>'comment.idProduct='.$idProduct.' and user.id=comment.idUser');
						$this->data['comment']=$this->comment_model->get_list_item($rules);
						break;
					
					case 'list_product_catalog':
						$this->load->library('pagination_library');

						$idCatalog=$this->uri->segment(3);//Lấy mã loại sản phảm
						$this->data['name_catalog']=$this->catalog_model->get_infor($idCatalog);
						$rule=array('where'=>array('idCatalog'=>$idCatalog));

						$total_rows=$this->product_model->get_count($rule);
						$url=base_url().'index.php/home/list_product_catalog/'.$idCatalog;
						$segment=$this->pagination_library->pagination_page($total_rows,10,$url,4);
						$rule['limit']=array('row'=>10,'start'=>$segment);
						$this->data['list_product']=$this->product_model->get_list_item($rule);
						break;
					case 'list_product_suplier':
						$this->load->library('pagination_library');
						$idCatalog=$this->uri->segment(3);//Lấy mã loại sản phảm
						$this->data['name_catalog']=$this->catalog_model->get_infor($idCatalog);
						$idSuplier=$this->uri->segment(4);//Lấy mã nhà sản xuất
						$this->data['name_suplier']=$this->suplier_model->get_infor($idSuplier);
						$rule=array('where'=>array('idCatalog'=>$idCatalog,'idSuplier'=>$idSuplier));
						$total_rows=$this->product_model->get_count($rule);
						$url=base_url().'index.php/home/list_product_suplier/'.$idCatalog.'/'.$idSuplier;
						$segment=$this->pagination_library->pagination_page($total_rows,10,$url,5);
						$rule['limit']=array('row'=>20,'start'=>$segment);
						$this->data['list_product']=$this->product_model->get_list_item($rule);
						break;
					default:
						# code...
						$max_view=array('order_by'=>'view',
										'limit'=>array('row'=>5,'start'=>0));
						$max_buy=array('order_by'=>'buyed',
										'limit'=>array('row'=>5,'start'=>0));
						$this->data['max_view']=$this->product_model->get_list_item($max_view);
						$this->data['max_buy']=$this->product_model->get_list_item($max_buy);
						break;
				}
				if($this->session->userdata('user')){
					$idUser=$this->session->userdata('user')->id;
				}
				$this->data['catalog']=$this->catalog_model->get_list_item('');
				$this->data['suplier']=$this->suplier_model->get_list_item('');
				break;
		}
	}
	function _check_login(){
		$login=$this->session->userdata('admin');
		$controller=$this->uri->segment(2);
		if($login&&$controller=='login'){
			redirect(admin_url('home'));
		}
		if(!$login&&$controller!='login'){
			redirect(admin_url('login'));
		}
	}
	
	
} ?>