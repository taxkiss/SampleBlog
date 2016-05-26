<html>
<script type="text/javascript">
function back(){
	alert("留言失败！返回?");
	window.history.back(-1);
}

</script>
</html>


<?php
session_start();
require_once 'conn.php';
$mes_id=$_POST['mes_id'];//楼主消息id 
$reply_time=date("Y:m:d H:i:s");//回复时间
$reply_message=$_POST['reply_message'];//回复消息

$sql="INSERT INTO reply(rusername,ruseraccount,reply_message,reply_time,mes_id) VALUES('$_SESSION[username]',$_SESSION[useraccount],'$reply_message','$reply_time',$mes_id);";

$result=mysqli_query($conn, $sql);
if ($result){
    header("Location:content.php");
}else{
    echo mysqli_error($conn);
    echo "<script>back()</script>";
}