
<!DOCTYPE html>
<html>
<head>
	<title>Đặt hàng</title>
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('css/home_css/order.css') ?>">
	<script type="text/javascript" src='<?php echo public_url('js/jquery-3.1.1.js'); ?>'></script>
	<script type="text/javascript" src='<?php echo public_url('js/shopcart.js') ?>' ></script>
	<script type="text/javascript" src='<?php echo public_url('js/order.js') ?>'></script>
	<script type="text/javascript" src='<?php echo public_url('js/jquery.session.js') ?>'></script>
</head>
<body>
	<div class="header">
		<a href="<?php echo base_url().'index.php/home/shopcart' ?>"><span>&#8592;</span></a>
		
	</div>
	<?php $this->load->view($temp) ?>
</body>
</html>