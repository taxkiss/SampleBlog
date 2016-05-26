<?php
require_once 'conn.php';
session_start();
$useraccount=$_POST['useraccount'];
$password=$_POST['password'];
$_SESSION['useraccount']=$_POST['useraccount'];//用户账号

$sql1="SELECT username,password,hobby FROM user WHERE useraccount=".$useraccount;
$result1=mysqli_query($conn, $sql1);
$row=mysqli_fetch_row($result1);
//print_r($row);
$_SESSION['username']=$row[0];//用户名
$_SESSION['hobby']=$row[2];//用户爱好

if($row){
    if ($password!=$row[1]){
        echo "你输入的密码或账号有误！";
        header("Refresh:2;url=index.php");
    }else{
        header("Location:content.php");
    }
}else{
    echo "你输入的密码或账号有误！";
    header("Refresh:2;url=index.php");
}
