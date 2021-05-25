<?php
	include("inc_files/dbconnect.php");

	if(!empty($_POST["state_id"])){

		$state_id = $_POST['state_id'];
		$query = "SELECT * FROM lga WHERE state_id = '$state_id' AND status = '1' ORDER BY lga_id ASC";
		$result = $dbconn->query($query);

		//Generate HTML of option list
		if($result->num_rows > 0){
			echo '<option value="">Select LGA</option>';
				while($row = $result->fetch_assoc()) {
					echo '<option value="'.$row['lga_id'].'">'.$row['lga_name'].'</option>';
				}
		}else
		{
			echo '<option value="">LGA not available</option>';
		}

	}elseif(!empty($_POST["lga_id"])){

		$lga_id = $_POST['lga_id'];
		$query = "SELECT * FROM ward WHERE lga_id = '$lga_id' AND status = '1' ORDER BY ward_id ASC";

			$result = $dbconn->query($query);

		//Generate HTML of option list
		if($result->num_rows > 0){
			echo '<option value="">Select ward</option>';
				while($row = $result->fetch_assoc()) {
					echo '<option value="'.$row['ward_id'].'">'.$row['ward_name'].'</option>';
				}
		}else
		{
			echo '<option value="">Ward not available</option>';
		}
	}
?>