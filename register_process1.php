<?php
	session_start();
	include("inc_files/dbconnect.php");

	if(isset($_POST['vrsregisterbtn']))
	{
		$txtuser  = $dbconn->real_escape_string($_POST['user']);
		$txtpwd  = $dbconn->real_escape_string($_POST['password']);
		$txtrepwd  = $dbconn->real_escape_string($_POST['repassword']);

			date_default_timezone_set('UTC');
				$udate = date("d/m/Y");

		$searchTable = $dbconn->query("SELECT * FROM register_user WHERE userAcct = '$txtuser'");
			$numRow = $searchTable->num_rows;
			if($numRow == 0)
			{
				$txtpwd = trim($txtpwd);
				if($txtpwd == $txtrepwd)
				{
					$emailchecker = explode("@",$txtuser);
					if($emailchecker[1])
					{
						$pwdHarsh = md5($txtpwd);
						$otpcode = rand(1000,9999);

						$sentInfo = $dbconn->query("INSERT INTO register_user(userAcct, password, confirmuser, registerdate) VALUES ('$txtuser', '$pwdHarsh', '$otpcode', '$udate')");
						
						if($sentInfo)
						{
							//sent an email to your account

							$_SESSION['success'] = "You have completed the first step. Please fill in the OPT Code sent to you and proceed with your registration";
							$_SESSION['optcode'] = $otpcode;
							header("location:vrsregisternext.php");
						}
						

					}
					else
					{
						$phoneNoChecker = (is_numeric($txtuser));
						if($phoneNoChecker = $txtuser)
						{
							$pwdHarsh = md5($txtpwd);
							$otpcode = rand(1000,9999);

							$sentInfo = $dbconn->query("INSERT INTO register_user(userAcct, password, confirmuser, registerdate) VALUES ('$txtuser', '$pwdHarsh', '$otpcode', '$udate')");

							$_SESSION['success'] = "You have completed the first step. Please fill in the OPT Code sent to you and proceed with your registration";
							$_SESSION['optcode'] = $otpcode;
							header("location:vrsregisternext.php");
						}
					}				
				}
				else
				{
					$_SESSION['error'] = "Your password does not match";
					header("location:vrsregister.php");
				}



			}
			else
			{
				$_SESSION['error'] = "Sorry, you have a registration already";
				header("location:vrsregister.php");
			}


	}
	else
	{
		header("location:vrsregister.php");
	}


?>