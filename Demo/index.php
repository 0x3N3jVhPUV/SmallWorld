<?php
 //connection variable
$con = mysqli_connect("localhost", "root", "", "smallworld");

//Checking connection 
if(mysqli_connect_errno()) {
	echo "Failed to connect: ". mysqli_connect_errno();
}

//Insert value
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