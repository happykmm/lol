$(document).ready(function(){



$("#aCate1").click(function() {
	$("#btnCate").html($("#aCate1").text());
	$("#btnCate").data("category",1);
});

$("#aCate2").click(function() {
	$("#btnCate").html($("#aCate2").text());
	$("#btnCate").data("category",2);
});

$("#aCate3").click(function() {
	$("#btnCate").html($("#aCate3").text());
	$("#btnCate").data("category",3);
});

$("#btnPublish").click(function(){
	$.post($("#url_admin").val()+"/submit/insert",
	{
		post_title : $("#txtTitle").val(),
		post_content : CKEDITOR.instances.editor1.getData(),
		post_category : $("#btnCate").data("category"),
		post_status : 1,
		post_parent : 0
	},
	function (data, status) {
		$('#myModal').modal('show');
	});


});

$("#btnPreview").click(function(){
	var title = $("#txtTitle").val();
	var content = CKEDITOR.instances.editor1.getData();
	var category = $("btnCate").html();
    /*****
	    新标签打开 前台文章详情页面
	    Post title + data + cate 
	    Preview a new article!
	*****/

});

$("#btnDraft").click(function(){
	var title = $("#txtTitle").val();
	var content = CKEDITOR.instances.editor1.getData();
	var category = $("btnCate").html();
    /*****
	    Post title + data + cate 
	    Save a new article as draft!
	*****/
});

$("#btnToAdmin").click(function(){
    window.location.href = $("#url_admin").val()+"/artlist";
});


$('#myModal').on('hide.bs.modal', function () {
    window.location.href = $("#url_admin").val()+"/artlist";
});

});


