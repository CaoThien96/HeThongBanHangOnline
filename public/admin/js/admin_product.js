$(document).ready(function(){
	$(".list_item_product tr").each(function(){
		var idProduct=$(this).attr("idProduct");
		var stt=$(this).attr("stt");
		console.log(stt);
		$(this).children().children("img").click(function(){
			var idCatalog=$(this).attr("idCatalog");
			if(confirm("Bạn có chắc muôn xóa không?")){
				$.ajax({
					url: "http://localhost/HeThongBanHangOnline/index.php/admin/product/ajax_del", 
					type: "post",
					data: {
						stt:idProduct,
						idCatalog:idCatalog
					},
					success: function(result){
						var x=idProduct;
						$(".list_item_product tr").eq(stt).hide();
					}
				});
			}
		})
		
	});
	$("#param_cat").change(function(){

		idCatalog=$(this).val();
		
		switch(idCatalog){
			case '1':
			$("#grandphic,#connect").hide();
			$("#camera_front,#behind_camera,#sim,#system").show();

			break;
			case '2':
			$("#grandphic,#connect").show();
			$("#camera_front,#behind_camera,#sim,#system").hide();
			break;
			case '3':
			break;
			case '4':
			$("#camera_front,#behind_camera,#sim,#system").hide();
			$("#grandphic,#connect").hide();
			break;

		}
		$.post("<?php echo admin_url('product/ajaxSelect') ?>",{id: idCatalog},function(data){
			console.log(data);
			$('#select_suplier').html(data);
		})
	});

})