<script type="text/javascript">
	
</script>
<ul class="breadcrumb">
	<li>Trang chủ</li>
	<?php if (isset($name_catalog)&&!isset($name_suplier)): ?>
		<li class="active"><?php echo $name_catalog->name ?></li>
	<?php endif ?>
	<?php if(isset($name_suplier)): ?>
		<li><?php echo $name_catalog->name ?></li>
		<li class="active"><?php echo $name_suplier->name ?></li>
	<?php endif ?>
	<div class="clear"></div>
</ul>
<ul class="list_product">
	<?php $i=1; ?>
	<?php foreach ($list_product as $value): ?>
	<li <?php if($i%5==0) echo 'style="border-right: none"' ?> class='product_home' idProduct=<?php echo $value->id ?> >
		<a href="<?php echo base_url().'index.php/home/product/'.$value->id.'/'.$value->idCatalog ?>">
			<img src="<?php echo public_url('upload/product/').$value->image_link ?>" height="150" width="150">
			<h3><?php echo $value->name ?></h3>
			<strong><?php  echo number_format($value->price, 0, '.', ','); ?>đ</strong>
			<div class="promotion">
				<span>Trả góp 0%</span>
				<span>Cơ hội trúng xe SH150i khi mua iphone tại Hà Nội</span>
			</div>
			<figure class="bginfor">
				<h3><?php echo $value->name ?></h3>
				<strong><?php echo $value->price ?>đ</strong>
				<span>Màn hình:<?php echo $value->display ?></span>
				<?php if ($value->idCatalog=='1'): ?>
					<span>Hệ điều hành:<?php echo $value->system ?></span>
				<?php endif ?>
				<span>CPU: <?php echo $value->cpu ?></span>
				<span>RAM: <?php echo $value->ram ?>, ROM: <?php echo $value->disk ?></span>
				<?php if ($value->idCatalog=='1'): ?>
					<span>Camera: <?php echo $value->behind_camera ?>, Selfie: <?php echo $value->front_camera ?></span>
				<?php endif ?>
				<span>PIN: <?php echo $value->battery ?>,
				<?php if ($value->idCatalog=='1'): ?>
				 	SIM: <?php echo $value->sim ?> SIM</span>
				 <?php endif ?> 
			</figure>
		</a>
	</li>
	<?php $i++ ?>
	<?php endforeach ?>
</ul>
<div class='pagination'>
	<?php echo $this->pagination->create_links(); ?>
</div>
<div class="clear"></div>
	