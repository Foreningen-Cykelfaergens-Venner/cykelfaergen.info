<?php
	include('db.php');
	require('fpdf181/fpdf.php');
	require('fpdf181/code128.php');
	
	ini_set('session.cookie_domain', '.engapho.com');
	session_start();
	if ( $_SESSION['logged_in'] != 1 ) {
	  $_SESSION['message'] = "You must log in before viewing your profile page!";
	  //echo “log in first”;
		$_SESSION['url'] = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."";
		header('location: https://accounts.engapho.com/Login_V2/?service=Admin Panel&content=https://app.engapho.com/&url='.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'/signin&passive=true&flowName=WebSignin&Entry=ServiceLogin');
	}
	else if($_SESSION['admin'] == 0){
		$_SESSION['url'] = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."";
		header('location: https://accounts.engapho.com/Login_V2/?service=Admin Panel&content=https://app.engapho.com/&url='.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'/signin&passive=true&flowName=WebSignin&Entry=ServiceLogin');
	}else {
		// Makes it easier to read
		$first_name = $_SESSION['first_name'];
		$last_name = $_SESSION['last_name'];
		$email = $_SESSION['email'];
		$active = $_SESSION['active'];
	}



	$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
	if (!$msg) $msg = "Complete\r\nhttps://app.engapho.com/admin-panel/complete.php?order=".$row->ordernr."";


	$err = isset($_GET['err']) ? $_GET['err'] : '';
	if (!in_array($err, array('L', 'M', 'Q', 'H'))) $err = 'L';




	$qrcode = new QRcode(utf8_encode($msg), $err);
	$qrcode->displayPNG(200);





?>