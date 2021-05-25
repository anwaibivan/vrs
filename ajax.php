            <?php
        //Connection to the database 
        $conn = mysqli_connect("localhost", "root", "Oracle@1", "dbconn");

        if(isset($_POST['id'])){
        	$id = $_POST['id'];

        	 $query = mysqli_query($conn, "SELECT * FROM employee_lga WHERE State_id = '$id'");
                while($row = mysqli_fetch_array($query)){
                	$id = $row['id'];
                	$lga = $row['LGA'];

                	echo "<option value='$id'>$lga</option>";

                }

        }
           


            ?>