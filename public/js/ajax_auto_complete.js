$(document).ready(function(){
	// $("#text_search").keyup(function(){
	// 	var query=$(this).val();
	// 	if(query!=''){
	// 		$.ajax({
	// 			url:,
	// 			method:"POST",
	// 			data:{query:query},
	// 			success:function(){

	// 			}
	// 		})
	// 	}
	// })
	$("#text_search").autocomplete({
		source: 'http://localhost/HeThongBanHangOnline/index.php/auto_complete/ajax_auto_complete',
		minLength: 2
	});
});