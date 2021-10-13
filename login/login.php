<?php
require_once "../config.php";
// ----------------------------------------------------- //
if(!isset($_POST['tbUsername'])||!isset($_POST['tbPassword'])){
	echo "<h1>Uneli ste pogrešnu lozinku ili korisnično ime</h1>";
	header( "refresh:2;url=index.html" );
}else{
	$username = $_POST['tbUsername'];
	$password = $_POST['tbPassword'];

	$username = str_replace("'","",$username);
	$username = str_replace("-","",$username);
	$password = str_replace("'","",$password);
	$password = str_replace("-","",$password);
// ----------------------------------------------------- //

$user = Users::login($username,$password);

	if($user){

		header( "location: index.php" );
		
	} else{
		echo "<h1>Korisnik: {$_POST['tbUsername']} <br> Nije registrovan!</h1>";
		header( "refresh:2;url=index.html" );
	}
}