<div class="profile">
	<p class="profile_title">Thông tin cá nhân</p>
	<form action="" method="Post">
		<ul>
			<li class="profile_infor">	
				<label>Nhập pass hiện tại</label>
				<input type="password" name="old_pass" value="">
				<p><?php echo form_error('old_pass') ?></p>
			</li>
			<li class="profile_infor">
				<label>Nhập pass mới</label>
				<input type="password" name="new_pass" value="">
			</li>
			<li class="profile_infor">
				<label>Nhập lại pass mới</label>
				<input type="password" name="rep_new_pass" value="">
				<p><?php echo form_error('rep_new_pass') ?></p>
			</li>
			
			<li class="profile_infor">	
				<input type="submit" name="btnSave" value="Lưu" style="border: none;background-color: white ;font-size: 20px">
				<a  href="<?php echo home_url('profile') ?>" style="border: none;background-color: white;font-size: 20px ">Quay lại</a>
			</li>
		</ul>
	</form>
</div>