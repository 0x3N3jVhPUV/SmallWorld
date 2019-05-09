<?php
require 'config/config.php';

if (isset($_SESSION['username'])) {
	$userLoggIn = $_SESSION['username'];
}
else{
	header("Location: register.php");
}

?>

<html>
<head>
	<title>My test</title>
</head>
<body>