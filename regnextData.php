<?php 
	include_once 'inc_files/dbconnect.php';

	  if(!empty($_POST['country_id'])){
    $getCountryID = $_POST['country_id']

$query="SELECT * FROM states WHERE country_id = '$getCountryID' ORDER BY id ASC";
$result=$dbconn->query($query);

if ($result->num_rows > 0) {
	echo'<option value="">Select State</option>';
	while($row=$result->fetch_assoc()){

		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';

		}
	}else{
		echo'<option value="">State not available</option>';
		}


  }
?>