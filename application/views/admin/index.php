<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Bảng điều khiển</h5>
			<span>Trang quản lý hệ thống</span>
		</div>
		
		<div class="clear"></div>
	</div>
</div>

<div class="line"></div>


<!-- Message -->


<!-- Main content wrapper -->
<div class="wrapper">
	<div class="widgets">
		<div class="oneTwo">
			<div class="widget">
				<div class="title">
					<img src="<?php echo public_url('admin/') ?>images/icons/dark/users.png" class="titleIcon" />
					<h6>Thống kê dữ liệu</h6>
				</div>
				
				<table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
					<tbody>
						<tr>
							<td>
								<div class="left">Tổng số gia dịch</div>
								
							</td>
							<td class="textC webStatsLink">
								<?php echo $count_order ?>
							</td>
						</tr>
						<tr>
							<td>
								<div class="left">Tổng doanh số bán hàng </div>
							</td>
							<td class="textC webStatsLink">
								32,450,000
							</td>
						</tr>
						<tr>
							<td>
								<div class="left">Tổng số sản phẩm</div>
							</td>
							<td class="textC webStatsLink">
								<?php echo $count_product ?>
							</td>
						</tr>
						
						<tr>
							<td>
								<div class="left">Tổng số thành viên</div>
							</td>
							<td class="textC webStatsLink">
								<?php echo $count_user ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="clear"></div>
		<div class="widget">
			<div class="title">
				<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
				<h6>Danh sách Giao dịch</h6>
			</div>
			
			<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">	
				<thead>
					<tr>
						<td style="width:10px;"><img src="<?php echo public_url('admin/') ?>images/icons/tableArrows.png" /></td>
						<td style="width:60px;">Mã số</td>
						<td style="width:100px;">Thành viên</td>
						<td style="width:100px;">Số tiền</td>
						<td style="width:100px;">Trạng thái</td>
						<td style="width:75px;">Ngày tạo</td>
						
					</tr>
				</thead>
	 			<tfoot class="auto_check_pages">
					<tr>
						<td colspan="8">
							 <div class="list_action itemActions">
									<a href="#submit" id="submit" class="button blueB" url="admin/tran/del_all.html">
										<span style='color:white;'>Xóa hết</span>
									</a>
							 </div>
						</td>
					</tr>
				</tfoot>
				<tbody class="list_item_order">
				<?php $stt=0; ?>
				<?php foreach ($list_order as $key => $value): ?>				
					<tr stt='<?php echo $stt++ ?>' idOrder='<?php echo $value->id ?>'>
						<td><input type="checkbox" name="id[]" value="21" /></td>
						<td class="textC"><?php echo $value->id ?></td>
						<td>
							<?php echo $value->full_name ?>
						</td>
						<td class="textR red"><?php  echo number_format($value->total_price, 0, '.', ','); ?>đ</td>
						
						<td class="status textC">
							<span class="pending">
								<?php if($value->status=='1'){
										echo "Thành công";
									}else{
										echo 'Đang xử lí';
									} ?>
							</span>
						</td>
						<td class="textC"><?php echo $value->created ?></td>
						
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>	
	</div>
</div>
<div class="clear mt30"></div>