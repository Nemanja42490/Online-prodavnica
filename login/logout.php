<?php
require_once "../config.php";

$a = new Users();
$a->logout();

header ("location: index.html")
?>