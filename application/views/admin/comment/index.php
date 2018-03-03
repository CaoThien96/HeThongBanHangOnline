<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Phản hồi</h5>
			<span>Quản lý phản hồi</span>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper">

	<!-- Static table -->
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách Phản hồi</h6>
			<div class="num f12"><b>0</b> Phản hồi</div>
		</div>
		
		
            
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
			<thead>
				<tr>
				     <td style="width:21px;"><img src="<?php echo public_url('admin/') ?>images/icons/tableArrows.png" /></td>
					<td style="width:240px;">Tên</td>
					<td style="width:240px;">Sản phẩm</td>
					<td>Nội dung</td>
					<td style="width:90px;">Ngày tạo</td>
					<td style="width:80px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="admin/comment/del_all.html">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
							
					     <div class='pagination'>
			               			            </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item_comment">
				<?php $stt=0; ?>
				<?php foreach ($comment as $key => $value): ?>
				<tr class='row_3' idComment="<?php echo $value->idComment ?>" stt='<?php echo $stt++ ?>'>
			        <td><input type="checkbox" name="id[]" value="3" /></td>
			        <td>
			        	<a class="wUserPic" title="" href="#"><img src='<?php echo public_url('admin/') ?>images/user.png' width='60px' align='left'/></a>
			        	<ul class="leftList">
			        		<li><a href='mailto:hoang@gmail.com'><strong><?php echo $value->email ?></strong></a></li>
<!-- 			        		<li><?php echo $value->name ?></li>
 -->			        	</ul>
			        </td>
					<td>
						<div class="image_thumb">
							<img src="<?php echo public_url('upload/product/').$value->image_link ?>" height="50">
							<div class="clear"></div>
						</div>
						
						<a href="product/view/7.html" class="tipS" title="" target="_blank">
						<b><?php echo $value->name ?></b>
						</a>	
					</td>
					<td>
					   <a href="" target="_blank">
					      <strong> </strong>
					   </a>
					   <br>
					   <?php echo $value->content ?><span style='color:#006400'></span>
					</td>
					<td class="textC"><?php echo $value->time ?></td>
					<td class="option">
						<a href="<?php echo home_url('home/product/').$value->id ?>" title="Xem" target="_blank">
							<img src="<?php echo public_url('admin/') ?>images/icons/color/view.png" />
						</a>
						
						<img src="<?php echo public_url('admin/') ?>images/icons/color/delete.png" />
						
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<div class="clear mt30"></div>