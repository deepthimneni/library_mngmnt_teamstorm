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
		<h2><center>Delete user history for a specific user</center></h2>
		<br>
			
		<!-- search by department -->
		<div>
			<p>Pick a user and hit delete button to clear history </p>
		</div>

		<form action="del.php" method="POST">
			<p>
			<label for="user">Select User</label>
				<select name="user" id="user">
				<option value=""></option>
				
				<?php
				
				$conn = mysqli_connect("localhost", "test", "TestPassword", "librarydatabase");
				//Checking connection
				if($conn === false){
				die("ERROR: Could not connect. " 
				. mysqli_connect_error());
				}
				
				$result_set = $conn->query("SELECT UserName FROM `users`");
				while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
				echo "<option value=" . $row['UserName'] . ">" . $row['UserName'] ."</option>";
				}
				?>
				</select>
			</p>
			<p>
			<input type="submit" name="del" value="Delete">
		
			</p>
		</form>
		<div>
		<?php
			echo "<center>
			<table>
				<tr>
				<th>User Name</th>
				<th>User ID</th>
				<th>Product ID</th>
				<th>Check In Time</th>
				<th>Check Out Time</th>
				<th>Due Date</th>
				<th>Late Fee</th>
				</tr>";
				
			$result_set = $conn->query("SELECT UserName, userhistory.UserID, ProductID, CheckedIN, CheckedOut, DueDate, LateFee FROM `userhistory`, `users` WHERE users.UserID = userhistory.UserID");
			while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
				echo "
				<tr>
				<td>" . $row['UserName'] ."</td>
				<td>". $row['UserID'] ."</td>
				<td>". $row['ProductID'] ."</td>
				<td>". $row['CheckedIN'] ."</td>
				<td>". $row['CheckedOut'] ."</td>
				<td>". $row['DueDate'] ."</td>
				<td>". $row['LateFee'] ."</td>
				</tr>";
			}
			echo "</table>
				</center>";
			?>
		</div>
		<div>
		<?php
			if (isset($_POST["user"]))
			{
				$user = $_POST['user'];
				
				if ($user == "") {
					echo "You must pick a user";
					exit;
				}
				
				$sql = "DELETE FROM `userhistory` WHERE `userhistory`.`UserID` in (SELECT `users`.`UserID` FROM `users`,`userhistory` where `UserName` = \"$user\")";
				
				if (isset($_POST['del']))
				{
					$conn = mysqli_connect("localhost", "test", "TestPassword", "librarydatabase");
					//Checking connection
					if($conn === false){
						die("ERROR: Could not connect. "
						. mysqli_connect_error());
						
					}
				
				if(mysqli_query($conn, $sql)){
					echo "<h3>Date has been deleted from database in a database successfully.</h3>"; 
					echo "<p>Refresh page to see listing without deleted items</p>";
					
				} 
				else {
					echo "ERROR: Be Quiet! Sorry $sql. "
					. mysqli_error($conn);
					}
				}
			 }
			 else {
				 echo "No selections";
			 }
        // Close connection
        mysqli_close($conn);
		
		?>
		</div>

	</div>
  </body>
</html>
