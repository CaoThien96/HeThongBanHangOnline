<?php
$order_by=$this->session->userdata('order_by');
?>
<div class="content">
		<div class="infor_shiper">
			<p>Chọn địa chỉ giao hàng</p>
			<div class="form_shiper">
				
				<table>
					<tr>
						<td>Họ tên đầy đủ<span style="color: red">*</span>:</td>
						<td><input type="text" name="name"></td>
						
					</tr>
					<tr>
						<td>Số điện thoại liên hệ<span style="color: red">*</span>:</td>
						<td><input type="text" name="phone"></td>
					</tr>
					<tr>
						<td>Địa chỉ giao hàng<span style="color: red">*</span>:</td>
						<td><input type="text" name="address"></td>
					</tr>
				</table>
				</div>
		</div>
		<div class="infor_order">
			<p>Thông tin đơn hàng</p>
			<table>
				<tr>
					<td>Sản phẩm</td>
					<td>Số lượng</td>
					<td>Giá</td>
				</tr>
				<?php $total=0 ;
				?>

				<?php foreach ($order_by as $key => $value): ?>
					
					<?php if (isset($value['quanty'])): ?>
						<tr>
							<td><?php echo  $value['name'] ?></td>
							<td><?php echo $value['quanty'] ?></td>
							<td><?php echo number_format($value['price']*$value['quanty'], 0, '.', ',') ?></td>
							<?php $total=$total+$value['price']*$value['quanty'] ?>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
				<?php $order_by['total']=$total;
					$this->session->set_userdata('order_by',$order_by); 
				?>
			</table>
		</div>
		<div style="clear: both;"></div>
		<button id="btnSubmitOrder">Tiếp Tục</button>
	</div>
	