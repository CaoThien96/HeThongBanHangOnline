$(document).ready(function(){
	$("#btnSearch_price").click(function(){
		var start_price=$("select[name='start_price']").val();
		start_price=start_price.replace(/,/g, "");
		var end_price=$("select[name='end_price']").val();
		end_price=end_price.replace(/,/g, "");
		$.ajax({
				url: 'http://localhost/HeThongBanHangOnline/index.php/home/result_search_price',
				type: 'post',
				data: {
					start_price:start_price,
					end_price:end_price
				},
				datatype: 'json',
				success: function (result) {
					var x=jQuery.parseJSON(result);
					var html='';
					
					html+='<ul class=\"list_product\">';
					var i=1;
					for (value in x) { 
						
						if(i%5==0){
							html+='<li style=\"border-right: none\" >';
						}else{
							html+='<li>';
						}
						
						html+='<a href=\"'+base_url+'home/product/'+x[value].id+'\">';
						html+='<img src=\"'+public_url+x[value].image_link+'\" height=\"150\" width=\"150\">';
						html+='<h3>'+x[value].name+'<?php echo \'Cao van thien\' ?>'+'</h3>';
						var price=x[value].price;
						price=format(price);
						html+='<strong>'+price+'đ'+'</strong>'
						html+='<div class=\"promotion\">';
							html+='<span>'+'Trả góp 0%';
							html+='</span>';
							html+='<span>'+'Cơ hội trúng xe SH150i khi mua iphone tại Hà Nội';
							html+='</span>';
						html+='</div>';
						html+='<figure class=\"bginfor\">';
							html+='<span>'+x[value].name+'</span>';
						// <span>PIN: <?php echo $value->battery ?>, SIM: <?php echo $value->sim ?> SIM</span>
							html+='<strong>'+price+'đ'+'</strong>';
							html+='<span>'+'Màn hình: '+x[value].display+'</span>';
							html+='<span>'+'HĐH: '+x[value].system+'</span>';
							html+='<span>'+'CPU: '+x[value].cpu+'</span>';
							html+='<span>'+'RAM: '+x[value].ram+'</span>';
							html+='<span>'+'Camera: '+x[value].behind_camera+'</span>';
							html+='<span>'+'PIN: '+x[value].battery+', SIM: '+x[value].sim+'</span>';

						html+='</figure>';
						html+='</li>';
						i++;
					}
					
					
					$(".main_content").html(html);
					// console.log(html)	;					
				}
		})
	})
	function format(x) {
    	return isNaN(x)?"":x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
	

})