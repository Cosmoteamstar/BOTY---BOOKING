<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
$GLOBALS['m'] = array ("01"=>"มกราคม",
						"02"=>"กุมภาพันธ์",
						"03"=>"มีนาคม",
						"04"=>"เมษายน",
						"05"=>"พฤษภาคม",
						"06"=>"มิถุนายน",
						"07"=>"กรกฏาคม",
						"08"=>"สิงหาคม",
						"09"=>"กันยายน",
						"10"=>"ตุลาคม",
						"11"=>"พฤศจิกายน",
						"12"=>"ธันวาคม");
function dbConnect(){
	$host = "localhost";
	$user = "root";
	$pw = "";
	$database = "boty";
	$conn = mysqli_connect($host,$user,$pw,$database) or die ("Connection Error");
	if($conn){
		mysqli_set_charset($conn,"UTF8");
		return $conn;
	}else{
		return false;
	}
}
function doSelect($SQL){
	$conn = dbConnect();
	$rs = mysqli_query($conn,$SQL);
	$num = mysqli_num_rows($rs);
	if($num > 0){
		return $rs;
	}else{
		return false;
	}
}
function doSQL($SQL,$successMSG,$errMSG,$reURL){
	$conn = dbConnect();
	if(mysqli_query($conn,$SQL)){
		echo "<script>alert(\"".$successMSG."\")</script>";
	}else{
		echo "<script>alert(\"".$errMSG."\")</script>";
	}
	header("refresh:0.1;url=".$reURL);
	exit();
}
function toThaiDate($engdate){
	$d = explode("-", $engdate);
	return $d[2]." ".$GLOBALS['m'][$d[1]]." ".($d[0]+543);
}
function checkLogin(){
	if(!isset($_SESSION["userID"])){
		header("refresh:0.1;url=login.php");
		exit();
	}
}

function checkLoginA(){
	if(!isset($_SESSION["userIDA"])){
		header("refresh:0.1;url=login.php");
		exit();
	}
}
?>