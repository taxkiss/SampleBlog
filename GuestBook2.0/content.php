<?php session_start();
require_once 'conn.php';
?>
<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<script type="text/javascript" src="js/login.js"></script>
</head>
<body>
<center>
<div class="main" id="main">
<div class="top" id="top"></div>
<div class="title">
    <ul>
    <li><a href="#" class="selected">首页</a></li>
    <li><a href="postmessage.php">发帖</a></li>
    <li><a href="search.php">搜索</a></li>
    <li><a href="talk.php">聊天室</a></li>
    <li><a href="person.php">个人中心</a></li>
    <li><a href="about.php">关于lisnda</a></li>
    <li><a href="logout.php">退出</a></li>
    <li style="width:200px;border-right:0px;"><a href="#">用户<?php echo $_SESSION['username']?>在线</a></li>
    </ul>
</div>
<!-- ======================================================================================================== -->
<?php 
 //分页显示 

    //1.获取贴的总数
    $sql4="select count(*) from message";
    $result4=mysqli_query($conn, $sql4);
    $mcount=mysqli_fetch_array($result4);
    $total=$mcount[0];//
    $per=3;
    //2.实例化分页对象
    require_once 'Page.class.php';
    $page=new Page($total,$per);
    $sql2="select * from message ".$page->limit;
    $result2=mysqli_query($conn, $sql2);
    
    $pagelist=$page->fpage();
    //echo $pagelist;

    //展示信息
    /* $sql2="select * from message";
    $result2=mysqli_query($conn, $sql2); */
    //$message=mysqli_fetch_array($result2);
    //print_r($message);
    //print_r($message);   
?>



<?php while ($message=mysqli_fetch_array($result2)):?>
<div class="centent">
<div class="touxiang">  <!-- 楼主个人信息 -->
    <p>楼主姓名：<?php echo $message['musername'];?></p>
    <p>发帖时间：<?php echo $message['mes_time'];?></p>
</div>
<!-- ==================================================== -->

<div class="message" name="div1">
<p><?php echo $message['musername']."说："; echo $message['message'];?></p>  <!-- 楼主发帖信息栏 -->
<hr/>
<div style="width:793px;height:23px;background-color:#EBEEEE;margin-left:0px;">发表评论</div>
<!-- 显示留言 -->
<?php 
$sql3="select * from reply b where b.mes_id=".$message['mes_id'];
$result3=mysqli_query($conn, $sql3);
?>
<?php while ($reply=mysqli_fetch_array($result3)):?>

<p><?php echo $reply['reply_message'];?></p>
<p><?php 
echo $reply['rusername']."&nbsp;&nbsp;&nbsp;".$reply['reply_time'];
?></p>

<?php endwhile;?>

<!-- 留言区 -->
<div style="margin-top: 5px;margin-left: -355px;">
<form action="reply.php" method="post">
<input type="hidden" name="mes_id" value="<?php echo $message['mes_id'];?>"><!-- 隐藏表单 -->
<textarea rows="5" cols="30" name="reply_message" style="resize:none;"></textarea>
<input type="submit" name="reply" value="提交"><input type="reset" name="reply" value="重置">
</form>
</div>
</div>
</div>
<?php endwhile;?>

<script type="text/javascript">
var article_bodys = document.getElementsByName('div1');
for( var key in article_bodys)
{
	if(typeof article_bodys[key] == 'object')
      changeColor( article_bodys[key] );
}
</script>
<?php echo $pagelist;?><!-- 显示分页条 -->
	
</div>
</center>

</body>
</html>