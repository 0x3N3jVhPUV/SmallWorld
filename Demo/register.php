<?php
 //connection variable
$con = mysqli_connect("localhost", "root", "", "smallworld");

//Checking connection 
if(mysqli_connect_errno()) {
	echo "Failed to connect: ". mysqli_connect_errno();
}

//declaring variable to prevent errors
$fname = ""; //first name
$lname = ""; //last name
$em = ""; //email
$em2 = ""; //email2
$password = ""; //password
$password2 = ""; //password2
$date = ""; //Sign Up date
$error_array = ""; //Holds error messages

if(isset($_POST['register_button'])){
	//registration form value

	//First name
	$fname = strip_tags($_POST['reg_fname']);//saving into $fname variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	$fname = str_replace(" ", "", $fname);//replacing every spaces of $fname by no space
	$fname = ucfirst(strtolower($fname));//Lowercase $fname and upercase first letter of $fname	
	//Last name
	$lname = strip_tags($_POST['reg_lname']);//saving into $lname variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	$lname = str_replace(" ", "", $lname);//replacing every spaces of $lname by no space
	$lname = ucfirst(strtolower($lname));//Lowercase $lname and upercase first letter of $lname

	//Email
	$em = strip_tags($_POST['reg_email']);//saving into $em variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	$em = str_replace(" ", "", $em);//replacing every spaces of $em by no space
	$em = ucfirst(strtolower($em));//Lowercase $em and upercase first letter of $email
	//Email2
	$em2 = strip_tags($_POST['reg_email2']);//saving into $em2 variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	$em2 = str_replace(" ", "", $em2);//replacing every spaces of $em2 by no space
	$em2 = ucfirst(strtolower($em2));//Lowercase $em2 and upercase first letter of $email

	//Password
	$password = strip_tags($_POST['reg_password']);//saving into $password variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	//Password2
	$password2 = strip_tags($_POST['reg_password2']);//saving into $password2 variable what has been post in the form by removing php and htm tags thanks to "strip_tags"

	//Signe Up date
	$date = date("Y-m-d"); //current date

	if($em == $em2) {
		//Check if email is in valid format
		if(filter_var($em, FILTER_VALIDAT_EMAIL)){

			$em = filter_var($em , FILTER_VALIDAT_EMAIL);

		}else{
			echo "Invalid format";						
		}
	}else{
		echo "Emails don't match";
	}
}

?>

<html>
<head>
	<title>Welcome to Small World</title>
</head>
<body>
	<form action="register.php" method="POST">
		<input 
			type="text" 
			name="reg_fname" 
			placeholder="First Name" 
			required
		>
		<br>
		<input 
			type="text" 
			name="reg_lname" 
			placeholder="Last Name" 
			required
		>
		<br>
		<input 
			type="text" 
			name="reg_email" 
			placeholder="Email" 
			required
		>
		<br>
		<input 
			type="text" 
			name="reg_email2" 
			placeholder="Confirm Email" 
			required
		>
		<br>
		<input 
			type="text" 
			name="reg_password" 
			placeholder="Password" 
			required
		>
		<br>
		<input 
			type="text" 
			name="reg_password2" 
			placeholder="Confirm Password" 
			required
		>
		<br>
		<input 
			type="submit" 
			name="register_button" 
			value="Register"
		>
	</form>
</body>
</html>