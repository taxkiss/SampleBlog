<?php
require_once 'conn.php';
session_start();
$useraccount=$_SESSION['useraccount'];
$username=$_SESSION['username'];
$hobby=$_SESSION['hobby'];
//计算发帖数目
$sql1="select count(*) from message where museraccount=".$useraccount;
$result1=mysqli_query($conn, $sql1);
$message_unm=mysqli_fetch_row($result1);

//计算回复数量
$sql2="select count(*) from reply where ruseraccount=".$useraccount;
$result2=mysqli_query($conn, $sql2);
$reply_unm=mysqli_fetch_row($result2);
//得出用户的兴趣爱好
$sql3="select hobby from hobby where hid=".$_SESSION['hobby'];
$result3=mysqli_query($conn, $sql3);
$hobby=mysqli_fetch_row($result3);
?>

<html>
<head><title></title>
<script type="text/javascript">
function back(){
	window.location.href="javascript:history.go(-1);";
}

</script>
</head>
<body>
<h1>个人中心</h1>
<p>昵　　称：<?php echo $username;?></p>
<p>账　　号：<?php echo $useraccount;?></p>
<p>兴趣小组：<?php echo $hobby[0];?></p>
<p>发帖数量：<?php echo $message_unm[0];?></p>
<p>回复数量：<?php echo $reply_unm[0];?></p>
<input type="button" value="返回主页面" onClick="back()"/>
</body>
</html>

