<?php /**
* 
*/
class Order_product_model extends MY_Model
{
	var $table='order_detail,product,order';
	function __construct()
	{
		# code...
		parent::__construct();
	}
} ?>