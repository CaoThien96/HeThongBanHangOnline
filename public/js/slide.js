$(document).ready(function(){
			var i=0;
			var stt=0;
			$("img[stt]").each(function(){
					if($(this).is(":visible")){
						stt=$(this).attr("stt");
					}
				});
			$(".slide .next").click(function(){
				$(".slide img").eq(stt).hide();
				$(".slide ul li").eq(stt).removeClass('active');
				if(stt<3){
					stt++;
				}else{
					stt=0;
				}
				$(".slide img").eq(stt).show();
				$(".slide ul li").eq(stt).addClass('active');
			});
			$(".slide .pre ").click(function(){
				$(".slide img").eq(stt).hide();
				$(".slide ul li").eq(stt).removeClass('active');
				if(stt>0){
					stt--;
				}else{
					stt=3;
				}
				$(".slide img").eq(stt).show();
				$(".slide ul li").eq(stt).addClass('active');
			});
			$(".slide ul li").click(function(){
				$(".slide img").eq(stt).hide();
				$(".slide ul li").eq(stt).removeClass('active');
				stt=$(this).attr("stt");
				$(".slide img").eq(stt).show();
				$(".slide ul li").eq(stt).addClass('active');

			})
			setInterval(function(){
				$(".slide .next").click();
			},5000);
			
		});