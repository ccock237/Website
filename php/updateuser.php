<?php
	// Start the session
	session_start();
	
	// Include the mysql library file
	include("mysql.php");
	
	// Variables used to get the POST data
	$updateUsername = "";
	$updateUsertag = "";
	$updatePassword = "";
	$tries = 3;

	if (isset($_POST["username"])) $updateUsername = TestFormData($_POST["username"]);
	else --$tries;
	
	if (isset($_POST["usertag"])) $updateUsertag = TestFormData($_POST["usertag"]);
	else --$tries;
	
	if (isset($_POST["password"])) {
		if (isset($_POST["passwordR"])) {
			if ($_POST["password"] == $_POST["passwordR"]) {
				$updatePassword = TestFormData($_POST["password"]);
			} else {
				--$tries;
			}
		} else {
			--$tries;
		}
	} else {
		--$tries;
	}
	
	if ($tries == 0) {
		$_SESSION["updated"] = "failed";
	} else {
		// Determine what is to be updated and make an SQL string
		if ($updateUsername != "" && $updateUsername != $_SESSION["username"]) {
			if ($updateUsertag != "") {
				if ($updatePassword != "") {
					$updateString = "UserName='$updateUsername', UserPass='$updatePassword', UserTag='$updateUsertag'";
				} else {
					$updateString = "UserName='$updateUsername', UserTag='$updateUsertag'";
				}
			} else {
				$updateString = "UserName='$updateUsername'";
			}
		}
		else if ($updateUsertag != "" && $updateUsertag != $_SESSION["usertag"]) {
			if ($updatePassword != "") {
				$updateString = "UserPass='$updatePassword', UserTag='$updateUsertag'";
			} else {
				$updateString = "UserTag='$updateUsertag'";
			}
		}
		else {
			$updateString = "UserPass='$updatePassword'";
		}
		
		// Connect to the database
		$connection = new MySQLStream("localhost", "webaccess", "WebAccessPass", "claytonwebsite");
		
		if ($connection) {
			// Update the table
			if ($connection->SQLUpdate("user", $updateString, "UserID='" . $_SESSION["userID"] . "'")) {
				// Put needed values in SESSION array
				$_SESSION["update"] = "updated";
				if ($updateUsername != "") $_SESSION["username"] = $updateUsername;
				if ($updateUsertag != "") $_SESSION["usertag"] = $updateUsertag;
			} else {
				$_SESSION["update"] = "failed";
			}
		} else {
			$_SESSION["update"] = "failed";
		}	
	}
	ReturnToHome();
	
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