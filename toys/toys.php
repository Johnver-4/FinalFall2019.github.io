<?php

require_once ("config.php");

$conn = new mysqli ($host, $dbuname, $dbp, $db);

if ( $conn -> connect_error) {
	die($conn->connect_error);
}


function good_way($conn) {

	$myarray=[];
	$allrows=[];
	$mytarget="%";
	# example of a call:
	# db_json_02_parameter.php?foo=%r%
	$mytarget=$_GET['foo'];
	$query="select * from t2 where name like ?";
	$statement=$conn->prepare($query);
	$statement->bind_param('s',$mytarget);
	$statement->execute();
	$myf1="";
	$myf2="";
	$statement->bind_result($myf1,$myf2);
	//print_r ($statement);
	while ($statement->fetch()) {
		$myarray["name"]=$myf1;
		$myarray["stars"]=$myf2;
		$allrows[]=$myarray;
		//print ("data:".$myf1.'<br/>');

	}
	print (json_encode($allrows));
	$statement->close();

}

good_way($conn);

$conn->close();


?>
<html>
<head>
	<!--
	name=jwilso03
	!-->
	<title>Homepage</title>
	<script type ="text/javascript" src ="javascript/main.js"></script>
	<link rel="stylesheet" href="css/lightmode.css" type="text/css">
</head>
<body>
	<!--TODO 
		-ADD STYLE SELECTOR
		-Refine css animations
		-vignette?
		-website themes?
		-debug debug debug...
	-->
	<div class="sidenav">
		<a href = "../index.html">Home</a>
		<a href = "../interests.html">Interests</a>
		<a href = "../resume.html">About</a>
		<a onclick="myFunction()" class="dropbtn">Projects &or;</a>
			<div id="myDropdown" class="dropdown-content">
				<a href="../cars/cars.html">cars</a>
				<a href="../toys/toys.html">toys</a>
				<a href="../login/login.html">login</a>
			</div>
		<a onclick="myFunction()" class="dropbtn">Style Options &or;</a>
			<div id="myDropdown" class="dropdown-content">
				<a onclick="swapStyleSheet()" id="lightmode">Default Theme</a>
				<a onclick="swapStyleSheet()" id="darkmode">Dark Theme</a>
				<a onclick="swapStyleSheet()" id="funky">Funky Theme</a>
			</div>
			<div class="sidecontent">
				</div>
		</div>
		<div class="h1" id="main">
			<div class="pagehead">
				Toys
			</div>
			<br>
			<div id="content">
				Toys go here
			</div>
		</div>