<?php $CI =& get_instance() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hệ thống bán hàng sasamimi</title>
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo public_url('css/home_css/header.css') ?>">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo public_url('css/home_css/content.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('css/menu/menu.css'); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('css/home_css/top_footer.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('css/slide/slide.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('css/home_css/product.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('css/home_css/shopcart.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('css/home_css/profile.css'); ?>">

	<script type="text/javascript" src='<?php echo public_url('js/jquery-3.1.1.js'); ?>'></script>
	<script type="text/javascript" src='<?php echo public_url('js/product.js'); ?>'></script>
	<script type="text/javascript" src='<?php echo public_url('js/slide.js'); ?>'></script>
	<script type="text/javascript" src='<?php echo public_url('js/search_price.js'); ?>'></script>
	<script type="text/javascript" src='<?php echo public_url('js/ajax_auto_complete.js'); ?>'></script>
	<script type="text/javascript" src='<?php echo public_url('js/jquery-ui.js'); ?>'></script>
	<script type="text/javascript" src='<?php echo public_url('js/customConfirm.js'); ?>'></script>
	<style type="text/css">
		.ui-menu-item{color: black;z-index: 999;position: relative;cursor: pointer;background-color: white;width: 347px;border-bottom: 1px dotted #ccc;}
		.ui-menu-item:hover{background-color: #999;}
	</style>
</head>
<body>
<div class="wraper">
	<!-- header -->

	<?php $this->load->view('home/header/header',$this->data) ?>
	<!-- end header -->
	<!-- content -->
	<?php $this->load->view($temp,$this->data) ?>
	<!-- end content -->
	<!-- footer -->
		<!-- top_footer -->
			<?php $this->load->view('home/footer/top_footer') ?>
		<!-- end-topfooter -->
		<!-- bot_footer -->
			<?php $this->load->view('home/footer/bot_footer') ?>
		<!-- end-bot-footer -->
	<!-- end-footer -->
</div>
<div class="background_messager" <?php if(!$this->session->flashdata('messager')) echo 'style="display: none;"' ?>></div>
<div class="messager" <?php if(!$this->session->flashdata('messager')) echo 'style="display: none;"' ?>>
		<img src="<?php echo public_url('image/shipper.png')?>">
		<h2><?php echo $this->session->flashdata("messager") ?><br>Nhân viên sẽ gọi điện xác nhận sớm cho bạn</h2>
</div>
</body>
<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",63090]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
</html>

