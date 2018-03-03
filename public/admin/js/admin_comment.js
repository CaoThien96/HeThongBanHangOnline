$(document).ready(function(){
	$(".list_item_comment tr").each(function(){
		var idComment=$(this).attr("idComment");
		var stt=$(this).attr("stt");
		console.log(stt);
		$(this).children().children("img").click(function(){
			if(confirm("Bạn có chắc muôn xóa không?")){
				$.ajax({
					url: "http://localhost/HeThongBanHangOnline/index.php/admin/comment/ajax_delete", 
					type: "post",
					data: {
						idComment:idComment,
					},
					success: function(result){
						alert(result);
						$(".list_item_comment tr").eq(stt).hide();
					}
				});
			}
		})
		
	})

})