<div class="content">
	<div class="left_content">
		<div class="title">
			<h3>Tìm kiếm</h3>		
		</div>

		<div class="search_price">

			<label>Giá từ:</label>
			<select name="start_price" class="select_price">
				<?php for($i=0;$i<=10;$i++): ?>
					<option><?php echo number_format($i*1000000, 0, '.', ',') ?></option>
				<?php endfor ?>
			</select><br>
			<label>Giá tới:</label>
			<select name="end_price" class="select_price">
				<?php for($i=1;$i<=20;$i+=2): ?>
					<option><?php echo number_format($i*1000000, 0, '.', ',') ?></option>
				<?php endfor ?>
				
			</select>
			<input type="submit" id='btnSearch_price' name="btnSearch_price" value="Search">

		</div>
		<div class="title">
			<h3>Tin tức khuyến mại</h3>		
		</div>
		<div>
			<ul>
				<a href="">
					<li class="news">
						<img src="<?php echo public_url('upload/news/636252787213191841_viber image.jpg') ?>">
						<h4>Sasamimi Shop tặng loa Bluetooth trị giá hơn 2 triệu đồng cho khách mua Galaxy A3 2017</h4>
					</li>
				</a>
				<a href="">
					<li class="news">
						<img src="<?php echo public_url('upload/news/636252787213191841_viber image.jpg') ?>">
						<h4>Sasamimi Shop tặng loa Bluetooth trị giá hơn 2 triệu đồng cho khách mua Galaxy A3 2017</h4>
					</li>
				</a>
				<a href="">
					<li class="news">
						<img src="<?php echo public_url('upload/news/636252787213191841_viber image.jpg') ?>">
						<h4>Sasamimi Shop tặng loa Bluetooth trị giá hơn 2 triệu đồng cho khách mua Galaxy A3 2017</h4>
					</li>
				</a>
				
			</ul>
		</div>
	</div>

	<div class="main_content">
		<div class="slide">
			<span class="pre">&#10094;</span>
			<span class="next">&#10095;</span>
			<ul>
				<li class="active" stt=0></li>
				<li stt=1></li>
				<li stt=2></li>
				<li stt=3></li>
			</ul>
			<img  style="display: block;" src="<?php echo public_url('image/slide1.png') ?>" stt=0>
			<img src="<?php echo public_url('image/slide2.png') ?>" stt=1>
			<img src="<?php echo public_url('image/slide3.png') ?>" stt=2>
			<img src="<?php echo public_url('image/slide4.png') ?>" stt=3>	
		</div>
		<!-- Sản phẩm bán chạy -->
		<div class="title">
			<h3>Sản phẩm xem nhiều nhất</h3>		
		</div>
		
		<ul class="list_product">
		<script type="text/javascript">
			var public_url = '<?php echo public_url("upload/product/") ?>';
			var base_url = '<?php echo base_url().'index.php/' ?>';
		</script>
		<?php $i=1; ?>
			<?php foreach ($max_view as $value): ?>

			<li <?php if($i%5==0) echo 'style="border-right: none"' ?> class='product_home' idProduct=<?php echo $value->id ?> >
				<a href="<?php echo base_url().'index.php/home/product/'.$value->id ?>">
					<img src="<?php echo public_url('upload/product/').$value->image_link ?>" height="150" width="150">
					<h3><?php echo $value->name ?></h3>
					<strong><?php  echo number_format($value->price, 0, '.', ','); ?>đ</strong>
					<div class="promotion">
						<span>Trả góp 0%</span>
						<span>Cơ hội trúng xe SH150i khi mua iphone tại Hà Nội</span>
					</div>
					<figure class="bginfor">
						<span><?php echo $value->name ?></span>
						<strong><?php  echo number_format($value->price, 0, '.', ','); ?>đ</strong>
						<span>Màn hình: <?php echo $value->display ?></span>
						<span>HĐH: <?php echo $value->system ?></span>
						<span>CPU: <?php echo $value->cpu ?></span>
						<span>RAM: <?php echo $value->ram ?>, ROM: <?php echo $value->disk ?></span>
						<span>Camera: <?php echo $value->behind_camera ?>, Selfie: <?php echo $value->front_camera ?></span>
						<span>PIN: <?php echo $value->battery ?>, SIM: <?php echo $value->sim ?> SIM</span>
					</figure>
				</a>
			</li>
			<?php $i++ ?>
			<?php endforeach ?>
		</ul>
		<div class="clear"></div>
		<!-- end sản phẩm xem nhiều -->
		<!-- sản phẩm giảm giá -->
		<div class="title">
			<h3>Sản phẩm mua nhiều nhất</h3>		
		</div>
		<ul class="list_product">
		<?php $i=1; ?>
			<?php foreach ($max_buy as $value): ?>

			<li <?php if($i%5==0) echo 'style="border-right: none"' ?> >
				<a href="<?php echo base_url().'index.php/home/product/'.$value->id ?>">
					<img src="<?php echo public_url('upload/product/').$value->image_link ?>" height="150" width="150">
					<h3><?php echo $value->name ?></h3>
					<strong><?php  echo number_format($value->price, 0, '.', ','); ?>đ</strong>
					<div class="promotion">
						<span>Trả góp 0%</span>
						<span>Cơ hội trúng xe SH150i khi mua iphone tại Hà Nội</span>
					</div>
					<figure class="bginfor">
						<span><?php echo $value->name ?></span>
						<strong><?php  echo number_format($value->price, 0, '.', ','); ?>đ</strong>
						<span>Màn hình: <?php echo $value->display ?></span>
						<span>HĐH: <?php echo $value->system ?></span>
						<span>CPU: <?php echo $value->cpu ?></span>
						<span>RAM: <?php echo $value->ram ?>, ROM: <?php echo $value->disk ?></span>
						<span>Camera: <?php echo $value->behind_camera ?>, Selfie: <?php echo $value->front_camera ?></span>
						<span>PIN: <?php echo $value->battery ?>, SIM: <?php echo $value->sim ?> SIM</span>
					</figure>
				</a>
			</li>
			<?php $i++ ?>
			<?php endforeach ?>
		</ul>
	</div>
	<div class="clear"></div>
</div>