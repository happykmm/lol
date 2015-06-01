var g_appID       = "0101167470";
var g_openID      = "";
var g_accessToken = "";
var g_nickname    = "";
var g_gender      = "";
var g_figureurl   = "";
var g_isRegisted  = false;
var checkLogin;
var getUserKey;
var _getUserInfo;
var getUserInfo;
var showUserInfo;
var _checkRegist;
var checkRegist;
var _setRegist;
var setRegist;
var _getPost;
var getPost;

function QC_checkLogin() {
	var deferred = $.Deferred();
	if (QC.Login.check()) {
		g_isRegisted = true;
		deferred.resolve("用户已登录");
	} else {
	    //调用QC.Login方法，指定btnId参数将按钮绑定在容器节点中
		QC.Login({
		   //btnId：插入按钮的节点id，必选
		   btnId:"qqLoginBtn",    
		   //用户需要确认的scope授权项，可选，默认all
		   scope:"all",
		   //按钮尺寸，可用值[A_XL| A_L| A_M| A_S|  B_M| B_S| C_S]，可选，默认B_S
		   size: "A_L"
		}, function(reqData, opts){
			g_nickname  = reqData.nickname;
			g_gender    = reqData.gender;
			g_figureurl = reqData.figureurl_2;
			deferred.resolve("登录成功");
		});
	}
	return deferred;
}

function QC_getUserKey() {
	var deferred = $.Deferred();
	QC.Login.getMe(function(openID, accessToken){
		g_openID = openID;
		g_accessToken = accessToken;
		deferred.resolve(openID);
	});
	return deferred;
}

function QC_getUserInfo() {
	var deferred = $.Deferred();
	if ((g_nickname!="")&&(g_gender!="")&&(g_figureurl!=""))
		deferred.resolve("获取用户信息成功");
	else {
		var paras = new Array();
	    paras['oauth_consumer_key'] = g_appID;
	    paras['access_token']       = g_accessToken;
	    paras['openid']             = g_openID;
		QC.api("get_user_info", paras)
		.success(function(s){
			g_nickname  = s.data.nickname;
			g_gender    = s.data.gender;
			g_figureurl = s.data.figureurl_2; 
			deferred.resolve("获取用户信息成功");
		})
		.error(function(f){
			deferred.reject("获取用户信息失败"+f);
		});
	}
	return deferred;
}

function QC_checkRegist() {
	var deferred = $.Deferred(); 
	if (g_isRegisted == true)
		deferred.reject("用户已注册");
	else {
		$.post($("#base_url").val()+"index.php/front/get_regist",
		{
			openid : g_openID
		},
		function (data, status) {
			if (data == 0) {
				deferred.resolve("用户未注册: "+data);
			} else{
				g_isRegisted = true;
				deferred.reject("用户已经注册: "+data);
			}
		});
	}
	return deferred;
}

function QC_getPost() {
	var deferred = $.Deferred();
	$.post($("#base_url").val()+"index.php/front/get_post",
	{
		openid : g_openID
	},
	function (data, status) {
		console.log("getPost结果："+data);
		data = eval('(' + data + ')');
		$("#user_penname").val(data.user_penname);
		$("#user_realname").val(data.user_realname);
		$("#user_phone").val(data.user_phone);
		$("#user_email").val(data.user_email);
		$("#txtTitle").val(data.post_title);
		CKEDITOR.instances.editor1.setData(data.post_content);
        deferred.resolve();
	});
	return deferred;
}

function QC_setMoreInfo() {
	var deferred = $.Deferred();
	$.post($("#base_url").val()+"index.php/front/set_moreinfo",
	{
		user_openid   : g_openID,
		user_penname  : $("#user_penname").val(),
		user_realname : $("#user_realname").val(),
		user_phone    : $("#user_phone").val(),
		user_email    : $("#user_email").val()
	},
	function (data, status) {
		deferred.resolve(data);
	});
	return deferred;
}

function QC_setPost() {
	var deferred = $.Deferred();
	$.post($("#base_url").val()+"index.php/front/set_post",
	{
		post_author   : g_openID,
		post_title    : $("#txtTitle").val(),
		post_content  : CKEDITOR.instances.editor1.getData(),
		post_category : 0,
		post_status   : 1,
		post_parent   : 0
	},
	function (data, status) {
		deferred.resolve(data);
	});
	return deferred;
}

function QC_setRegist() {
	var deferred = $.Deferred();
	$.post($("#base_url").val()+"index.php/front/set_regist", {
		user_nickname    : g_nickname,
		user_gender      : g_gender,
		user_figureurl   : g_figureurl,
		user_openid      : g_openID,
		user_accesstoken : g_accessToken
	},
	function (data, status) {
		deferred.resolve(data);
	});
	return deferred;
}




$(document).ready(function(){

checkLogin = QC_checkLogin();
getUserKey = checkLogin.then(function(result){
	console.log(result);
	return QC_getUserKey();
});
getUserKey.then(function(result){
	console.log(result);
	_getUserInfo.resolve();
	_checkRegist.resolve();
	_getPost.resolve();
});

_getUserInfo = $.Deferred();
getUserInfo = _getUserInfo.then(function(result){
	return QC_getUserInfo();
});
showUserInfo = getUserInfo.then(function(result){
	$("#qqLoginBtn").css("display","none");
    $("#QCwrap").css("display","block");
    $("#QCfigure").attr("src", g_figureurl);
    $("#QCnickname").text(g_nickname);
}, function(error){
	console.log(error);
});

_checkRegist = $.Deferred();
checkRegist = _checkRegist.then(function(result){
    return QC_checkRegist();
});

_setRegist = $.when(getUserInfo, checkRegist);
setRegist = _setRegist.then(function(result1, result2){
	console.log(result1);
	console.log(result2);
	return QC_setRegist();
}, function(error1, error2) {
	console.log(error1);
	console.log(error2);
});
setRegist.done(function(result){
	console.log("注册结果："+result);
});

_getPost = $.Deferred();
getPost = _getPost.then(function(result){
    return QC_getPost();
});


$("#QClogout").click(function() {
	QC.Login.signOut();
    $("#QCwrap").css("display","none");
    $("#qqLoginBtn").css("display","block");
    location.reload(true);
});


$("#btnPublish").click(function(){
	if (!QC.Login.check()) {
	    alert("请先登陆！");
	    return;
	} else {
		_setMoreInfo.resolve();
		_setPost.resolve();
	}
});


var _setMoreInfo = new $.Deferred();
var setMoreInfo = _setMoreInfo.then(function(result) {
    return QC_setMoreInfo();
});

var _setPost = $.Deferred();
var setPost = _setPost.then(function(result){
	return QC_setPost();
});

var _showModel = $.when(setMoreInfo, setPost);
var showModel = _showModel.then(function(result){
	$('#myModal').modal('show');
});

$("#btnToAdmin").click(function(){
	location.reload(true);
});

$('#myModal').on('hide.bs.modal', function () {
	location.reload(true);
});

});


