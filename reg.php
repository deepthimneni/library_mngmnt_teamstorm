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
		<h2><center>Create new user into the user table</center></h2>
		<br>

		<form action="reginsert.php" method="post">
			<p>
			<label for="username">User Name: </label>
			<input type="text" name="user_name" id="username">
			</p>
			<p>
			<label for="firstname">First Name: </label>
			<input type="text" name="first_name" id="firstname">
			</p>
			<p>
			<label for="lastname">Last Name: </label>
			<input type="text" name="last_name" id="lastname">
			</p>
			<p>
			<label for="role">Role: </label>
			<select name="role" id="role">
				<option value="1">Student</option>
				<option value="2">Admin</option>
			</select>
			</p>
			<p>
			<label for="department">Department: </label>
			<select name="department" id="department">
				<option value="Computer Science">Computer Science</option>
				<option value="Mathematics">Mathematics</option>
				<option value="Biology">Biology</option>
				<option value="Physiology">Physiology</option>
			</select>
			</p>
			<p>
			<label for="password">Password: </label>
			<input type="text" name="password" id="password">
			</p>
			<p>
			<label for="email">Email: </label>
			<input type="text" name="email" id="email">
			</p>
			<p>
			<label for="phone">Phone Number: </label>
			<input type="text" name="phone" id="phone">
			</p>
			<p>
			<label for="address">Address: </label>
			<input type="text" name="address" id="address">
			</p>
			<input type="submit" value="Submit">
		</form>
	</div>
  </body>
</html>
