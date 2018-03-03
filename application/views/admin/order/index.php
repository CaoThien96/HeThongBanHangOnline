<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Đơn hàng sản phẩm</h5>
			<span>Quản lý đơn hàng</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				
				<li><a href="<?php echo admin_url('home/transaction') ?>">
					<img src="<?php echo public_url('admin/') ?>images/icons/control/16/list.png" />
					<span>Danh giao dịch</span>
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
			<span class="titleIcon"><img src="<?php echo public_url('admin/') ?>images/icons/tableArrows.png" /></span>
			<h6>Danh sách Đơn hàng sản phẩm</h6>
			
			<div class="num f12">Tổng số: <b>15</b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			
			<thead>
				<tr>
					<td style="width:80px;">Đơn hàng</td>
					<td>Sản phẩm</td>
					<td style="width:80px;">Giá</td>
					<td style="width:70px;">Số lượng</td>
					<td style="width:70px;">Tổng tiền</td>
					<td style="width:170px;">Giao dịch</td>
					<td style="width:110px;">Ngày tạo</td>
					<td style="width:80px;">Hành động</td>
				</tr>
			</thead>
				<tbody class="list_item_order">
				<?php $stt=0; ?>
				<?php foreach ($data as $key => $value): ?>
					<tr class='row_20'>
					<td class="textC"><?php echo $value->idOrder; ?></td>
						<td>
							<div class="image_thumb">
								<img src="<?php echo public_url('upload/product/').$value->image_link ?>" height="50">
								<div class="clear"></div>
							</div>
							<a href="product/view/8.html" class="tipS" title="" target="_blank">
								<b><?php echo $value->name; ?></b>
							</a>	
						</td>
						<td class="textR">
							<?php echo number_format($value->price, 0, '.', ',');
							$price=(integer)$value->price; ?>đ
							
						</td>
						<td class="textC"><?php echo $value->quanty;$quanty=(integer)$value->quanty; ?></td>
						<td class="textC"><?php echo number_format($price*$quanty, 0, '.', ','); ?></td>
						
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
							<img id="show_detail_transaction" src="<?php echo public_url('admin/') ?>images/icons/color/view.png" idOrder=<?php echo $value->idOrder ?> />
						</td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
<div class="clear mt30"></div>
