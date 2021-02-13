<?php
require_once 'connection.php';

$txtusername = $_REQUEST['txtusername'];
$txtpassword = $_REQUEST['txtpassword'];
$txttype = 'user';
$txtfirstname = $_REQUEST['txtfirstname'];
$txtcourse = $_REQUEST['txtcourse'];
$txtyear = $_REQUEST['txtyear'];


$STH = $DBH->PREPARE("INSERT INTO tbl_account(cStudentId,cFirstName,cLastName,cCourse,cYear,cType)
						VALUES(:txtpassword,:txtfirstname,:txtusername,:txtcourse,:txtyear,:txttype)");

$STH->BINDPARAM(":txtpassword",$txtpassword);
$STH->BINDPARAM(":txtfirstname",$txtfirstname);
$STH->BINDPARAM(":txtusername",$txtusername);
$STH->BINDPARAM(":txtcourse",$txtcourse);
$STH->BINDPARAM(":txtyear",$txtyear);
$STH->BINDPARAM(":txttype",$txttype);
$STH->EXECUTE();

echo "<script>alert('SUCCESS')</script>";
echo "<script>window.open('../pages/index.php','_self')</script>";	


?>