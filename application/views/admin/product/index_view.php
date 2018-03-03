<script type="text/javascript">
	$(document).ready(function(){
		$("#param_cat").change(function(){
			
			idCatalog=$(this).val();
			switch(idCatalog){
				case '1':
				$("#param_sup option[idCatalog!=1]").hide();
				$("#param_sup option[idCatalog=1]").show();
				break;
				case '2':
				$("#param_sup option[idCatalog!=2]").hide();
				$("#param_sup option[idCatalog=2]").show();
				break;
				case '3':
				$("#param_sup option[idCatalog!=3]").hide();
				$("#param_sup option[idCatalog=3]").show();	
				break;
				case '4':
				$("#param_sup option[idCatalog!=4]").hide();
				$("#param_sup option[idCatalog=4]").show();	
				break;
			}
		})
	})
</script>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Sản phẩm</h5>
			<span>Quản lý sản phẩm</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li>
					<a href="<?php echo admin_url('product/add') ?>">
						<img src="<?php echo public_url('admin/') ?>images/icons/control/16/add.png" />
						<span>Thêm mới</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="line">
	
</div>

<!-- Message -->

<div class="report" <?php if(!$this->session->flashdata('messager')) echo 'style="display: none;"' ?>>
	<img src="<?php echo public_url('admin/crown/images/icons/notifications/information.png')?>" >
	<p>Thông báo:<span><?php echo $this->session->flashdata("messager") ?></span></p>
</div>
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách sản phẩm</h6>
		 	<div class="num f12">Số lượng: <b><?php echo $total_row ?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter">
			<tr>
				<td colspan="6">
				<!-- Form lọc sản phẩm -->
				<form class="list_filter form" action="" method="post">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
						<tr>

							
							<td class="label" style="width:40px;">
								<label for="filter_id">Tên</label>
							</td>
							<td class="item" style="width:155px;" >
								<input name="name" value="" id="filter_iname" type="text" style="width:155px;" />
							</td>
							<td class="label" style="width:60px;">
								<label for="filter_status">Thể loại</label>
							</td>
							<td class="item">
								<select name="catalog" id="param_cat">
									<option value=" "></option>
									<?php foreach ($catalog as $catalog): ?>
									 	<option value="<?php echo $catalog->id ?>" ><?php echo $catalog->name ?></option>
									<?php endforeach ?>
								</select>
							</td>
							<!-- Nhà sản xuất -->
							<td class="label" style="width:80px;">
								<label for="filter_status">Nhà sản xuất</label>
							</td>
							<td class="item">
								<select name="suplier" id="param_sup">
									<option value=" "> </option>
									<?php foreach ($suplier as $suplier): ?>
									 	<option value="<?php echo $suplier->id ?>" idCatalog="<?php echo $suplier->idCatalog ?>" ><?php echo $suplier->name ?></option>
									<?php endforeach ?>
								</select>
							</td>
							<td style='width:150px'>
								<input type="submit" class="button blueB" value="Lọc" name="btnSearch" />
								
							</td>
						</tr>
					</tbody></table>
				</form>
				</td>
			</tr>
			</thead>
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin/') ?>images/icons/tableArrows.png" /></td>
					<td style="width:60px;">Mã số</td>
					<td>Tên</td>
					<td>Giá</td>
					<td style="width:100px;">Ngày tạo</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
					     <div class='pagination'>
					     	<?php if(isset($isPage)){
					     			if($isPage){
					     				echo $this->pagination->create_links();
					     			}
					     		}  ?>
					     </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item_product">
				<?php $stt=0; ?>
				<?php foreach ($data as $key => $value): ?>
				 <tr  stt='<?php echo $stt++ ?>' idProduct='<?php echo $value->id?>'>
					<td>
						<input type="checkbox" name="id[]" value="9" />
					</td>
					<td class="textC"><?php echo $value->id ?></td>
					<td>
					<div class="image_thumb">
						<img src="<?php echo public_url('upload/product/').$value->image_link ?>" height="50">
						<div class="clear"></div>
					</div>
					
					<a href="product/view/9.html" class="tipS" title="" target="_blank">
						<b><?php echo $value->name ?></b>
					</a>
					
					<div class="f11" >
					  Đã bán: <?php echo $value->buyed ?>| Xem: <?php echo $value->view ?>
					</div>
					</td>
					<td class="textC">
						<?php  echo number_format($value->price, 0, '.', ','); ?><span style="color: red">đ</span>
					    
                    </td>

					<td class="textC">01-01-1970</td>
					<td class="option textC">
						
						<a  href="<?php echo home_url('home/product/').$value->id ?>" target='_blank' class='tipS' title="Xem chi tiết sản phẩm">
							<img src="<?php echo public_url('admin/') ?>images/icons/color/view.png" />
						</a>
						 <a href="<?php echo admin_url('product/edit/').$value->id.'/'.$value->idCatalog ?>" title="Chỉnh sửa" class="tipS">
							<img src="<?php echo public_url('admin/') ?>images/icons/color/edit.png" />
						</a>
						
						
						<img src="<?php echo public_url('admin/') ?>images/icons/color/delete.png" idCatalog="<?php echo $value->idCatalog ?>" />
					</td>
				</tr>
				<?php endforeach ?>
				
		    </tbody>
		</table>
	</div>
	</div>
<div class="clear mt30"></div>