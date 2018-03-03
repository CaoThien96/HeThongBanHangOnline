
<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Sản phẩm</h5>
			<span>Thêm mới thành viên</span>
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


<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper">
<!-- Form -->
<form class=" form " id="form" action="" method="post" enctype="multipart/form-data">
<fieldset>
	<div class="widget">
		<div class="title">
			<img src="<?php echo public_url('admin/') ?>images/icons/dark/add.png" class="titleIcon" />
			<h6>Tạo tài khoản</h6>
		</div>
		<div class="tab_container">
	<div id='tab1' class=" tab_content pd0 ">
		<!-- Start name -->
					<div class="formRow">
						<label class="formLeft" for="param_name">Loại tài khoản:<span class="req">*</span></label>
						<div class="formRight">
							<select>
								<option>----Chọn chức vụ----</option>
								<option>Quản trị hệ thống</option>
								<option>Quản lí bán hàng</option>
							</select>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('Username') ?></div>
						</div>
						<div class="clear"></div>
					</div>
		<!-- End name -->
		<!-- Start name -->
					<div class="formRow">
						<label class="formLeft" for="param_name">UserName:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneFour"><input name="Username" id="param_user_name" _autocheck="true" type="text" value="<?php echo set_value('Username')?>" /></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('Username') ?></div>
						</div>
						<div class="clear"></div>
					</div>
		<!-- End name -->
		<!-- Start password -->
					<div class="formRow">
						<label class="formLeft" for="param_name">PassWord:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneFour"><input name="Pass" id="param_pass" _autocheck="true" type="password" value="" /></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"></div>
						</div>
						<div class="clear"></div>
					</div>
		<!-- End password -->
		<!-- Start password -->
					<div class="formRow">
						<label class="formLeft" for="param_name">Nhập lại password:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneFour"><input name="RePass" id="param_pass" _autocheck="true" type="password" value="" /></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"></div>
						</div>
						<div class="clear"></div>
					</div>
		<!-- End password -->
		<!-- Start name -->
					<div class="formRow">
						<label class="formLeft" for="param_name">Name:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneFour"><input name="Name" id="param_name" _autocheck="true" type="text" value="" /></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"></div>
						</div>
						<div class="clear"></div>
					</div>
		<!-- End name -->
		<!-- Start phone -->
					<div class="formRow">
						<label class="formLeft" for="param_name">Phone:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneFour"><input name="Phone" id="param_phone" _autocheck="true" type="text" value="" /></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"></div>
						</div>
						<div class="clear"></div>
					</div>
		<!-- End phone -->
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