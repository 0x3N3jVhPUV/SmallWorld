<?php
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//declaring variable to prevent errors

$fname = ""; //first name
$lname = ""; //last name
$em = ""; //email
$em2 = ""; //email2
$password = ""; //password
$password2 = ""; //password2
$date = ""; //Sign Up date
$error_array = array(); //Holds error messages

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//Setting variables after registration

if(isset($_POST['register_button'])){
	//registration form value

	//First name
	$fname = strip_tags($_POST['reg_fname']);//saving into $fname variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	$fname = str_replace(" ", "", $fname);//replacing every spaces of $fname by no space
	$fname = ucfirst(strtolower($fname));//Lowercase $fname and upercase first letter of $fname
	$_SESSION['reg_fname'] = $fname;//Stores first name into session variable
	//Last name
	$lname = strip_tags($_POST['reg_lname']);//saving into $lname variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	$lname = str_replace(" ", "", $lname);//replacing every spaces of $lname by no space
	$lname = ucfirst(strtolower($lname));//Lowercase $lname and upercase first letter of $lname
	$_SESSION['reg_lname'] = $lname;//Stores last name into session variable

	//Email
	$em = strip_tags($_POST['reg_email']);//saving into $em variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	$em = str_replace(" ", "", $em);//replacing every spaces of $em by no space
	$em = ucfirst(strtolower($em));//Lowercase $em and upercase first letter of $email
	$_SESSION['reg_email'] = $em;//Stores email name into session variable	
	//Email2
	$em2 = strip_tags($_POST['reg_email2']);//saving into $em2 variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	$em2 = str_replace(" ", "", $em2);//replacing every spaces of $em2 by no space
	$em2 = ucfirst(strtolower($em2));//Lowercase $em2 and upercase first letter of $email
	$_SESSION['reg_email2'] = $em2;//Stores email2 name into session variable	

	//Password
	$password = strip_tags($_POST['reg_password']);//saving into $password variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	//Password2
	$password2 = strip_tags($_POST['reg_password2']);//saving into $password2 variable what has been post in the form by removing php and htm tags thanks to "strip_tags"
	//Signe Up date
	$date = date("Y-m-d"); //current date

	//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	//Checking inputs

	if($em == $em2) {
		//Check if email is in valid format
		if(filter_var($em, FILTER_VALIDATE_EMAIL)){

			$em = filter_var($em , FILTER_VALIDATE_EMAIL);

			//Check if email exists
			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($error_array, "Email already in use<br>");
			}

		}else{
				array_push($error_array, "Invalid format<br>");						
		}
	}else{
		array_push($error_array, "Emails don't match<br>");
	}

	if(strlen($fname) > 25 || strlen($fname) < 2){
				array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2){
				array_push($error_array, "Your last name must be between 2 and 25 characters<br>");
	}

	if(strlen($password) > 30 || strlen($password) < 5){
				array_push($error_array, "Your password must be between 5 and 30 characters<br>");
	}

	if($password != $password2) {
				array_push($error_array, "Your passwords do not match<br>");
	}else{
		if(preg_match('/[^A-Za-z0-9]/', $password)){
				array_push($error_array, "Your password can only contain English characters or numbers<br>");
		}
	}

	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	//insert values into database

	if(empty($error_array)){
		$password = md5($password); //Encrypt password before sending to database

		//Generating username by concatenating first and last name
		$username = strtolower($fname . "_".$lname);
		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

		$i = 0;
		//if username exists add number to username 
		while(mysqli_num_rows($check_username_query) != 0){
			$i++;
			$username = $username . "_". $i;
			$check_username_query;
		}
		//Profile picture assignement
		$rand = rand(1, 2); //Random number between 1 and 2

		if($rand = 1)
			$profile_pic = "assets/images/profile_pics/default/head_deep_blue.png";
		else if($rand = 2)
			$profile_pic = "assets/images/profile_pics/default/head_emerald.png";


		//Insert values
		$query = mysqli_query(
				$con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

		//Validation message
		array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");

		//Clear session vaiables
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";

	}
}
?>