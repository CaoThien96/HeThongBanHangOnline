<?php /**
* 
*/
class Upload_library 
{
	
	var $CI='';
	function __construct(){
		$this->CI=& get_instance(); 

	}
	function upload($file_path='',$input_name=''){
		$config=$this->config($file_path);
		$this->CI->load->library('upload',$config);
		if($this->CI->upload->do_upload($input_name)){
			$data=$this->CI->upload->data();
			return $data;
		}
		else{
			$data=$this->CI->upload->display_errors();
			return '';
		}
		

	}
	function upload_many($file_path='',$input_name=''){
		$config=$this->config($file_path);
		$name_array=array();
		
        //lưu biến môi trường khi thực hiện upload
        $file  = $_FILES['image_list'];
        pre('$file');
        $count = count($file['name']);//lấy tổng số file được upload
        for($i=0; $i<=$count-1; $i++) {
              
              $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
              $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
              $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
              $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
              $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
              //load thư viện upload và cấu hình
              $this->CI->load->library('upload', $config);
              //thực hiện upload từng file
              if($this->CI->upload->do_upload())
              {
                  //nếu upload thành công thì lưu toàn bộ dữ liệu
                  $data = $this->CI->upload->data();
                  //in cấu trúc dữ liệu của các file
                $name_array[]=$data['file_name'];
              }     
         }
        return $name_array;
	}
	function config($file_path=''){
		$config=array();
		$config['upload_path']   = $file_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = "1080";
		$config['max_width']     = '1024';
		$config['max_height']    = '1024';
		return $config;
	}
	
} ?>