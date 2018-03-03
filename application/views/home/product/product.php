<?php $image_list=json_decode($product->image_list);
$count=count($image_list);
?>
<div class="detail_product" style="width: 100%;">
	<ul class="breadcrumb">
		<li>Trang chủ</li>
		<li><?php echo $name_catalog->name ?></li>
		<li class="active"><?php echo $product->name ?></li>
		<div class="clear"></div>
	</ul>
	<div class="detail_container">
		<div class="detail_top">
			<h1><?php $product->name ?></h1>
		</div>
		<div class="rating">
			<span>&#9733;</span>
			<span>&#9733;</span>
			<span>&#9733;</span>
			<span>&#9733;</span>
			<span>&#9733;</span>
			<a href="">30 đánh giá</a>
		</div>
		<div class="clear"></div>
	</div>
	<div class="detail_infor_left">
		<?php if ($count>0): ?>
			<ul id="infor_left">
				<?php foreach ($image_list as $key => $value): ?>
					<li><img style="max-width: 70px" src="<?php echo public_url('upload/product/').$value ?>"></li>
				<?php endforeach ?>
			</ul>
		<?php endif ?>
		<ul id="infor_right">
			<li><img style="max-width: 500px" src="<?php echo public_url('upload/product/').$product->image_link ?>"></li>
			<li></li>
			<li></li>
		</ul>
		<div class="infor_content">
			<stdong style="float: none;" class='price'><?php  echo number_format($product->price, 0, '.', ','); ?>đ</stdong>
			<ul>
				<li><span>Trong hộp có:</span><span>Sạc, Tai nghe, Sách hướng dẫn, Jack chuyển tai nghe 3.5mm, Cáp, Cây lấy sim</span></li>
				<li><span>Bảo hành chính hãng:</span> <span>thân máy 12 tháng, sạc 12 tháng, tai nghe 12 tháng</span></li>
				<li><span>Giao hàng miễn phí toàn quốc</span></li>
				<li><span>Đổi trả hàng:</span><span>1 đổi 1 trong một tháng với sản phẩm lỗi</span></li>
				<li><span>Hàng trong kho:</span><span><?php echo ' '.$product->total.' Chiếc' ?></span></li>
			</ul>
			<div class="button">
				<a href="<?php echo base_url().'index.php/home/addcart/'.$product->id ?>">Thêm Vào Giỏ Hàng</a>
			</div>
			
		</div>
		<!-- <div class="ckeckexist">
			<p>Kiểm tra xem có hàng tại nơi bạn không? </p>
			<select name="city">
				<option>----Chọn tỉnh, thành phố</option>
			</select>
			<select name="quan">
				<option>----Chọn quận, huyện</option>
			</select>
		</div> -->
		<div class="clear"></div>
	</div>
	<div class="box_content">
		<ul class="box_content_top">
			<li class="active" stt=0>Đặc điển nổi bật</li>
			<li stt=1>Thông số kĩ thuật</li>
			<li stt=2>Bình luận</li>
			<div class="clear"></div>
		</ul>
		<div class="shopee_product_detail_description" stt=0 style="display: block;">
			<div>
				Samsung Galaxy S7 edge là sự tiếp nối của phiên bản S6 edge mà Samsung đã cho ra mắt hồi đầu năm 2015. Với sự nâng cấp mạnh mẽ về cấu hình cùng nhiều tính năng mới đi kèm, chiếc điện thoại này chắc chắn sẽ làm hài lòng những tín đồ tdung thành của thương hiệu Hàn Quốc ngay sau khi chính thức lên kệ.	
			</div>
		</div>
		<div class="shopee_product_detail_techology" stt=1>
			<ul>
				<li>Thông số cơ bản</li>
				<li><stdong>Màn hình: </stdong><span><?php echo $product->display ?></span></li>
				<li><stdong>CPU: </stdong><span><?php echo $product->cpu ?></span></li>
				<li><stdong>Hệ điều hành: </stdong><span><?php echo $product->system ?></span></li>
				<li><stdong>Ram: </stdong><span><?php echo $product->ram ?></span></li>
				<li><stdong>Bộ nhớ trong: </stdong><span><?php echo $product->disk ?></span></li>
				<li><stdong>Camera: </stdong><span>Chính: <?php echo $product->behind_camera ?>, Phụ <?php echo $product->front_camera ?></span></li>
				
			</ul>
		</div>
		<div class="shopee_product_detail_comment" stt=2>
			<div class="shopee_product_detail_comment_wrapper">
				<?php foreach ($comment as $key => $value): ?>
					
					
					<div class="shopee_product_detail_comment_stt">
						<div class="shopee_product_detail_comment_avatar">
							<img src="<?php echo public_url('upload/user/avatar.jpg'); ?>">
						</div>
						<div class="shopee_product_detail_comment_content">
							<span><?php echo $value->name ?></span><br>
							<div class="rating">
								<span>&#9733;</span>
								<span>&#9733;</span>
								<span>&#9733;</span>
								<span>&#9733;</span>
								<span>&#9733;</span>
							</div>
							<div class="clear"></div>
							<div><?php echo $value->content ?></div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<div class="form_rating" style="padding: 10px 0px;">
				<div class="form_rating_left">
					<p>Xin vui long chia sẻ đánh giá của bạn về sản phẩm này</p>
					<label>Nhận xét về sản phẩm này</label>
					<div>
						<label>Tiêu đề đánh giá(tùy chọn):</label>
						<input type="text" name="title_rating" placeholder="Nhập tiêu đề tại đây">
					</div>
					<div>
						<label>Mô tả đánh giá:</label>
						<textarea placeholder="Nhập mô tả tại đây" name="content_rating"></textarea>
					</div>
					<button class="button_comment">Gửi đánh giá</button>
				</div>
				<div class="form_rating_right">
					<div class="ratingFormAside">
						<!--- Start CMS desktop_guide_write_review-->
						<h3>Để viết 1 đánh giá chất lượng</h3>
						<h4>Bạn nên:</h4>
						<ul>
							<li>Chỉ đánh giá về sản phẩm và đặc tính của nó.</li>
							<li>Viết đánh giá dựa trên kinh nghiệm của bản thân.</li>
							<li>Cho Lazada biết "tại sao" bạn lại cảm thấy như vậy về sản phẩm.</li>
						</ul>
						<br>
						<h4>Bạn không nên:</h4>
						<ul>
							<li>Chia sẻ những thông tin không liên quan đến sản phẩm.</li>
							<li>Chia sẻ thông tin không xác thực, dễ gây hiểu lầm và mang tính chất lừa đảo.</li>
							<li>Chửi thề, đe dọa, hay sử dụng những từ ngữ không có văn hóa, phân biệt chủng tộc.</li>
							<li>Chia sẻ bất kỳ thông tin cá nhân nào.</li>
							<li>Đưa ra đường link không phải của Lazada.</li>
							<li>Sử dụng trái phép những thông tin liên quan đến bản quyền và thương hiệu.</li>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
<!-- 	<button class="button_comment">Đánh giá</button>
-->		
</div>
</div>

