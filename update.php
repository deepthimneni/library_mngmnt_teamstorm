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
		<h2><center>Update product check in and check out time</center></h2>
		<br>
			
		<!-- search by department -->
		<div>
			<p>Pick a user and pick a product and pick check in or check out to update </p>
		</div>

		<form action="update.php" method="POST">
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
			<label for="product">Select Product</label>
				<select name="product" id="product">
				<option value=""></option>
				
				<?php
				
				$conn = mysqli_connect("localhost", "test", "TestPassword", "librarydatabase");
				//Checking connection
				if($conn === false){
				die("ERROR: Could not connect. " 
				. mysqli_connect_error());
				}
				
				$result_set = $conn->query("SELECT ProductName FROM `product`");
				while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
				echo "<option value=\"" . urlencode($row['ProductName']) . "\">" . $row['ProductName'] ."</option>";
				}
				?>
				</select>
				
			</p>
			<p>
			<input type="submit" name="out" value="Check Out"><br>
			<input type="submit" name="in" value="Check In">
			
			</p>
		</form>
		<div>
		<?php
			if (isset($_POST["user"]) && isset($_POST["product"]))
			{
				$user = $_POST['user'];
				$product = urldecode($_POST['product']);
				
				if ($user == "") {
					echo "You must pick a user";
					exit;
				}
				if ($product == "") {
					echo "You must pick a product";
					exit;
				}
				
				//echo $user . "   " . $product;
			}
				
			if (isset($_POST['in'])){
				$conn = mysqli_connect("localhost", "test", "TestPassword", "librarydatabase");
				//Checking connection
				if($conn === false){
				die("ERROR: Could not connect. " 
				. mysqli_connect_error());
				}
				
				$timestamp = date('Y-m-d H:i:s');
				//echo $timestamp;
				//$result_set = $conn->query("SELECT ProductName FROM `product`");
				
				/*$result = "SELECT CheckedIN, UserName FROM `userhistory`,`users`,`product` WHERE userhistory.UserID = users.UserID and users.UserName = \"$user\" and product.ProductName = \"$product\" and product.ProductID = userhistory.ProductID";
				mysqli_affected_rows($)
				if (mysql_num_rows($result) == 0){
					echo "There are no checked out books to check in.";
					exit;
				}*/
								
				$sql = "UPDATE `userhistory` SET `CheckedIN` = '$timestamp' WHERE `userhistory`.ID in (SELECT UserHistory.ID FROM `userhistory`,`users`,`product` WHERE userhistory.UserID = users.UserID and users.UserName = \"$user\" and product.ProductName = \"$product\" and product.ProductID = userhistory.ProductID)";
				
				if(mysqli_query($conn, $sql)){
				echo "<h3>Data stored in a database successfully.</h3>"; 
  				echo nl2br("\n User with User Name $user \nhas check in $product \n "
                . "Current Time of check in: $timestamp\n\n");
			} else{
				echo "ERROR: Be Quiet! Sorry $sql. "
				. mysqli_error($conn);
				}
			}
			 elseif (isset($_POST['out'])) {
				 $conn = mysqli_connect("localhost", "test", "TestPassword", "librarydatabase");
				//Checking connection
				if($conn === false){
				die("ERROR: Could not connect. " 
				. mysqli_connect_error());
				}
				
				
				$result_set = $conn->query("SELECT UserID FROM `users` WHERE `UserName` = '$user'");
				while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
					$userid = $row['UserID'];
				}
				
				$result_set = $conn->query("SELECT ProductID FROM `product` WHERE `ProductName` = '$product'");
				while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
					$productid = $row['ProductID'];
				}
				
				$duedate = date('Y-m-d H:i:s');
								
				$timestamp = date('Y-m-d H:i:s');

				$sql = "INSERT INTO userhistory VALUES ('','$userid','$productid','','$timestamp','$duedate',NULL)";
				
				if(mysqli_query($conn, $sql)){
            echo "<h3>Data stored in a database successfully.</h3>"; 
  
            echo nl2br("\n User with User Name $user and User ID: $userid\nhas check out $product with Product ID: $productid\n "
                . "Current Time of check out: $timestamp\nCurrent Due date: $duedate\n");
        } else{
            echo "ERROR: Be Quiet! Sorry $sql. " 
                . mysqli_error($conn);
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
