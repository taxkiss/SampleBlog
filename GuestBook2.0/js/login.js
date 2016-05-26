function $(id){return document.getElementById(id)}

function user_input(){
	var myforms=document.forms;
	var name=myforms[0].useraccount.value;
	var pwd=myforms[0].password.value;
	if(name=="" || pwd==""){
		window.alert('管理员名称或密码不能为空!');
		return false;
		}else{
			return true;
			}	
	}

function LoadBlogParts(){
	var swfUrl = "http://chabudai.sakura.ne.jp/blogparts/honehoneclock/honehone_clock_tr.swf";
	var swfTitle = "honehoneclock";
	var sUrl = swfUrl;	
	var sHtml = "";
	sHtml += '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="160" height="70" id="' + swfTitle + '" align="middle">';
	sHtml += '<param name="allowScriptAccess" value="always" />';
	sHtml += '<param name="movie" value="' + sUrl + '" />';
	sHtml += '<param name="quality" value="high" />';
	sHtml += '<param name="bgcolor" value="#ffffff" />';
	sHtml += '<param name="wmode" value="transparent" />';
	sHtml += '<embed wmode="transparent" src="' + sUrl + '" quality="high" bgcolor="#ffffff" width="160" height="70" name="' + swfTitle + '" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
	sHtml += '</object>';
	document.write(sHtml);
}

/**********HTML初始化后为其按钮绑定函数**********/
function changeColor(x){
	  // var d = document.getElementById("div1");
	   var r = parseInt(Math.random() * 255);
	   var g = parseInt(Math.random() * 255);
	   var b = parseInt(Math.random() * 255);
	   var colorHex = r.toString(16) + g.toString(16) + b.toString(16);
	   //document.bgColor = "#"+colorHex;
	   //bgColor = "#"+colorHex;
	   //return bgColor;
	   x.style.backgroundColor="#"+colorHex;
	   //window.setTimeout("changeColor()",1000);
	   }

