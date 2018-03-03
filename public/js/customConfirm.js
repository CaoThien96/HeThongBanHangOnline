function gotoMyChange(){
	var idProduct=$("#del_product").attr("idProduct");
	window.location=base_url+'index.php/home/del_cart/'+idProduct;
}
var CustomConfirm=new function(){
	this.show=function(messager,callback){
		var dlg_messager=document.getElementById("dlg_messager");
		var dlg=document.getElementById("dialog");
		dlg.style.display="block";
		dlg_messager.textContent=messager;
		this.callback=callback;
	}
	this.ok=function(){
		this.callback();
		this.close();
	}
	this.close=function(){
		var dlg=document.getElementById("dialog");
		dlg.style.display="none";
	}
}
