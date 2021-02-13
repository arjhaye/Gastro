<?php
require_once 'connection.php';

$username = $_REQUEST['txtusername'];
$password = $_REQUEST['txtpassword'];
$type = 'ADMIN';

$STH = $DBH->prepare("SELECT * FROM tbl_account WHERE cLastName=:username and cStudentId=:password");
$STH->bindparam(":username",$username);
$STH->bindparam(":password",$password);
$STH->execute();
$ROW = $STH->fetch(PDO::FETCH_ASSOC);
$CTR = $STH->rowCount();

if($CTR<>0){
	if ($type == $ROW['cLastName']) {
		session_start();
		$_SESSION['user']=$username;
		$_SESSION['pass']=$password;
		echo "<script>alert('SUCCESS')</script>";
		echo "<script>window.open('../pages/dashboard.php','_self')</script>";
	}else{
		session_start();
		$_SESSION['user']=$username;
		$_SESSION['pass']=$password;
		echo "<script>alert('SUCCESS')</script>";
		echo "<script>window.open('../pages/dashboard.php','_self')</script>";
	}
}else {
	echo "<script>alert('ACCESS DENIED')</script>";
	echo "<script>window.open('../pages/index.php?loginFailed=true&reason=password','_self')</script>";
}
?>