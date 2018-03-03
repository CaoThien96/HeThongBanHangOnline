<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/head') ?>
</head>
<body class="nobg loginPage" style="min-height:100%;">

	<!-- Main content wrapper -->
	<div class="loginWrapper" ">
	
	    <div class="widget" id="admin_login" style="height:auto; margin:auto;">
	        <div class="title"><img src="<?php echo public_url('admin/'); ?>images/icons/dark/laptop.png" alt="" class="titleIcon" />
	        	<h6>Đăng kí</h6>
	        </div>
	        
	        <form class="form" id="form" action="" method="post">
	           <fieldset>
	                <div class="formRow">
	                    <label for="param_username">Tên đăng nhập:</label>
	                    <div class="loginInput"><input type="text" name="username" id="param_username" value="<?php echo set_value('username'); ?>" /></div>
	                    <div name="image_error" class="clear error"><?php echo form_error('username') ?></div>
	                    <div class="clear"></div>
	                </div>
	                
	                <div class="formRow">
	                    <label for="param_password">Mật khẩu:</label>
	                    <div class="loginInput"><input type="password" name="password" id="param_password" /></div>
	                    <div name="image_error" class="clear error"><?php echo form_error('password') ?></div>
	                    <div class="clear"></div>
	                </div>
	                <div class="formRow">
	                    <label for="param_password">Nhập lại:</label>
	                    <div class="loginInput"><input type="password" name="re_password" id="re_param_password" /></div>
	                    <div name="image_error" class="clear error"><?php echo form_error('re_password') ?></div>
	                    <div class="clear"></div>
	                </div>
	                <div class="formRow">
	                    <label for="param_password">Email:</label>
	                    <div class="loginInput"><input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>"/></div>
	                    <div name="image_error" class="clear error"><?php echo form_error('email') ?></div>
	                    <div class="clear"></div>
	                </div>
					<div class="formRow">
	                    <label for="param_password">Họ tên:</label>
	                    <div class="loginInput"><input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>"/></div>
	                    <div name="image_error" class="clear error"><?php echo form_error('name') ?></div>
	                    <div class="clear"></div>
	                </div>
	                <div class="formRow">
	                    <label for="param_password">Số điện thoại:</label>
	                    <div class="loginInput"><input type="text" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" /></div>
	                    <div name="image_error" class="clear error"><?php echo form_error('phone') ?></div>
	                    <div class="clear"></div>
	                </div>
	                <div class="formRow">
	                    <label for="param_password">Địa chỉ:</label>
	                    <div class="loginInput"><input type="text" name="address" id="address" value="<?php echo set_value('address'); ?>"/></div>
	                    <div name="image_error" class="clear error"><?php echo form_error('address') ?></div>
	                    <div class="clear"></div>
	                </div>
	                <div class="loginControl">
	                    <input type='hidden' name="submit" value='1'/>
	                    <input type="submit"  value="Đăng nhập" class="dredB logMeIn" />
	                    <div class="clear"></div>
	                </div>
	            </fieldset>
	        </form>
	    </div>
	    <div id="footer">
	    	<div >Bản quyền © 2017 Anh-Thien</div>
	    </div>
	</div>    
	
</body>
</html>