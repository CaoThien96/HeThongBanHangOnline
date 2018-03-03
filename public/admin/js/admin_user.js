$(document).ready(function(){
	$(".list_item_user tr").each(function(){
		var stt=$(this).attr("stt");
		$(this).children().children("img").click(function(){
			var idUser=$(this).attr("idUser");
			if(confirm("Bạn có chắc muôn xóa không?")){
				$.ajax({
					url: "http://localhost/HeThongBanHangOnline/index.php/admin/user/ajax_delete", 
					type: "post",
					data: {
						idUser:idUser
					},
					success: function(result){
						console.log(result);
						$(".list_item_user tr").eq(stt).hide();
					}
				});
			}
		})
		
	});
	$(".list_item_admin tr").each(function(){
		var stt=$(this).attr("stt");
		$(this).children().children("img").click(function(){
			var idAdmin=$(this).attr("idAdmin");
			if(confirm("Bạn có chắc muôn xóa không?")){
				$.ajax({
					url: "http://localhost/HeThongBanHangOnline/index.php/admin/user/ajax_delete", 
					type: "post",
					data: {
						idAdmin:idAdmin
					},
					success: function(result){
						console.log(result);
						console.log('xóa '+stt);
						$(".list_item_admin tr").eq(stt).hide();
					}
				});
			}
		})
		
	})

})