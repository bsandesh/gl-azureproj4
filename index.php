<!DOCTYPE html>
<html>
<head>
	<title>App Service-MySQL Table Viewer</title>
</head>
<body>
	<h1>MySQL Table Viewer</h1>
	<?php
		//  modified Sandesh 4/14/2025
		$servername = "mysqlserver-app-modernize.mysql.database.azure.com";
		$username = "sqluser";
		$password = "Password12345!";
		$dbname = "mysqldb";

		// Create database connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Query database for all rows in the table
		// Specify the Correct Table Name. modified Sandesh 4/14/2025
		$sql = "SELECT * FROM employees";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// Display table headers-modified Sandesh 4/14/2025
			echo "<table><tr><th>Employee Number</th><th>First Name</th><th>Email</th></tr>";
			//echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
			// Loop through results and display each row in the table
			while($row = $result->fetch_assoc()) {
				// display rows -modified Sandesh 4/14/2025
				 echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["email_id"] . "</td></tr>";

				//echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}

		// Close database connection
		$conn->close();
	?>
</body>
</html>
