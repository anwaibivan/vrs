<?php
	session_start();
	include("inc_files/dbconnect.php");

	if(isset($_POST['vrsloginbtn']))
	{
		$txtuser  = $dbconn->real_escape_string($_POST['txtUserAcct']);
		$txtpwd  = $dbconn->real_escape_string($_POST['txtPassword']);

		$pwdHarsh = md5($txtpwd);

		$searchTable = $dbconn->query("SELECT * FROM reguser WHERE userAcct = '$txtuser' AND password = '$pwdHarsh'");
			$numRow = $searchTable->num_rows;
			if($numRow != 0)
			{
				if($confirmuser == 'SuperAdmin')
				{

				}elseif ($confirmuser == 'Admin') 
				{
					
				}
				else
				{
					$getInfo = $searchTable->fetch_assoc();
					$userID = $getInfo['Id'];
					if($getInfo['confirmuser'] == 'vrsActiveUser')
					{
						$checkProfile = $dbconn->query("SELECT Id, UserID, Title, Firstname, Lastname, Othernames, Phone, Email, State, Lga, Ward, Address FROM profile WHERE UserID = '$userID'");
							$chknumRow = $checkProfile->num_rows;
							if($chknumRow != 0)
							{
								$row = $checkProfile->fetch_assoc();
									$_SESSION['txttitle'] = $row['Title'];
									$_SESSION['txtfirstName'] = $row['Firstname'];
									$_SESSION['txtlastName'] = $row['Lastname'];
									$_SESSION['txtotherName'] = $row['Othernames'];
									$_SESSION['txtphoneNumber'] = $row['Phone'];
									$_SESSION['txtemailAddress'] = $row['Email'];
									$_SESSION['txtaddress'] = $row['Address'];
									
						$_SESSION['last_login_timestamp'] = time();
						$_SESSION['UserID'] = $getInfo['Id'];
						$_SESSION['userAcct'] = $getInfo['userAcct'];
							$_SESSION['success'] = "".$_SESSION['txtfirstName']." ".$_SESSION['txtlastName'].", you have successfully.";
							header("location:UserDashboard/index.php");
						}
						else
						{
							$_SESSION['UserID'] = $getInfo['Id'];
							$_SESSION['userAcct'] = $getInfo['userAcct'];
							$_SESSION['success'] = "".$_SESSION['userAcct'].", You are yet to complete your registration.";
							header("location:vrsregisternext.php");						
						}
					}
					else
					{
						$_SESSION['UserID'] = $getInfo['Id'];
						$_SESSION['userAcct'] = $getInfo['userAcct'];
							$_SESSION['success'] = "".$_SESSION['userAcct'].", You have not confirm. Please check the OTP Code that was sent to you for confirmation.";
							header("location:vrsregister.php");
					}

			}
		}
		else
		{
			$_SESSION['error'] = "Sorry, you dont have an account with us. <a href='vrsregister.php'>Register Now</a>";
			header("location:vrslogin.php");
		}


	}
	else
	{
		header("location:vrsregister.php");
	}


?>