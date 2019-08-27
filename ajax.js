$("#nextPage").click(function () {
	$.post($("#myForm").attr("action"), function(info){ $("#ajaxDiv").html(info);});
});

$("#myForm").submit(function(){
	return false;
});