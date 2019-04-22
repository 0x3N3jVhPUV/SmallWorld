<?php
$con = mysqli_connect("localhost", "root", "", "smallworld");

if(mysqli_connect_errno()) {
	echo "Failed to connect: ". mysqli_connect_errno();
}

$query = mysqli_query($con, "INSERT INTO test VALUES(NULL, 'toto')");
?>

<html>
<head>
	<title>My test</title>
</head>
<body>
      Hello World!
</body>
</html>