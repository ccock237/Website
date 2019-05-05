<?php
	/*
	**************************************
		Name:			returnuser.php
		Programmer:		Clayton Cockrell
		Date:			10/6/17
		Description:	This php file is used to accept the input text from a form in home.php
						for a returning user. The file attempts to make a connection to a mysql
						database and check whether the user has entered their correct login
						information.
		
		Functions:		ReturnToHome(),
						TestFormData()
	**************************************
	*/
	
	// Start the session
	session_start();
	
	// Include the mysql library file
	include("mysql.php");
	
	// Check if the POST array has data from the form
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		// Get the data from the POST array
		$returnUser = TestFormData($_POST["username"]);
		$returnPass = TestFormData($_POST["password"]);
		
		// Connect to database
		$database = new MySQLStream("localhost", "webaccess", "WebAccessPass", "claytonwebsite");
		if (!$database) {
			// Login failed
			$_SESSION["login"] = "failed";
			// Return to home.php
			ReturnToHome();
		} else {
			// Attempt to read the data from the table
			$_SESSION["login"] = "failed";
			$result = $database->SQLSelect("user WHERE UserName='$returnUser' AND UserPass='$returnPass'", "UserID, UserName, UserPass, UserTag");
			if ($result[0][0] != "No Data") {
				//$resultRow = array();
				foreach ($result as $resultRow) {
					// Check if the user entered a valid username and password
					if ($resultRow[1] == $returnUser && $resultRow[2] == $returnPass) {
						$_SESSION["userTag"] = $resultRow[3];
						$_SESSION["username"] = $resultRow[1];
						$_SESSION["userID"] = $resultRow[0];
						$_SESSION["login"] = "logged in";
					}
				}
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