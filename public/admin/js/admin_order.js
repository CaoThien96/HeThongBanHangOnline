$(document).ready(function(){
	$(".list_item_transaction tr").each(function(){
		var stt=$(this).attr("stt");
		
		$(this).children().children("img").click(function(){
			var idOrder=$(this).attr("idOrder");
			if(confirm("are you sure")){
				$.ajax({
					url: "http://localhost/HeThongBanHangOnline/index.php/admin/order/ajax_delete", 
					type: "post",
					data: {
						idOrder:idOrder
					},
					success: function(result){
						$(".list_item_transaction tr").eq(stt).hide();
					}
				});
			}
		})
		
	});
	var height_messager=$(".view_transaction").height();
	$(".list_item_order tr").each(function(){
		var stt=$(this).attr("stt");
		$(this).children().children("img").click(function(){
			var idOrder=$(this).attr("idOrder");
			// alert(idOrder);
			$.ajax({
				url: "http://localhost/HeThongBanHangOnline/index.php/admin/order/show_detail_transaction", 
				type: "post",
				
				data: {
					idOrder:idOrder
				},
				success: function(result){

					result=$.parseJSON(result);
					console.log(result);
					var order=result.order;
					var user=result.user;
					var product=result.product;
					var status=order.status;
					if(status=='0'){
						var x='Đang xử lí';
					}else if(status=='1'){
						var x='Giao hàng thành công';
					}
					$(".view_transaction .user_name").text(order.full_name);
					$(".view_transaction .address").text(order.full_address);
					$(".view_transaction .phone").text(order.phone);
					$(".view_transaction .date").text(order.created);
					$(".view_transaction .full_price").text(order.total_price);
					$(".view_transaction .status").text(x);
					
					var div = $(".view_transaction");
					div.show();
					$(".view_transaction_background").show();
    				div.animate({height: height_messager, opacity: '0.9'}, "slow");
				}
			});
		})
		
	});
	var height=$("body").height();
	$(".view_transaction_background").height(height);
	$("#back_ground").click(function(){
		$(".view_transaction").animate({height: '0px', opacity: '0'}, "slow");
		$("#back_ground").hide();
	})
	$(".view_transaction").click(function(){
		$(".view_transaction").animate({height: '0px', opacity: '0'}, "slow");
		$("#back_ground").hide();
	})
	

})