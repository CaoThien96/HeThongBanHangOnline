<script type="text/javascript" src='<?php echo public_url('js/shopcart.js'); ?>' ></script>
<script type="text/javascript" src='<?php echo public_url('js/jquery.session.js'); ?>'></script>
<?php $session_cart=$this->session->userdata('cart')?> 
<div class="shopcart">
	<div class="shopcart_header">
		<div class="shopcart_header_name">Sản phẩm</div>
		<div class="shopcart_header_name_next">Đơn giá</div>
		<div class="shopcart_header_name_next">Số lượng</div>
		<div class="shopcart_header_name_next">Số tiền</div>
		<div class="shopcart_header_name_next">Thao tác</div>
		<div class="clear"></div>
	</div>
	<?php $i=1 ?>
	<?php foreach ($list_product_cart as $key => $value): ?>
	<div class="shopcart_content" id=<?php echo $i;$i++ ?>><!-- Mỗi div chứa 1 sản phẩm trong giỏ hàng -->
		<div class="shopcart_header_name"><!-- Ảnh và tên sản phẩm -->
			<input  type="checkbox" name="select"  value="<?php echo $value->id ?>" >
			<img src="<?php echo public_url('upload/product/').$value->image_link ?>">
			<h3><?php echo $value->name ?></h3>
			<div class="clear"></div>
		</div>
		<div  class="shopcart_header_name_next"><!-- Đơn giá -->
			<strong class="price" price=<?php echo number_format($value->price, 0, '.', ',')?>>
				<?php echo number_format($value->price, 0, '.', ',')?>đ
			</strong>
		</div>
		<div  class="shopcart_header_name_next"  style="margin-top: 10px" >
			
			<button class="btnMinus" name="down">&#8211;</button>
			
			<input class="quanty" type="text" name="add" value="<?php echo $session_cart[$key] ?>" >
			
			<button class="btnPlus" name="plus">&#10010;</button>
			<div class="clear"></div>
			
		</div>
		<div  class="shopcart_header_name_next">
			<strong class="total price" price=<?php echo number_format($session_cart[$key]*$value->price, 0, '.', ',')?>>
				<?php echo number_format($session_cart[$key]*$value->price, 0, '.', ',')?>đ
			</strong>
			
		</div>
		<div  class="shopcart_header_name_next">
			<button id="del_product" idProduct="<?php echo $value->id ?>" onclick='CustomConfirm.show("Are you sure?",gotoMyChange)'>Xóa</button>
		</div>
		<div class="clear"></div>
	</div>
	<?php endforeach ?>
	<div class="shopcart_btn">
		<input type="checkbox" name="checkAll"><label>Chọn tất cả</label>
		<strong class="price">Tổng giá:<span class="total_price">0đ</span></strong>
		<p class="button_buy">Mua Hàng</p>
		<div class="clear" ></div>
	</div>
</div>
<?php $this->load->view('custom_confim') ?>
<script type="text/javascript">
	var base_url = '<?php echo base_url();?>';
</script>

