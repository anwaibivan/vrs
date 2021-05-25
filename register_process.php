<?php
	session_start();
	include("inc_files/dbconnect.php");

	if(isset($_POST['vrsconfirmotpbtn']))
	{
		$txtuser  = $dbconn->real_escape_string($_POST['userAcct']);
		$userOTP  = $dbconn->real_escape_string($_POST['userOtp']);
		$txtOTP  = $dbconn->real_escape_string($_POST['txtOTPCode']);

		if($userOTP == $txtOTP)
		{
			$searchTable = $dbconn->query("SELECT * FROM reguser WHERE userAcct = '$txtuser' AND confirmuser = '$userOTP'");
				$getInfo = $searchTable->fetch_assoc();
					$userAcct = $getInfo['userAcct'];
					$_SESSION['userAcct'] = $getInfo['userAcct'];
					$_SESSION['otpcode'] = $getInfo['confirmuser'];
				$updaterecord = $dbconn->query("UPDATE reguser SET confirmuser = 'vrsActiveUser' WHERE userAcct = '$txtuser' AND confirmuser = '$userOTP'");
					$_SESSION['success'] = "Your account has been verified. Please fill in this stage to complete your registration";
					header("location:vrsregisternext.php");
		}
		else
		{
					$_SESSION['error'] = "Your OTP Code is not correct";
					header("location:vrsregister.php");
		}

		
	
	}
	elseif(isset($_POST['vrsregisternextbtn']))
	{
		$txttitle  = $dbconn->real_escape_string($_POST['txtTitle']);
		$txtfirstName  = $dbconn->real_escape_string($_POST['txtFirstName']);
		$txtlastName  = $dbconn->real_escape_string($_POST['txtLastName']);
		$txtotherName  = $dbconn->real_escape_string($_POST['txtOtherName']);
		$txtgender  = $dbconn->real_escape_string($_POST['txtGender']);
		$txtdateofbirth  = $dbconn->real_escape_string($_POST['txtDateOfBirth']);
		$txtphoneNumber  = $dbconn->real_escape_string($_POST['txtPhoneNumber']);
		$txtemailAddress  = $dbconn->real_escape_string($_POST['txtEmailAddress']);
		$txtstate  = $dbconn->real_escape_string($_POST['txtState']);
		$txtlga  = $dbconn->real_escape_string($_POST['txtLGA']);
		$txtward  = $dbconn->real_escape_string($_POST['txtWard']);
		$txtaddress  = $dbconn->real_escape_string($_POST['txtAddress']);
		$getuserAcct  = $dbconn->real_escape_string($_POST['getUserAcct']);

		$_SESSION['txttitle'] = $txttitle;
		$_SESSION['txtfirstName'] = $txtfirstName;
		$_SESSION['txtlastName'] = $txtlastName;
		$_SESSION['txtotherName'] = $txtotherName;
		$_SESSION['txtgender'] = $txtgender;
		$_SESSION['txtdateofbirth'] = $txtdateofbirth;
		$_SESSION['txtphoneNumber'] = $txtphoneNumber;
		$_SESSION['txtemailAddress'] = $txtemailAddress;
		$_SESSION['txtstate'] = $txtstate;
		$_SESSION['txtlga'] = $txtlga;
		$_SESSION['txtward'] = $txtward;
		$_SESSION['txtaddress'] = $txtaddress;
		$_SESSION['getuserAcct'] = $getuserAcct;


		if(is_numeric($getuserAcct))
		{
			$getRecord = $dbconn->query("SELECT * FROM reguser WHERE userAcct = '$getuserAcct'");
			$getNumRow = $getRecord->fetch_assoc();
				$getID = $getNumRow['Id'];

				$ckRecord = $dbconn->query("SELECT * FROM reguser WHERE userAcct = '$txtemailAddress'");
				if($ckRecord->num_rows == 0)
				{

					$inputRecord = $dbconn->query("INSERT INTO `profile`(`UserID`, `Title`, `Firstname`, `Lastname`, `Othernames`,`gender`,`dateofbirth`, `Phone`, `Email`, `State`, `Lga`, `Ward`, `Address`) VALUES ('$getID', '$txttitle', '$txtfirstName', '$txtlastName', '$txtotherName','$txtgender','$txtdateofbirth', '$txtphoneNumber', '$txtemailAddress', '$txtstate', '$txtlga', '$txtward', '$txtaddress')");

							$_SESSION['UserID'] = $getID;
							$_SESSION['last_login_timestamp'] = time();
							$_SESSION['success'] = "".$_SESSION['txtfirstName']." ".$_SESSION['txtlastName'].", you have successfully registered.";
							header("location:UserDashboard/index.php");
							
				}
				else
				{
					$_SESSION['info'] = "We have the email address ".$_SESSION['txtemailAddress']." registered already. Please use a different working email address.";
							header("location:vrsregisternext.php");
				}
					
		}
		else
		{

			$getRecord = $dbconn->query("SELECT * FROM reguser WHERE userAcct = '$getuserAcct'");
			$getNumRow = $getRecord->fetch_assoc();
				$getID = $getNumRow['Id'];

				$ckRecord = $dbconn->query("SELECT * FROM reguser WHERE userAcct = '$txtphoneNumber'");
				if($ckRecord->num_rows == 0)
				{

					$inputRecord = $dbconn->query("INSERT INTO `profile`(`UserID`, `Title`, `Firstname`, `Lastname`, `Othernames`,`gender`,`dateofbirth`, `Phone`, `Email`, `State`, `Lga`, `Ward`, `Address`) VALUES ('$getID', '$txttitle', '$txtfirstName', '$txtlastName', '$txtotherName','$txtgender','$txtdateofbirth', '$txtphoneNumber', '$txtemailAddress', '$txtstate', '$txtlga', '$txtward', '$txtaddress')");

						$_SESSION['UserID'] = $getID;
						$_SESSION['last_login_timestamp'] = time();
						$_SESSION['success'] = "".$_SESSION['txtfirstName']." ".$_SESSION['txtlastName'].", you have successfully registered.";
							header("location:UserDashboard/index.php");
					
				}
				else
				{
					$_SESSION['info'] =  "We have the phone number ".$_SESSION['txtphoneNumber']." registered already. Please use a different working phone number.<br>".$_SESSION['txtstate']." State.<br> ".$_SESSION['txtlga']." LGA and <br> ".$_SESSION['txtward']." Ward";
							header("location:vrsregisternext.php");
				}
		}
	}
	else
	{
		header("location:vrsregisternext.php");
	}


?>