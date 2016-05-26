<?php session_start();?>
<html><head></head>
<script type="text/javascript">
function back(){
	window.location.href="content.php";
}

</script>
<link rel="stylesheet" type="text/css" href="css/postmessage.css"/>
<body>
<center>
<div class="main">
<div class="top"></div>
<div class="buttom">
<form action="postmessage.php?kk=若不想继续发帖就返回!" method="post">
<p>楼主姓名：<input type="text" name="username" value="<?php echo $_SESSION['username'];?>"></p>
<p>楼主账号：<input type="text" name="useraccount" value="<?php echo $_SESSION['useraccount'];?>"></p>
<p>发帖信息：<textarea rows="10" cols="40" style="resize:none;" name="message"></textarea>
<p>发帖时间：<input type="text" name="mes_time" value="<?php echo date("Y-m-d H:i:s"); ?>"></p>
<p><input class="button" type="submit" value="发送"/><input class="button" type="button" value="返回" onClick="back()"></p>
<?php echo @$_GET['kk'];?>
</form>
</div>
</div>
</center>
</body>
</html>

<?php 
require_once 'conn.php';
$message=@$_POST['message'];
$mes_time=date("Y-m-d H:i:s");
$sql="INSERT INTO message(museraccount,musername,message,mes_time) VALUES('$_SESSION[useraccount]','$_SESSION[username]','$message','$mes_time')";
$result=mysqli_query($conn, $sql);
if (!$result){
    echo mysqli_error($conn);
}





?>
