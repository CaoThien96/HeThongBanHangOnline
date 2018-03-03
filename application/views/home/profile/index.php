<div class="profile">
	<p class="profile_title">Thông tin cá nhân</p>
	<ul>
		<li class="profile_infor">	
			<label>Tên</label>
			<p><?php echo $user->name ?></p>
		</li>
		<li class="profile_infor">
			<label>Email</label>
			<p><?php echo $user->email ?></p>
		</li>
		<li class="profile_infor">
			<label>Số điện thoại</label>
			<p><?php echo $user->phone ?></p>
		</li>
		<li class="profile_infor">	
			<label>Địa chỉ mặc định</label>
			<p><?php echo $user->address ?></p>
		</li>
		<li class="profile_infor">	
			<a href="<?php echo home_url('profile/edit'); ?>"><span>Đổi thông tin</span></a>
			<a href="<?php echo home_url('profile/edit_pass'); ?>"><span>Đổi mật khẩu</span></a>
		</li>

	</ul>
</div>