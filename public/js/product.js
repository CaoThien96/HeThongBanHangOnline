$(document).ready(function(){
	var id=0;
	$(".box_content_top li").each(function(){
		$(this).click(function(){
			var stt=$(this).attr("stt");
			$(".box_content>div").eq(id).hide();
			$(".box_content_top li").eq(id).removeClass("active");
			id=stt;
			$(".box_content>div").eq(stt).show();
			$(".box_content_top li").eq(stt).addClass("active");

		})
	})
	$("button.button_comment").click(function(){
		$.ajax({
			url: 'http://localhost/HeThongBanHangOnline/index.php/product/kt_session',
				type: 'post',
				data: {
					
				},
				datatype: 'json',
				success: function (data) {
					if(data=='1'){
						var title=$(".form_rating input[name=title_rating]").val();
						var content=$(".form_rating textarea[name=content_rating]").val();
						var href=$(location).attr('href');
						var segments = href.split( '/' );
						var idProduct = segments[7];
						$.ajax({
							url: 'http://localhost/HeThongBanHangOnline/index.php/product/ajax_coment',
							type: 'post',
							data: {
								idProduct:idProduct,
								title: title,
								content: content
							},
							datatype: 'json',
							success: function (data) {
								window.location='http://localhost/HeThongBanHangOnline/index.php/home/product/'+idProduct;
							}
						});
					}else{
						alert('Bạn phải đăng nhập mới bình luận được');
					}
				}
		})
		
	});
	$(".list_product .product_home").click(function(){

		var idProduct=$(this).attr('idProduct');
		$.ajax({
			url: 'http://localhost/HeThongBanHangOnline/index.php/product/add_view',
			type: 'post',
			data: {
				idProduct:idProduct
			},
			datatype: 'json',
			success: function (data) {
				
			}
		})

	})
})