<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Thành viên</h5>
			<span>Quản lý thành viên</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="<?php echo admin_url('admin/add') ?>">
					<img src="<?php echo public_url('admin/') ?>images/icons/control/16/add.png" />
					<span>Thêm mới</span>
				</a></li>
				
				<li><a href="user.html">
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
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách Thành viên</h6>
		 	<div class="num f12">Tổng số: <b>0</b></div>
		</div>
		
		<form action="http://localhost/webphp/index.php/admin/user.html" method="get" class="form" name="filter">
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin/') ?>images/icons/tableArrows.png" /></td>
					<td style="width:80px;">Mã số</td>
					<td>Tên</td>
					<td>Email</td>
					<td>Điện thoại</td>
					<td>Địa chỉ</td>
					<td>Chức năng</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot>
				<tr>
					<td colspan="8">
					     <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="user/del_all.html">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
							
					     <div class='pagination'>
			               			            </div>
					</td>
				</tr>
			</tfoot>
 			
			<tbody class="list_item_admin">
				<!-- Filter -->
				<?php $stt=0; ?>
				<?php foreach ($admin as $key => $value): ?>
				<tr stt='<?php echo $stt++ ?>' idUser='<?php echo $value->id?>'>
					<td><input type="checkbox" name="id[]" value="19" /></td>
					<td class="textC"><?php echo $value->id ?></td>
					<td>
						<span title="Hoàng văn Tuyền" class="tipS">
							<?php echo $value->name ?>
						</span>
					</td>
					<td>
						<span title="hoangvantuyencnt@gmail.com" class="tipS">
							<?php echo $value->email ?>
						</span>
					</td>
					<td>
						<?php echo $value->phone ?>
					</td>
					<td>
						<?php echo $value->address ?>
					</td>
					<td>
						<?php 
							if($value->id_group_user==1){
								echo 'Quản trị hệ thống';
							}elseif ($value->id_group_user==2) {
								echo 'Khách Hàng';
							}elseif ($value->id_group_user==3) {
								echo 'Quản lí bán hàng';
							}
						 ?>
						
					</td>
					<td class="option">
						<img src="<?php echo public_url('admin/') ?>images/icons/color/delete.png" style='cursor: pointer;' idAdmin='<?php echo $value->id ?>' />
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		</form>
	</div>
</div>
        		<div class="clear mt30"></div>