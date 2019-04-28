<?php
ob_start(); //Turns on output buffering
session_start();
$timezone = date_default_timezone_set("Europe/Paris");
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 //connection variable
$con = mysqli_connect("localhost", "root", "", "smallworld");

//Checking connection 
if(mysqli_connect_errno()) {
	echo "Failed to connect: ". mysqli_connect_errno();
}
?>