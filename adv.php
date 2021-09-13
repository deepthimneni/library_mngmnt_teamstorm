<!DOCTYPE html>
<html>
  <head>
	<title>Storm Library</title>
	<style type="text/css">
		body {
		background-color: grey;
		}
		#banner {
		background-color: white;
		margin-left: auto;
		margin-right: auto;
		width: 80%;
		border: 5px solid black;
		}
		#banner p {
		text-align: center;
		}
		a.hover {
		color: orange;
		}
		a.visited {
		color: red;
		}
		a.link {
		color: black;
		}
		a.active {
		color: blue;
		}
		h1 {
		text-align: center;
		}
		#main {
		background-color: white;
		margin-left: auto;
		margin-right: auto;
		width: 80%;
		border: 5px solid black;
		text-align: center;
		}
	</style>
  </head>
  <body>
	<div id="banner">
		<h1>Team Storm Library - Registration</h1>
		<p><a href="reg.php">Registration (insertion)</a> | <a href="search.php">Product Listing (search)</a></p>
		<p><a href="adv.php">Advanced Listings (multiple queries)</a> | <a href="update.php">Update Records (Update)</a></p>
		<p><a href="del.php">Clear History Log (delete records)</a></p>
	</div>
	<div><br></div>
	<div id="main">
		<h2><center>Show advance search query</center></h2>
		<br>
			
		<!-- search by department -->
		<div>
			<p>Select UH.*, U.UserName, P.ProductName, PT.ProductTypeName From Users as U Join UserHistory as UH on U.UserID = UH.UserID join Product as P on UH.ProductID = P.ProductID JOin ProductType as PT on P.ProductTypeID = PT.ProductTYpeID Where U.UserID = 1;</p>
		</div>
		<div>
			<?php

			$conn = mysqli_connect("localhost", "test", "TestPassword", "librarydatabase");
			//Checking connection
			if($conn === false){
			die("ERROR: Could not connect. " 
			. mysqli_connect_error());
			}
		
			echo "<center>
			<table>
				<tr>
				<th>ID</th>
				<th>User ID</th>
				<th>Product ID</th>
				<th>Check In Time</th>
				<th>Check Out Time</th>
				<th>Due Date</th>
				<th>Late Fee</th>
				<th>User Name</th>
				<th>Product Name</th>
				<th>Product Type Name</th>
				</tr>";
				
			$result_set = $conn->query("Select UH.*, U.UserName, P.ProductName, PT.ProductTypeName From Users as U Join UserHistory as UH on U.UserID = UH.UserID join Product as P on UH.ProductID = P.ProductID JOin ProductType as PT on P.ProductTypeID = PT.ProductTYpeID Where U.UserID = 1");
			while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
				echo "
				<tr>
				<td>" . $row['ProductID'] ."</td>
				<td>" . $row['UserID'] ."</td>
				<td>" . $row['ProductID'] ."</td>
				<td>". $row['CheckedIN'] ."</td>
				<td>". $row['CheckedOut'] ."</td>
				<td>". $row['DueDate'] ."</td>
				<td>". $row['LateFee'] ."</td>
				<td>". $row['UserName'] ."</td>
				<td>". $row['ProductName'] ."</td>
				<td>". $row['ProductTypeName'] ."</td>
				</tr>";
			}
			echo "</table>
				</center>";
			?>
		</div>
		<div>
		<?php
        // Close connection
        mysqli_close($conn);
		
		?>
		</div>

	</div>
  </body>
</html>
