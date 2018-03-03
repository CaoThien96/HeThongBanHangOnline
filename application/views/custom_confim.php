<style type="text/css">
	#dialog{width: 350px;height: 150px;
			background-color: white;margin: auto;
			position: absolute;z-index: 999;display: none;
			border:1px solid #9999FF;
			border-radius: 10px;
			-webkit-animation-name: example; /* Safari 4.0 - 8.0 */
    		-webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
    		animation-name: example;
   			 animation-duration: 0.5s;  }
   	@-webkit-keyframes example {
   		0%   {opacity:0; left:633px; top:0px;}
   		100%  {opacity:1; left:633px; top:88px;}

   	}
	#dialog_title{border-radius: 10px;
				height: 50px;
				background-color: #F7F7F7;
				line-height: 50px;
				padding-left: 10px;
				color: #656465;
			border-radius: 10px}
	#dialog_content p{color: #656465;padding-left: 10px;height: 40px;
    line-height: 40px;}
	#dialog_content div{padding-left: 10px}
	#ok{border: none;
			width: 55%;
			height: 45px;
			border-radius: 10px;
			/* padding-left: 10px; */
			background-color: #E94443;
			color: white;}
	#cancel{border: none;
				width: 40%;
				height: 45px;
				border-radius: 10px;
				color: #ffffff;
   				background-color: #73B0CF;}
	#dialog_content button{font-size: 18px;cursor: pointer;}
	#ok:hover{border: 1px solid #E94443;background-color: white;color: black}
	#cancel:hover{border: 1px solid #73B0CF;background-color: white;color: black}
</style>
<div id="dialog">
	<div id="dialog_title">
		Sasamimi cho biết:
	</div>
	<div id="dialog_content">
		<p id="dlg_messager">abc</p>
		<div>
			<button id="ok" onclick="CustomConfirm.ok()">OK</button>
			<button id="cancel" onclick="CustomConfirm.close()">Cancel</button>
		</div>
	</div>
</div>	
<script type="text/javascript">
	var height_win=window.outerHeight;
	var width=window.outerWidth;
	var left_dlg=width/2-175;
	var top_dlg=height_win/2-350;
	top_dlg=top_dlg.toString()+'px';
	left_dlg=left_dlg.toString()+'px';
	var dlg=document.getElementById("dialog");
	dlg.style.top = top_dlg;
	dlg.style.left = left_dlg;
</script>