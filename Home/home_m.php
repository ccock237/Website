<!DOCTYPE html>
<html>
	<head>
		<!--
			Name:			Clayton's Website Home
			Date:			7/29/17
			Programmer:		Clayton Cockrell
			
			Description:	This webpage is the Home section of the website. It displays information about the website
							and gives the user access to the other three sections of the website (Profile, Lean, and
							Games). Please enjoy using the website.
							
			Filenames:		HTML	home.html
			
							CSS		css/
									home_styles.css
									
							JS		js/
									home_script.css
									
							Images	img/
									header.png
									background.png
		-->
		<title>Clayton Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="css/home_m.css" rel="stylesheet" type="text/css" />
		<script src="js/home_mobile_script.js" type="text/javascript"></script>
	</head>
	
	<body>
		<header>
			<img src="img/header.png" />
		</header>
		
		<p id="welcome">
			Welcome to Clayton Cockrell's Website. The website is divided into four sections each
			accessible by four Tabs below. Hovering over the Tabs will give basic information about the section.
			Use these Tabs to view the different sections.
		</p>
		
		<ul>
			<a href="">
				<li id="home" class="tabs">
					<h1 id="Homeh1">Home</h1>
				</li>
			</a>
			<a href="../Profile/">
				<li id="profile" class="tabs">
					<h1>Profile</h1>
				</li>
			</a>
			<a href="../Learn/">
				<li id="learn" class="tabs">
					<h1>Learn</h1>
				</li>
			</a>
			<a href="../Games/">
				<li id="games" class="tabs">
					<h1>Games</h1>
				</li>
			</a>
		</ul>
		
	</body>
</html>