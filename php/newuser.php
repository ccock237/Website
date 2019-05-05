<?php
	/*
	**************************************
		Name:			newuser.php
		Programmer:		Clayton Cockrell
		Date:			10/6/17
		Description:	This php file is used to accept the input text from a form in home.php
						for a new user. The file attempts to make a connection to a mysql
						database and insert the information for the new user into a table.
		
		Functions:		ReturnToHome(),
						TestFormData()
	**************************************
	*/

	// Start the session
	session_start();
	
	// Include the mysql library file
	include("mysql.php");
	
	// Check if all needed POST values are set
	if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["usertag"])) {
		// Get the data from the POST array
		$newUser = TestFormData($_POST["username"]);
		$newPass = TestFormData($_POST["password"]);
		$newTag = TestFormData($_POST["usertag"]);
		
		// Connect to the database
		$database = new MySQLStream("localhost", "webaccess", "WebAccessPass", "claytonwebsite");
		if (!$database) {
			// Login failed
			$_SESSION["login"] = "failed";
			// Return to home.php
			ReturnToHome();
		} else {
			// Connected to database and attempting to insert data
			$_SESSION["login"] = "failed";
			if ($database->SQLInsert("user", "UserName, UserPass, UserTag", "'$newUser', '$newPass', '$newTag'")) {
				// Put needed values in SESSION array
				$_SESSION["userID"] = $database->SQLSelect("user WHERE UserName='$newUser'", "userID")[0][0];
				$_SESSION["userTag"] = $newTag;
				$_SESSION["username"] = $newUser;
				$_SESSION["login"] = "logged in";
			}
			// Return to home.php
			ReturnToHome();
		}
	}
	
	/*
		Name:           ReturnToHome
		Parameters:     None
		Returns:        None
		Description:    The function ReturnToHome uses the built in header function
						to reference back to the home.php file.
	*/
	function ReturnToHome() {
		$location = "../home.php";
		header("Location: $location");
	}
	
	/*
		Name:           TestFormData
		Parameters:     Form data
		Returns:        Stripped and trimmed form data
		Description:    The function TestFormData trims, stripts, and elimates any HTML
						characters that may have been put in the input box of a form. The
						function returns the safe data.
	*/
	function TestFormData($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>