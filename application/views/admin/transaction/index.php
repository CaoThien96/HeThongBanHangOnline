<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Giao dịch</h5>
			<span>Quản lý các giao dịch của hệ thống</span>
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
			<h6>Danh sách Giao dịch</h6>
			<div class="num f12">Tổng số: <b>15</b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin/') ?>images/icons/tableArrows.png" /></td>
					<td style="width:50px;">Mã số</td>
					<td style="width:90px;">Thành viên</td>
					<td style="width:255px;">Địa chỉ</td>
					<td style="width:110px;">Số điện thoại</td>
					<td style="width:90px;">Số tiền</td>
					<td>Hình thức thanh toán</td>
					<td style="width:170px;">Trạng Thái</td>
					<td style="width:90px;">Ngày tạo</td>
					<td style="width:70px;">Hành động</td>
				</tr>
			</thead>
			

			
			<tbody class="list_item_transaction">
			
				<?php $stt=0; ?>
				<?php foreach ($data as $key => $value): ?>
					<tr class='row_21' stt='<?php echo $stt++ ?>'>
						<td><input type="checkbox" name="id[]" value="21" /></td>
						<td class="textC"><?php echo  $value->id ?></td>
						<td class="textC">
							<?php echo  $value->full_name ?>
						</td>
						<td class="textC">
							<?php echo  $value->full_address ?>
						</td>
						<td class="textC">
							<?php echo  $value->phone ?>
						</td>
						<td class="red textC">
							<?php  echo number_format($value->total_price, 0, '.', ','); ?>đ
						</td>

						<td class="textC">
							<span class="pending">
								<?php 
								if($value->payments==1){
									echo "Thanh toán trực tuyến";
								}else{
									echo 'Thanh toán khi nhận hàng';
								} ?>					
							</span>
						</td>
						<td class="status textC">
							<span class="pending">
								<?php if ((int)$value->status==0): ?>
									<?php echo "Chờ xử lí"; ?>
								<?php endif ?>
								<?php if (!(int)$value->status==0): ?>
									<?php echo "Giao hàng thành công"; ?>
								<?php endif ?>
							</span>
						</td>
						<td class="textC"><?php echo $value->created ?></td>
						<td class="textC">
							<a href="<?php echo admin_url('order/xu_li/').$value->id ?>" title="Cập nhật" >
								<img src="<?php echo public_url('admin/') ?>images/icons/color/accept.png" onclick="return confirm('Bạn có chắc đơn hàng đã được giao')"/>
							</a>
							
							<img  src="<?php echo public_url('admin/') ?>images/icons/color/delete.png" idOrder=<?php echo $value->id ?>/>
							
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<div class="clear mt30"></div>