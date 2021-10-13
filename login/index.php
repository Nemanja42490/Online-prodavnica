<?php

require_once "header.php";
require_once "../config.php";

if(!Session::get("user_status")||Session::get("user_status")!=3){
	echo "<h1>Invalid access!</h1>";
	header( "refresh:1;url=index.html" );
}else{
?>

<div class="login_container">

			<a href="categories.php">Kategorije</a>
			<br>
			<a href="product.php"> Proizvodi</a>
			<br>
			<a href="orders.php"> Narudžbine </a>
			<br>
			<a href="logout.php"> Odjavite se</a>
</div>
<?php
}
require_once "footer.php";
?>
