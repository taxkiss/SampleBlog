<?php
$conn=mysqli_connect("localhost", "root", "root", "guestbook2") or die("数据库连接失败".mysqli_connect_error());
mysqli_query($conn, "set names utf8");
