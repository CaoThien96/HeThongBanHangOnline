<div class="profile">
	<p class="profile_title">Thông tin cá nhân</p>
	<form action="" method="Post">
		<ul>
			<li class="profile_infor">	
				<label>Tên</label>
				<input type="text" name="name" value="<?php echo $user->name ?>">
			</li>
			<li class="profile_infor">
				<label>Email</label>
				<input type="text" name="email" value="<?php echo $user->email ?>">
			</li>
			<li class="profile_infor">
				<label>Số điện thoại</label>
				<input type="text" name="phone" value="<?php echo $user->phone ?>">
			</li>
			<li class="profile_infor">	
				<label>Địa chỉ mặc định</label>
				<input type="text" name="address" value="<?php echo $user->address ?>">
			</li>
			<li class="profile_infor">	
				
				<input type="submit" name="btnSave" value="Lưu" style="border: none;background-color: white ;font-size: 20px">
				<a  href="<?php echo home_url('profile') ?>" style="border: none;background-color: white;font-size: 20px ">Quay lại</a>
			</li>
		</ul>
	</form>
</div>