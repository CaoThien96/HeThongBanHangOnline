<?php
$order_by=$this->session->userdata('order_by');
	
 ?>
 
 
<div class="content">
	<div class="infor_shiper">
		<p>Chính sách đặt hàng</p>
		
		<!-- Mô tả thanh toán -->
		<div class="detail_payment">
			Quý khách sẽ thanh toán bằng tiền mặt khi nhận hàng tại nhà
Lưu ý: 
- Bạn nhớ kiểm tra kỹ thông tin của đơn hàng bên phải vì thông tin này sẽ không thể thay đổi sau khi đơn hàng được xác nhận thành công.
- Cửa hàng sẽ không gửi tin nhắn xác nhận đơn hàng nên bạn vui lòng xem lại thông tin trong xác nhận đơn hàng được gửi qua email.
- Nhằm đảm bảo quyền lợi mua sắm cho các khách hàng cá nhân, Cửa hàng sẽ giới hạn số lượng sản phẩm trong mỗi đơn hàng và chúng tôi xin phép từ chối đơn hàng có dấu hiệu mua đi bán lại.
Trong mọi trường hợp, trừ khi có yêu cầu khác đi, Quý Khách hàng sẽ nhận được hoá đơn theo thông tin cá nhân đã đăng ký khi mua hàng tại Cửa hàng. Để chuyển đổi từ hóa đơn cho cá nhân sang hóa đơn cho doanh nghiệp, Quý Khách hàng vui lòng liên hệ Cửa hàng trong vòng 7 ngày kể từ ngày đặt hàng. Sau thời gian trên, Cửa hàng có toàn quyền từ chối hỗ trợ chuyển đổi.
 ĐẶT HÀNG
		</div>
		
	</div>
	<div class="infor_order" style="margin-left: 10px">
		<p>Địa chỉ thanh toán</p>
		<div>
			Họ tên ngươi nhận:<span><?php echo $order_by['address']['name'] ?></span><br>
			Số điện thoại:<?php echo $order_by['address']['phone'] ?> <br>
			Địa chỉ giao hàng:<?php echo $order_by['address']['address'] ?>
		</div>
		<p>Thông tin đơn hàng</p>
		<table>
				<tr>
					<td>Sản phẩm</td>
					<td>Số lượng</td>
					<td>Giá</td>
				</tr>
				<?php $total=0 ?>
				<?php foreach ($order_by as $key => $value): ?>		
						<?php if (isset($value['quanty'])): ?>
						<tr>
							<td><?php echo $value['name'] ?></td>
							<td><?php echo $value['quanty'];$quanty=(double)$value['quanty'];$price=(double)$value['price']; ?></td>
							<td><?php echo number_format($quanty*$price, 0, '.', ',');$total=$total+$quanty*$price?></td>
						</tr>
						<?php endif ?>	
				<?php endforeach ?>
		</table>
		<p>Hình thức giao hàng</p>
		<div>
			<input type="radio" name="ship">
				<label>
					<span>Giao hàng tiết kiệm(Miễn phí)</span><br>
					<span>Giao từ Thứ Bảy, 1 - Thứ Năm, 6 Tháng 4 2017</span>
				</label>
				<br>
			<input type="radio" name="ship">
				<label>
					<span>Giao hàng tiêu chuẩn:<strong>22,000 đ</strong></span><br>
					<span>Giao từ Thứ Bảy, 1 - Thứ Năm, 6 Tháng 4 2017</span>
				</label>
		</div>
		<p>Thành tiền: <strong class="price"><?php echo number_format($total, 0, '.', ',') ?></strong></p>
		<button class="submit_order" id="btnSubmit" >Đặt Hàng</button>
	</div>
	<div style="clear: both;"></div>
</div>
