<?php /**
* 
*/
class Product extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->library('upload_library');
		$this->load->library('form_validation');
		
	}
	function add(){
		$file_path='./public/upload/product';
		if($this->input->post()){
			$check_idCatalog=$this->input->post('catalog');
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('price','price','required');
			// Khi có dữ liệu gửi lên kiểm tra xem định thêm vào là loại sản phẩm nào
			/* check_idCatalog=1 là smart_phone,
				check_idCatalog=2 là laptop,
				check_idCatalog=3 là tablet,
				check_idCatalog=4 là phụ kiện,
			*/
			if($check_idCatalog=='1'){
				$this->form_validation->set_rules('name','name','required');
				$this->form_validation->set_rules('price','price','required');
				$this->form_validation->set_rules('behind_camera','front_camera','required');
			}elseif($check_idCatalog=='2'){
				$this->form_validation->set_rules('name','name','required');
				$this->form_validation->set_rules('price','price','required');
				$this->form_validation->set_rules('cpu','cpu','required');
				$this->form_validation->set_rules('graphics','graphics','required');
				$this->form_validation->set_rules('display','display','required');
				$this->form_validation->set_rules('total','total','required');
			}
				if($this->form_validation->run()){
					$item=array();
					$item['name']=$_POST['name'];
				/*Khi upload ảnh, thì kiểm tra trong mục lưu ảnh đã tồn tại ảnh muốn upload chưa
				Nếu có rồi thì không upload mà chỉ lấy tên ảnh để lưu vào database
				Còn chưa có thì upload load ảnh mới đó vào */
				if(isset($_FILES['image'])){
					$link_tmp=getcwd().'/public/upload/product/'.$_FILES['image']['name'];
					echo $_FILES['image']['name'];
					if(file_exists($link_tmp)){
						/*Ảnh đã tồn tại*/
						$item['image_link']=$_FILES['image']['name'];
					}else{
						/*Ảnh chưa tồn tại*/
						$image=$this->upload_library->upload($file_path,'image');
						$item['image_link']=$image['file_name'];
					}
				}
				if(isset($_FILES['image_list'])){
					$item['image_list']=json_encode($this->upload_library->upload_many($file_path,'image_list'));
				}
				if(isset($_POST['price'])){
					$item['price']=(int)str_replace(',','',$_POST['price']);/*Loại bỏ nhưng kí tự , để ép kiểu về số*/
				}
				if(isset($_POST['discount'])){
					$item['discount']=$_POST['discount'];
				}

				if(isset($_POST['catalog'])){
					$item['idCatalog']=$_POST['catalog'];
					/*Lấy thuộc tính điện thoại + tablet*/
					if($_POST['catalog']=='1'||$_POST['catalog']=='3'){
						
						if(isset($_POST['system'])){
							$item['System']=$_POST['system'];
						}
						if(isset($_POST['front_camera'])){
							$item['front_camera']=$_POST['front_camera'];
						}
						if(isset($_POST['behind_camera'])){
							$item['behind_camera']=$_POST['behind_camera'];
						}
						if(isset($_POST['sim'])){
							$item['sim']=$_POST['sim'];
						}
					}
					/*Lấy thuộc tính máy tính*/
					if($_POST['catalog']=='2'){
						
						if(isset($_POST['graphics'])){
							$item['graphics']=$_POST['graphics'];
						}
						if(isset($_POST['connect'])){
							$item['connect']=$_POST['connect'];
						}
					}

				}
				if(isset($_POST['suplier'])){
					$item['idSuplier']=$_POST['suplier'];
				}

				if(isset($_POST['cpu'])){
					$item['cpu']=$_POST['cpu'];
				}
				
				if(isset($_POST['battery'])){
					$item['battery']=$_POST['battery'];
				}
				
				if(isset($_POST['ram'])){
					$item['ram']=$_POST['ram'];
				}
				
				if(isset($_POST['display'])){
					$item['display']=$_POST['display'];
				}
				
				if(isset($_POST['disk'])){
					$item['disk']=$_POST['disk'];
				}
				
				if(isset($_POST['content'])){
					$item['content']=$_POST['content'];
				}
				
				if(isset($_POST['total'])){
					$item['total']=$_POST['total'];
				}
				/*Tiến hành chèn vào database*/
				if($this->product_model->insert($item)){
					$this->session->set_flashdata('messager','Thêm thành công');
					redirect(admin_url('home/product'));
				}
			}
		}
		$data['catalog']=$this->catalog_model->get_list_item('');
		$data['suplier']=$this->suplier_model->get_list_item('');
		$data['temp']='admin/product/add_view';
		$this->load->view('admin/main',$data);
	}
	function edit(){
		$file_path='./public/upload/product';/*Đường dẫn để lưu file ảnh upload*/
		$id=$this->uri->segment(4);/*Lấy id product cần edit trên url*/
		$idCatalog=$this->uri->segment(5);/*Lấy id product cần edit trên url*/
		$rules=array('where'=>array('id'=>$id));
		$data['data']=$this->product_model->get_list_item($rules);/*Lấy thông tin của điện thoại cần edit*/
		// if($idCatalog=='1'){
		// 	$data['data']=$this->product_model->get_list_item($rules);/*Lấy thông tin của điện thoại cần edit*/
		// }elseif ($idCatalog=='2') {
		// 	$data['data']=$this->laptop_model->get_list_item($rules);/*Lấy thông tin của máy tính cần edit*/
		// }
		// elseif ($idCatalog=='3') {
		// 	/*Lấy thông tin của tablet cần edit*/
		// }
		// elseif ($idCatalog=='2') {
		// 	/*Lấy thông tin của phụ kiện cần edit*/
		// }
		
		if($this->input->post()){
				$item=array();
				$item['name']=$_POST['name'];
				/*Tương tự trước khi upload ảnh kiểm tra xem ảnh muốn thay đổi cho */
				if($_FILES["image"]["error"] == 0){
					$link=getcwd().'/public/upload/product/'.$data['data'][0]->image_link;
					if(file_exists($link)){
						unlink($link);
					}
					$link_tmp=getcwd().'/public/upload/product/'.$_FILES['image']['name'];
					//Kiểm tra ảnh muốn upload đã tồn tại trong cơ sở dữ liệu chưa, nếu có rồi thi lấy tên ảnh ko cần upload,còn chưa thì upload và lấy tên ảnh.
					if(file_exists($link_tmp)){
						
						$item['image_link']=$_FILES['image']['name'];
						
					}else{
						
						$image=$this->upload_library->upload($file_path,'image');
						$item['image_link']=$image['file_name'];//láy tên ảnh
					}
				}
				if($_FILES["image_list"]["error"][0] == 0){
					
					$item['image_list']=json_encode($this->upload_library->upload_many($file_path,'image_list'));//lấy danh sách tên ảnh
				}
				if(isset($_POST['price'])){
					$item['price']=(int)str_replace(',','',$_POST['price']);
				}
				
				if(isset($_POST['discount'])){
					$item['discount']=$_POST['discount'];
				}
				
				if(isset($_POST['catalog'])){
					$item['idCatalog']=$_POST['catalog'];
					if($_POST['catalog']=='1'||$_POST['catalog']=='3'){
						echo 'Điện thoại';
						if(isset($_POST['system'])){
							$item['System']=$_POST['system'];
						}
						if(isset($_POST['front_camera'])){
							$item['front_camera']=$_POST['front_camera'];
						}
						if(isset($_POST['behind_camera'])){
							$item['behind_camera']=$_POST['behind_camera'];
						}
						if(isset($_POST['sim'])){
							$item['sim']=$_POST['sim'];
						}
					}
					if($_POST['catalog']=='2'){
						
						if(isset($_POST['graphics'])){
							$item['graphics']=$_POST['graphics'];
						}
						if(isset($_POST['connect'])){
							$item['connect']=$_POST['connect'];
						}
						
						
					}
				}
				if(isset($_POST['suplier'])){
					$item['idSuplier']=$_POST['suplier'];
				}

				
				if(isset($_POST['cpu'])){
					$item['cpu']=$_POST['cpu'];
				}
				
				if(isset($_POST['battery'])){
					$item['battery']=$_POST['battery'];
				}
				
				if(isset($_POST['ram'])){
					$item['ram']=$_POST['ram'];
				}
				
				if(isset($_POST['display'])){
					$item['display']=$_POST['display'];
				}
				
				if(isset($_POST['disk'])){
					$item['disk']=$_POST['disk'];
				}
				
				if(isset($_POST['content'])){
					$item['content']=$_POST['content'];
				}
				
				if(isset($_POST['total'])){
					$item['total']=$_POST['total'];
				}
				/*Tiến hành update vào database*/
				if($this->product_model->update($id,$item)){
					$this->session->set_flashdata('messager','Đã sửa');
					// redirect(admin_url('home/product'));
				}
				// if($_POST['catalog']=='1'){
				// 	if($this->product_model->update($id,$item)){
				// 		$this->session->set_flashdata('messager','Đã sửa');
				// 		redirect(admin_url('home/product'));
				// 	}
				// }elseif ($_POST['catalog']=='2') {
				// 	if($this->laptop_model->update($id,$item)){
				// 		$this->session->set_flashdata('messager','Đã sửa');
				// 		redirect(admin_url('home/product'));
				// 	}
				// }
				
				
		}
		$data['catalog']=$this->catalog_model->get_list_item('');
		$data['suplier']=$this->suplier_model->get_list_item('');
		$data['temp']='admin/product/edit_view';
		$this->load->view('admin/main',$data);
	}
	function del(){
		$id=$this->uri->segment(4);
		$idCatalog=$this->uri->segment(5);
		$rules=array('where'=>array('id'=>$id));
		$item=$this->product_model->get_list_item($rules);
		$link=getcwd().'/public/upload/product/'.$item[0]->image_link;
		if(file_exists($link)){
			unlink($link);
		}
		if ($this->product_model->delete($id)) {
				$this->session->set_flashdata('messager','Đã xóa');
				redirect(admin_url('home/product'));
		}
		
		
	}
	function ajax_del(){
		$id=$this->input->post("stt");
		$idCatalog=$this->input->post("idCatalog");
		$rules=array('where'=>array('id'=>$id));
		$rules_del_cmt=array('where'=>array('idProduct'=>$id));
		$item=$this->product_model->get_list_item($rules);
		$link=getcwd().'/public/upload/product/'.$item[0]->image_link;
		
		if(file_exists($link)){
			unlink($link);
			echo 'đã xóa';
		}
		if($this->comment_model->delete_rule($rules_del_cmt)){
			$this->product_model->delete($id);
		}
		
	}
	function ajaxSelect(){
		$idCatalog=$_POST['id'];
		$rules=array('where'=>array('idCatalog'=>$idCatalog));
		$suplier=$this->suplier_model->get_list_item($rules);
		$html="<option value=\"\">Lựa chọn danh mục</option>";
		foreach ($suplier as $key => $value) {
			$html.="<option value=\"".$value->id."\">";
			$html.=$value->name;
			$html.="</option>";
		}
		echo $html;
	}
	
} ?>
