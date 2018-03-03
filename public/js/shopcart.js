function myFunction() {
    	return confirm("Are you delete product");
};

$(document).ready(function(){
	var check_input=1;
	$(".shopcart input:checkbox").click(function(){
		if($(this).is(":checked")){
			$(this).attr('checked','checked');
		}else{
			$(this).removeAttr('checked');
		}
	});
	$(".shopcart_btn input").click(function(){
		$(".shopcart_content input:checkbox").not(this).prop('checked', this.checked);
	});
	$(".shopcart input:checkbox").change(function(){
		var price=0;
		$(".shopcart_content input:checkbox").each(function(){
			if($(this).is(":checked")){
				var id=$(this).parent().parent().attr('id');
				var gia=$('#'+id).children().children('.price').attr('price');
				var so_luong=$('#'+id).children().children('.quanty').attr('value');
				gia=gia.replace(/,/g, "");
				gia=parseInt(gia);
				so_luong=parseInt(so_luong);
				price+=gia*so_luong;
			}
		})
		price=format(price);
		$(".total_price").text(price);
	})
	/*Khi user click vào mua hàng thì lấy ra các sản phẩm mà được checkbox gồm id và số lượng.
	Lưu vào mảng rồi dùng ajax để gửi nó lên server tạo session order*/
	$(".button_buy").click(function(){
		var info =new Array();/*Mảng chứa idProduct và số lượng*/
		$("input[value]").each(function(){
			if($(this).is(":checked")){
						idProduct=$(this).attr("value");
						var id=$(this).parent().parent().attr('id');
						var quanty=$('#'+id).children().children('.quanty').attr('value');
						info.push({
							'idProduct':idProduct,
							'quanty':quanty
						});
				}
		});
		if(info.length){
			$.ajax({
				url: 'http://localhost/HeThongBanHangOnline/index.php/order/result',
				type: 'post',
				data: {
					arr: info
				},
				datatype: 'json',
				success: function (data) {
					console.log(data);
					window.location='http://localhost/HeThongBanHangOnline/index.php/order';
				}
			});
			
		}else{
			alert('Bạn chưa chọn sản phẩm');
		}
	});
/*Set sự kiện khi user click tăng số lượng sản phẩm*/
$(".btnPlus").click(function(){
		var id=$(this).parent().parent().attr('id');
		var quanty=$('#'+id).children().children('.quanty').attr('value');
		var price=$('#'+id).children().children(".price").text();
			price=price.replace(/,/g, "");
			price=parseInt(price);
		var total=$('#'+id).children().children(".total").text();
		total=total.replace(/,/g, "");
		total=parseInt(total);
		total=total+price;
		total=format(total);
		total=total.toString(total);
		$('#'+id).children().children(".total").text(total);
		quanty=parseInt(quanty);
		quanty++;
		$('#'+id).children().children('.quanty').attr('value',quanty);
	})
/*Set sự kiện khi user click giảm số lượng sản phẩm*/
	$(".btnMinus").click(function(){
		var id=$(this).parent().parent().attr('id');
		var quanty=$('#'+id).children().children('.quanty').attr('value');
		quanty=parseInt(quanty);
		quanty--;
		if(quanty>0){
			$('#'+id).children().children('.quanty').attr('value',quanty);
			var price=$('#'+id).children().children(".price").text();
			price=price.replace(/,/g, "");
			price=parseInt(price);
			var total=$('#'+id).children().children(".total").text();
			total=total.replace(/,/g, "");
			total=parseInt(total);
			total=total-price;
			total=format(total);
			total=total.toString(total);
			$('#'+id).children().children(".total").text(total);
		}
	});
	function format(x) {
    	return isNaN(x)?"":x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
	function print_r(printthis, returnoutput) {
    	var output = '';

    	if($.isArray(printthis) || typeof(printthis) == 'object') {
      	  for(var i in printthis) {
            	output += i + ' : ' + print_r(printthis[i], true) + '\n';
        	}
   		}else {
        	output += printthis;
    	}
    	if(returnoutput && returnoutput == true) {
      	  return output;
    	}else {
        	alert(output);
    	}
	}
	function isset_input_checked(){
		$(".shopcart_content input:checkbox").each(function(){
			if($(this).is(":checked")){
				return true;
			}
		})
		return false;
	}
	var height_body=$("body").height();
	$(".background_messager").height(height_body);
	$(".background_messager").click(function(){
		$(".messager").animate({height: '0px', opacity: '0'}, "slow");
		$(this).hide();
	})
});