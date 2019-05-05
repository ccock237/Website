<?php
			// Check if the SESSION super global has any value in index key of 'login'
			if (isset($_SESSION["login"])) {
				if ($_SESSION["login"] == "failed") {
					// User tried to login and it failed
					echo "<button id='login'>Login</button>";
				}
				else if ($_SESSION["login"] == "logged in") {
					// Login successful
					echo "<div id='accountcontrol'>" . 
					"<p id='welcomeuser'>Welcome, " . $_SESSION["userTag"] . "</p>" .
					"<form class='hidden' method='post' action='php/updateuser.php'>" .
					"<label class='hidden'>Username</label>" . 
					"<input class='hidden' name='username' id='change_username' value='" . $_SESSION["username"] . "' />" .
					"<label class='hidden'>User Tag</label>" . 
					"<input class='hidden' name='usertag' id='change_usertag' value='" . $_SESSION["userTag"] . "' />" . 
					"<label class='extra_hidden'>New Password</label>" .
					"<input class='extra_hidden' name='password' type='password' />" .
					"<label class='extra_hidden'>Repeat Password</label>" .
					"<input class='extra_hidden' name='passwordR' type='password' />" .
					"<input class='hidden' type='submit' value='Change' />" .
					"</form>" .
					"<label class='hidden' id='check_label'>Change Password</label>" .
					"<input class='hidden' type='checkbox' id='check' />" . 
					"</div>";
				}
			} else {
				// User has not logged in yet
				echo "<button id='login'>Login</button>";
			}
		?>
		
		<section id="loginpage">
			<h1>Login Page</h1>
			<button id="loginBack">Back</button>
			<h2>For Returning Users</h2>
			<form method="post" action="php/returnuser.php">
				<label id="usernameLabel" for="username">Username</label>
				<input type="text" name="username" id="username" required="required" />
				<label id="passwordLabel" for="password">Password</label>
				<input type="password" name="password" id="password" required="required" />
				<input type="submit" class="submit" value="Login" />
			</form>
			
			<h2>For New Users</h2>
			<form method="post" action="php/newuser.php">
				<label id="usernameLabel" for="username">Username</label>
				<input type="text" name="username" id="username" pattern=".{3,25}" title="Must be between 3 to 25 characters in length" required />
				<label id="passwordLabel" for="password">Password</label>
				<input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,25}" title="Must contain at least one number, one uppercase letter, one lowercase letter, and be 8 to 25 characters" required />
				<label id="usertagLabel" for="usertag">User Tag Name</label>
				<input type="text" name="usertag" id="usertag" pattern=".{3,25}" title="Must be between 3 to 25 characters in length" required />
				<input type="submit" class="submit" value="Create Account" />
			</form>
		</section>
		
		<div id='message'>
			<?php
				$updated_login = false;
				if (isset($_SESSION["update"])) {
					if ($_SESSION["update"] == "updated") {
						echo "Update Successful";
						$updated_login = true;
					}
					else if ($_SESSION["update"] == "failed") {
						echo "Update Failed";
					}
				}
				
				if (isset($_SESSION["login"])) {
					if ($updated_login) {
						echo " & ";
					}
					if ($_SESSION["login"] == "logged in") {
						echo "Logged In";
					}
					else if ($_SESSION["login"] == "failed") {
						echo "Login Failed";
					}
				}
			?>
		</div>