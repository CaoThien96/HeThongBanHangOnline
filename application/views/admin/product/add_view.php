<script type="text/javascript">
	$(document).ready(function(){
		$("#param_cat").change(function(){

			idCatalog=$(this).val();
			switch(idCatalog){
				case '1':
				$("#grandphic,#connect").hide();
				$("#camera_front,#behind_camera,#sim,#system").show();
				
				break;
				case '2':
				$("#grandphic,#connect").show();
				$("#camera_front,#behind_camera,#sim,#system").hide();
				break;
				case '3':
				break;
			}
			$.post("<?php echo admin_url('product/ajaxSelect') ?>",{id: idCatalog},function(data){
				console.log(data);
				$('#select_suplier').html(data);
		})
		});
		
	});

	
</script>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Sản phẩm</h5>
			<span>Thêm mới sản phẩm</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="product.html">
					<img src="<?php echo public_url('admin/') ?>images/icons/control/16/list.png" />
					<span>Danh sách</span>
				</a></li>
				
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>
<div class="report" <?php if(!$this->session->flashdata('messager')) echo 'style="display: none;"' ?>>
	<img src="<?php echo public_url('admin/crown/images/icons/notifications/information.png')?>" >
	<p>Thông báo:<span><?php echo $this->session->flashdata("messager") ?></span></p>
</div>

<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper">
<!-- Form -->
<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
<fieldset>
	<div class="widget">
		<div class="title">
			<img src="<?php echo public_url('admin/') ?>images/icons/dark/add.png" class="titleIcon" />
			<h6>Thêm mới Sản phẩm</h6>
		</div>
					
		<ul class="tabs">
		    <li><a href="#tab1">Thông tin sản phẩm</a></li>
		</ul>
		<div class="tab_container">
		<div id='tab1' class="tab_content pd0">
					<div class="formRow">
						<label class="formLeft" for="param_name">Tên sản phẩm:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" value="<?php echo set_value('name')?>" /></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('name') ?></div>
						</div>
					<div class="clear"></div>
					</div>
<!-- Start thể loại -->
<div class="formRow">
	<label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
	<div class="formRight">
		<select name="catalog" _autocheck="true" id='param_cat' class="left">
			<option value="">Loại sản phẩm</option>
						      <!-- kiem tra danh muc co danh muc con hay khong -->
			<?php foreach ($catalog as $catalog): ?>
				<option value="<?php echo $catalog->id ?>" ><?php echo $catalog->name ?></option>
			<?php endforeach ?>
		</select>
		<span name="cat_autocheck" class="autocheck"></span>
		<div name="cat_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end thể loại -->
<!-- start nhà sản xuất -->
<div class="formRow">
	<label class="formLeft" for="param_cat">Nhà sản xuất:<span class="req">*</span></label>
	<div class="formRight">
		<select name="suplier" _autocheck="true" id='select_suplier' class="left">
			<option value="">Lựa chọn danh mục</option>
			<!-- kiem tra danh muc co danh muc con hay khong -->
			<?php foreach ($suplier as $suplier): ?>
				<option value="<?php echo $suplier->id ?>" idCatalog="<?php echo $suplier->idCatalog ?>"><?php echo $suplier->name ?>
				</option>
			<?php endforeach ?>
		</select>
		<span name="cat_autocheck" class="autocheck"></span>
		<div name="cat_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end nhà sản xuất -->
<!-- start imageLink -->
<div class="formRow">
	<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
	<div class="formRight">
		<div class="left"><input type="file"  id="image" name="image"  ></div>
		<div name="image_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end imageLink -->
<!-- start imageList -->
<div class="formRow" id="image_list1">
	<label class="formLeft" >Ảnh kèm theo:</label>
		<div class="formRight">
			<div class="left"><input type="file"  id="image_list" name="image_list[]" multiple></div>
			<div name="image_list_error" class="clear error"></div>
		</div>
	<div class="clear"></div>
</div>
<!-- end imageList -->
<!-- Price -->
<div class="formRow">
	<label class="formLeft" for="param_price">
		Giá :
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="price"  style='width:100px' id="param_price" class="format_number" _autocheck="true" type="text" value="<?php echo set_value('price')?>" />
			<img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px'  src='<?php echo public_url('admin/') ?>crown/images/icons/notifications/information.png'/>
		</span>
		<span name="price_autocheck" class="autocheck"></span>
		<div name="price_error" class="clear error"><?php echo form_error('price') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- Price -->
<div class="formRow">
	<label class="formLeft" for="param_discount">
		Giảm giá (VNĐ) 
		<span></span>:
	</label>
	<div class="formRight">
		<span>
			<input name="discount"  style='width:100px' id="param_discount" class="format_number"  type="text" <?php echo set_value('discount')?>/>
			<img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px'  src='<?php echo public_url('admin/') ?>crown/images/icons/notifications/information.png'/>
		</span>
		
		
	</div>
	<div class="clear"></div>
</div>


<!-- start system -->
<div class="formRow" id="system">
	<label class="formLeft" for="param_warranty">
		System
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour"><input name="system" id="param_warranty"  type="text" value="<?php echo set_value('system')?>" /></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('system') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end system -->
<!-- start graphics -->
<div class="formRow" id="grandphic">
	<label class="formLeft" for="param_warranty">
		Graphics
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour"><input name="graphics" id="param_warranty"  type="text" value="<?php echo set_value('system')?>" /></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('system') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end graphics-->
<!-- start camera trước -->
<div class="formRow" id="camera_front">
	<label class="formLeft" for="param_warranty">
		Camera trước
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour"><input name="front_camera"  type="text" value="<?php echo set_value('front_camera')?>" /></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('front_camera') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end camera trước -->
<!-- start camera sau -->
<div class="formRow" id="behind_camera">
	<label class="formLeft" for="param_warranty">
		Camera sau
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour"><input name="behind_camera"  type="text" value="<?php echo set_value('behind_camera')?>" /></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('behind_camera') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end camera sau -->
<!-- start CPU -->
<div class="formRow">
	<label class="formLeft" for="param_warranty">
		Bộ xử lý(Cpu)
	</label>
	<div class="formRight">
		<span class="oneFour"><input name="cpu" id="param_warranty"  type="text" value="<?php echo set_value('cpu')?>" /></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('cpu') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end CPU -->
<!-- start Ram -->
<div class="formRow">
	<label class="formLeft" for="param_warranty">
		Ram
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour">
			<select name="ram">
				<option value="Không có">Không có</option>
				<option value="1GB">1GB</option>
				<option value="2GB">2GB</option>
				<option value="3GB">3GB</option>
				<option value="4GB">4GB</option>
			</select>
		</span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('ram') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end Ram -->
<!-- start disk -->
<div class="formRow">
	<label class="formLeft" for="param_warranty">
		Disk
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour"><input name="disk" id="param_warranty"  type="text" value="<?php echo set_value('disk')?>" /></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('disk') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end disk -->
<!-- start sim -->
<div class="formRow" id="sim">
	<label class="formLeft" for="param_warranty">
		Sim
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour">
			<select name="sim">
				<option value="1">1 sim</option>
				<option value="2">2 sim</option>
			</select>
		</span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('sim') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end sim -->
<!-- Start sim -->
<div class="formRow">
	<label class="formLeft" for="param_warranty">
		Battery
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour"><input name="battery" id="param_warranty"  type="text" value="<?php echo set_value('battery')?>" /></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('battery') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- end sim -->
<!-- Start display -->
<div class="formRow">
	<label class="formLeft" for="param_warranty">
		Display
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour"><input name="display" id="param_warranty"  type="text" value="<?php echo set_value('display')?>" /></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('display') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- End display -->
<!-- Start connect -->
<div class="formRow" id="connect">
	<label class="formLeft" for="param_connect">
		Connect
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour"><input name="connect" id="param_connect"  type="text" value="<?php echo set_value('connect')?>" /></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('connect') ?></div>
	</div>
	<div class="clear"></div>
</div>
<!-- End connect -->

<div class="formRow">
	<label class="formLeft" for="param_warranty">
		Số lượng
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneFour"><input style="width: 50px;
    height: 20px;" name="total" id="param_warranty"  type="number" value=" <?php echo set_value('total')?>" /></span>
		<span name="warranty_autocheck" class="autocheck"></span>
		<div name="warranty_error" class="clear error"><?php echo form_error('total') ?></div>
	</div>
	<div class="clear"></div>
</div>
<div class="formRow hide"></div>
</div>
						 

<div id='tab3' class="tab_content pd0">
	<div class="formRow">
		<label class="formLeft">Nội dung:</label><span class="req">*</span>
		<div class="formRight">
			<textarea name="content" id="param_content" class="editor"></textarea>
			<div name="content_error" class="clear error"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow hide"></div>
</div>


</div><!-- End tab_container-->

<div class="formSubmit">
	<input type="submit" value="Thêm mới" class="redB" />
	<input type="reset" value="Hủy bỏ" class="basic" />
</div>
<div class="clear"></div>
</div>
</fieldset>
</form>
</div>
<div class="clear mt30"></div>