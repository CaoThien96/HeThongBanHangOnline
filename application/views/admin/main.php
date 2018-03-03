<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/head') ?>
</head>
<body>
<?php $this->load->view('admin/left_content') ?>
<div id='rightSide'>
	<div class="topNav">
		<div class="wrapper">
			<div class="welcome">
				<span>Xin chào: <b>admin!</b></span>
			</div>
		
			<div class="userNav">
				<ul>
					<li><a href="<?php echo base_url().'index.php/home' ?>" target="_blank">
						<img style="margin-top:7px;" src="<?php echo public_url('admin/') ?>images/icons/light/home.png">
						<span>Trang chủ</span>
						</a>
					</li>
				
				<!-- Logout -->
				<li><a href="<?php echo admin_url('home/logout') ?>">
					<img src="<?php echo public_url('admin/') ?>images/icons/topnav/logout.png" alt="">
					<span>Đăng xuất</span>
				</a></li>
				
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
	</div>

	<?php $this->load->view($temp) ?>
	<div id="footer">
		<div class="wrapper">
			<div>Bản quyền © 2017-2018 sasamimi</div>
		</div>
	</div>
</div>
<div class="clear"></div>
<div class="view_transaction_background" id="back_ground"></div>
<div class="view_transaction" >
	<h2>Thông tin đơn hàng</h2>
	<div><span class="view_transaction_title">Họ Tên Người Nhận:</span><span class="user_name" >Cao Văn Thiện</span></div>
	<div><span class="view_transaction_title">Địa chỉ nhận hàng:</span><span class="address">241A Nguyễn Trãi Thanh Xuân Hà Nội</span></div>
	<div><span class="view_transaction_title">Điện thoại:</span><span class="phone"></span></div>
	<div><span class="view_transaction_title">Ngày đặt hàng:</span><span class="date"></span></div>
	<div><span class="view_transaction_title">Trạng thái đơn hàng:</span><span class="status"></span></div>
</div>

</body>
</html>