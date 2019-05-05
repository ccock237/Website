<?php
	// Start the session
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<!--
			Name:			Clayton's Website Home
			Date:			10/9/17
			Programmer:		Clayton Cockrell
			
			Description:	This webpage is the Home section of the website. It displays information about the website
							and gives the user access to the other three sections of the website (Profile, Learn, and
							Games). This section also contains the login page. Please enjoy using the website.
							
			Filenames:		HTML	home.php
			
							CSS		css/
									home_styles.css
									
							JS		js/
									jquery.js
									
							Images	img/
									header.png
									background.png
									info.png
		-->
		<title>Clayton Profile</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="css/profile.css" rel="stylesheet" type="text/css" />
		<link href="css/profile_m.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="js/profile.js" type="text/javascript"></script>
	</head>
	
	<body>
		<header>Profile</header>
		<p id="info">
			This is the profile page. Information about the web developer of this website can be seen here.
			Below are pages of skills and programs that they have written. Click the desired page to go to
			the web page with that information. Scroll the pages up to see more pages. Click 
			<a id="home" href="../Home/">here</a> to go back home.
		</p>
		
		<a id="email" href="mailto:claytoncockrell@gmail.com"><div id="sendemail">Email Me</div></a>
		
		<div id="pages">
			<a href="bio_m.html">
				<section class="page">
					<h1>Biography</h1>
					<p>
						Click me to go to the developers biography.
					</p>
				</section>
			</a>
			
			<a href="projecttracker_m.html">
				<section class="page">
					<h1>Project Tracker</h1>
					<p>
						In college, I took a course of the Software Development Cycle. The whole class was sectioned
						into groups of four to five. Each group was required to develop software through the Software
						Development Cycle. I was on a group of four and this is what we came up with.
					</p>
				</section>
			</a>
		</div>
	</body>
</html>