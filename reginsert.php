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
		<h1>Team Storm Library</h1>
		<p><a href="reg.php">Registration (insertion)</a> | <a href="search.php">Product Listing (search)</a></p>
		<p><a href="adv.php">Advanced Listings (multiple queries)</a> | <a href="update.php">Update Records (Update)</a></p>
		<p><a href="del.php">Clear History Log (delete records)</a></p>
	</div>
	<div><br></div>
	<div id="main">
		<h2><center>Inserting user data into the database</center></h2>
		<?php
  
        $conn = mysqli_connect("localhost", "test", "TestPassword", "librarydatabase");
          
        // Checking connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Getting variable data
		$user_name = $_REQUEST['user_name'];
        $first_name =  $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $role =  $_REQUEST['role'];
		$department = $_REQUEST['department'];
		$password = $_REQUEST['password'];
		$email = $_REQUEST['email'];
		$phone = $_REQUEST['phone'];
        $address = $_REQUEST['address'];
		
		//$sql = "SELECT COUNT(UserID) FROM users";
		//$count = mysqli_query($conn, $sql);
        //$count = $count +  1;
		
		//echo $count;
		
        // insert query
        $sql = "INSERT INTO users  VALUES ('','$user_name','$first_name','$last_name',
		'$role','$department','$password','$email','$phone','$address')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully.</h3>"; 
  
            echo nl2br("\n User Name: $user_name\n First Name: $first_name\n "
                . "Last Name: $last_name\nRole: $role\nDepartment: $department\n"
				. "Password: $password\nEmail: $email\nPhone $phone\nAddress: $address");
        } else{
            echo "ERROR: Be Quiet! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
	</div>
  </body>
</html>
