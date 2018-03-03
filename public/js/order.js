$(document).ready(function(){
	/*Click vào nút tiếp tục hoàn thành đơn hàng*/
	$("#btnSubmitOrder").click(function(){
		
		var info =new Array();
		var name=$(".form_shiper input[name=name] ").val();
		var phone=$(".form_shiper input[name=phone] ").val();
		var address=$(".form_shiper input[name=address] ").val();
		info.push({
			'name':name,
			'phone':phone,
			'address':address
		});
		$.ajax({
				url: 'http://localhost/HeThongBanHangOnline/index.php/order/result_shipper',
				type: 'post',
				data: {
					arr: info
				},
				datatype: 'json',
				success: function (result) {
					window.location='http://localhost/HeThongBanHangOnline/index.php/order/submit_order';
				}
		})
	})
	$("#btnSubmit").click(function(){
		$.ajax({
				url: 'http://localhost/HeThongBanHangOnline/index.php/order/insert_order',
				type: 'post',
				datatype: 'json',
				success: function (result) {
					window.location='http://localhost/HeThongBanHangOnline/index.php/home/shopcart';
					console.log(result);
				}
		})
	})
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
	
})