<?php
require('db.php');


$name="";



if (isset($_POST['name'])) {
	echo "<style>
            body {
                background-image: url('gym.png');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }
			.table {
				background-color: rgba(128, 128, 128, 0.8);
		 /* Same as the container's background */
			}
          </style>";


	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>Mem_Id</th>";
	echo "<th>Name</th>";
	echo "<th>DOB</th>";
	echo "<th>Age</th>";
	
	echo "<th>Mobile No</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$name=$_POST['name'];


	$que = mysqli_query($conn, "SELECT * FROM `member` WHERE CONCAT(`mem_id`, `name`, `dob`, `age`, `mobileno`) LIKE '%" . $name . "%'");

		if(mysqli_num_rows($que) > 0){
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['mem_id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['dob']."</td>";
		echo "<td>".$row['age']."</td>";
		
		echo "<td>".$row['mobileno']."</td>";
		echo "<td><a href='home.php?id=$row[mem_id]&info=update_member'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='home.php?id=$row[mem_id]&info=delete_member'><i class='fas fa-trash-alt'></i></a></td>";

	}
}else{
	echo "<div class='alert alert-warning'><b>0 result</b></div>";
}
	
}




	
?>
