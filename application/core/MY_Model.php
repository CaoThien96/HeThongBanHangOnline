<?php /**
* 
*/
class MY_Model extends CI_Model
{
	var $table='';
	function __construct()
	{
		# code...
		parent::__construct();
	}
	function check_exits($where){
		$this->db->where($where);//$where=array('id')
		$query=$this->db->get($this->table);
		if($query->num_rows()>0){
			return true;
		}
		return false;
	}
	function get_count($rules){
		if(isset($rules['where'])){
			$this->db->where($rules['where']);
		}
		return $this->db->get($this->table)->num_rows();
	}
	function get_sum(){
		$this->db->select_sum('id');
		$this->db->from('order');
		return $this->db->get();
	}
	
	function get_infor($id){
		$this->db->where('id',$id);
		return $this->db->get($this->table)->row();
	}
	
	function get_infor_rules($rules=array()){
		if(isset($rules['where'])){
			$this->db->where($rules['where']);
		}
		return $this->db->get($this->table)->row();
	}
	function get_list_table($Bang){
		
	}
	function get_list_item($rules){
		if(isset($rules['select'])){
			$this->db->select($rules['select']);
		}
		if(isset($rules['where'])){
			$this->db->where($rules['where']);
		}
		if(isset($rules['limit'])){
			$this->db->limit($rules['limit']['row'],$rules['limit']['start']);//row là chỉ số dòng lấy ra, start chỉ vị trí bắt đầu lấy dữ liệu Ví dụ: $rules=array('limit'=>array('row'=>5,'start'=>0));
		}
		if(isset($rules['order_by'])){
			$this->db->order_by($rules['order_by'],'Desc');
		}
		if(isset($rules['like'])){
			$this->db->like($rules['like']);
		}
		if(isset($rules['from'])){
			$this->db->from($rules['from']);
			$query=$this->db->get();
		}else{
			$query=$this->db->get($this->table);
		}
		
		// echo $this->db->last_query();
		return $query->result();
		// return $this->db->last_query();
	}

	function insert($data){
		
		return $this->db->insert($this->table,$data);

	}
	function update($id,$data){
		$this->db->where(array('id'=>$id));
		 
		return $this->db->update($this->table,$data);
	}
	function delete($id){
		$this->db->where(array('id'=>$id));
		return $this->db->delete($this->table);
		
		
	}
	function delete_rule($rules){
		if(isset($rules['where'])){
			$this->db->where($rules['where']);
		}
		return $this->db->delete($this->table);
	}
	function del($rules){
		if(isset($rules['where'])){
			$this->db->where($rules['where']);
			return $this->db->delete($this->table);
		}

	}
} ?>