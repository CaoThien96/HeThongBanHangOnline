<?php $sessionCart=$this->session->userdata('cart');
	
 ?>
<link rel="stylesheet" href="<?php public_url('css/menu/nav.css') ?>">
<link rel="stylesheet" href="<?php public_url('css/menu/ie.css') ?>">
<div class='header'>
<!-- top -->
	<div class="top" >
		<div id="logo">
			<a href="">
				<img src="<?php echo public_url('image/home/logo.jpg') ?>">
			</a>
		</div>
		<?php if ($this->session->userdata('user')!=null): ?>
			<div id="cart_expand" class="cart">
				<a href="<?php echo base_url().'index.php/home/shopcart' ?>">Giỏ Hàng <span id="in_cart"><?php echo count($sessionCart) ?></span>Sản Phẩm <img id="img_cart" src="<?php echo public_url('image/home/cart.png') ?>"></a>
			</div>
		<?php endif ?>
			
		<div id="search" >
			<form action="<?php echo home_url('auto_complete/index') ?>" method="POST">
				<input type="text" name="key-search" id="text_search" value="" placeholder="Tìm kiếm sản phẩm...">
				
				<input type="submit" name="text_btn_search" id="text_btn_search" value="">
			</form>
		</div>
		<div class="clear"></div>
	</div>
<!-- End top -->
<!-- main_menu -->
	<div class="main_menu">
			<ul >
				<li><a href="<?php echo base_url().'index.php/home' ?>">Trang chủ</a></li>
				<li><a href="">Giới thiệu</a></li>
				<?php foreach ($catalog as $value_catalog): ?>
				<li><a href="<?php echo base_url().'index.php/home/list_product_catalog/'.$value_catalog->id ?>" class="sub"><?php echo $value_catalog->name ?></a>
					<ul>
					<?php foreach ($suplier as $value_suplier): ?>
						<?php if ($value_catalog->id==$value_suplier->idCatalog): ?>
						
						<li>
							<a href="<?php echo base_url().'index.php/home/list_product_suplier/'.$value_catalog->id.'/'.$value_suplier->id ?>"><?php echo $value_suplier->name ?></a>
						</li>
						<?php endif ?>
						<?php endforeach ?>
					</ul>
				</li>
				<?php endforeach ?>


				<?php if ($this->session->userdata('user')): ?>
					<li><a href="<?php echo home_url('profile') ?>"><?php echo 'Xin chào'?></a></li>
					<li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url('index.php/home/logout') ?>">Thoát</a></li>
				<?php endif ?>
				<?php if ($this->session->userdata('admin')): ?>
					
					<li><a href="<?php echo base_url().'index.php/admin/home' ?>">Admin</a></li>
				<?php endif ?>
				<?php if (!$this->session->userdata('user')&&!$this->session->userdata('admin')): ?>
					<li><a href="<?php echo base_url('index.php/register') ?>">Đăng kí</a></li>
					<li><a href="<?php echo base_url('index.php/admin/login') ?>">Đăng nhập</a></li>
				<?php endif ?>
			</ul>
			<div class="clear"></div>
		</div>
<!-- End main_menu -->
</div>