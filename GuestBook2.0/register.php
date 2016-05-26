<?php
header("Content-type:text/html;charset=utf-8");
require_once 'conn.php';

$useraccount=$_POST['useraccount'];
$username=$_POST['username'];
$password=$_POST['password'];
$hobby=$_POST['hobby'];

//用户注册1462810009
$sql="INSERT INTO user VALUES($useraccount,'$username','$password',$hobby)";

$result=mysqli_query($conn,$sql);
if ($result){
    echo "注册成功，3秒后进入登录页面！";
    header('Refresh:3;url=index.php');
}