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
		<h2><center>Search for listings in the database</center></h2>
		<br>
			
		<!-- search by department -->
		<div>
			<p>Search users by department...</p>
		</div>

		<form action="search.php" method="GET">
			<p>
			<label for="department">Select from drop down and click Department search</label>
				<select name="department" id="department">
				<option value=""></option>
				<option value="Computer Science">Computer Science</option>
				<option value="Mathematics">Mathematics</option>
				<option value="Biology">Biology</option>
				<option value="Physiology">Physiology</option>
				</select>
			</p>
			<p>
			<input type="submit" value="Department Search">
			</p>
		</form>
				<!-- search by product -->
		<div>
			<p>Search users by product type...</p>
		</div>

		<form action="search.php" method="GET">
			<p>
			<label for="productType">Select from drop down and click Product Type search</label>
				<select name="productType" id="productType">
				<option value=""></option>
				<option value="Text Book">Text Book</option>
				<option value="Novels">Novels</option>
				<option value="Study Room">Study Room</option>
				<option value="CD">CD</option>
				<option value="Laptops">Laptops</option>
				<option value="Printers">Printers</option>
				<option value="Projectors">Projectors</option>
				<option value="Other">Other</option>
				</select>
			</p>
			<p>
			<input type="submit" value="Product Search">
			</p>
		</form>
		
		<div>
		<?php 
		if (isset($_GET["department"]))
		{
			$conn = mysqli_connect("localhost", "test", "TestPassword", "librarydatabase");
          
			//Checking connection
			if($conn === false){
			die("ERROR: Could not connect. " 
            . mysqli_connect_error());
			}
			
			$department = $_GET['department'];
			
			//$sql = 'SELECT * FROM `users` WHERE `Department` LIKE "Computer Science"';
			//$retval = mysqli_query($conn, $sql);
			
			//if(! $retval){
			//	mysqli_error($conn);
			//}
			echo "<center>
			<table>
				<tr>
				<th>User Name</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Department</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				</tr>";
				
			$result_set = $conn->query("SELECT * FROM `users` WHERE `Department` LIKE '$department'");
			while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
				echo "
				<tr>
				<td>" . $row['UserName'] ."</td>
				<td>". $row['FirstName'] ."</td>
				<td>". $row['LastName'] ."</td>
				<td>". $row['Department'] ."</td>
				<td>". $row['EmailID'] ."</td>
				<td>". $row['Phone'] ."</td>
				<td>". $row['UserAddress'] ."</td>
				</tr>";
			}
			echo "</table>
				</center>";
			
			
			/*while($row = mysqli_fetch_array($retval, MYSQLI_NUM)) {
				echo "User Name: {$row['0']}&emsp;" .
				"First Name: {$row['1']}&emsp;<br>";
			}*/
			
			
			echo "<br>Showing results from user table based on Department: $department";
		}
		if (isset($_GET["productType"]))
		{
			$conn = mysqli_connect("localhost", "test", "TestPassword", "librarydatabase");
			
			//Checking connection
			if($conn === false){
			die("ERROR: Could not connect. " 
            . mysqli_connect_error());
			}
			
			$product = $_GET['productType'];

			echo "<center>
			<table>
				<tr>
				<th>Product ID</th>
				<th>Product Type ID</th>
				<th>Product Name</th>
				</tr>";
				
			$result_set = $conn->query("SELECT product.ProductID,product.ProductTypeID,product.ProductName FROM product,producttype WHERE `ProductTypeNAme` = '$product' AND product.ProductTypeID = producttype.ProductTypeID");
			while($row = $result_set->fetch_array(MYSQLI_ASSOC)){
				echo "
				<tr>
				<td>" . $row['ProductID'] ."</td>
				<td>". $row['ProductTypeID'] ."</td>
				<td>". $row['ProductName'] ."</td>
				</tr>";
			}
			echo "</table>
				</center>";
			
		echo "<br>Showing results from Product table based on Product name: $product";

		}
		?>
		</div>

	</div>
  </body>
</html>
