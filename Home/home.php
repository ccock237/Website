<?php session_start(); ?>

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
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="../css/base.css" rel="stylesheet" type="text/css" />
		<link href="../css/home.css" rel="stylesheet" type="text/css" />
		<script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="../js/home.js" type="text/javascript"></script>
		<?php include("../php/file.php"); ?>
	</head>
	<body>
		<header>
			<img id="header_img" src="../img/header.png" alt="CDC Programming" />
			<ul id="header_tabs">
				<li class="current_doc"><a href="../Home">Home</a></li>
				<li><a href="../Games">Games</a></li>
				<li><a href="../Learn">Learn</a></li>
				<li><a href="../About">About</a></li>
				<li><a href="../Profile">Profile</a></li>
			</ul>
		</header>
		
		<p id="welcome">
			Welcome to CDC Programming. The website is divided into four sections each
			accessible by four Tabs above. Clicking the blocks below will give basic
			information about the section.
		</p>
		
		<ul id='tab_list'>
			<li id="home" class="tabs">
				<h1>Home</h1>
			</li>
			<li id="games" class="tabs">
				<h1>Games</h1>
			</li>
			<li id="learn" class="tabs">
				<h1>Learn</h1>
			</li>
			<li id="about" class="tabs">
				<h1>About</h1>
			</li>
		</ul>
		
		<aside id="homeinfo">
			<h1>Home Section</h1>
			<?php
				$newfile = new MyFile();
				$newfile->FileRead("../datafiles/home_info.txt");
			?>
		</aside>
		
		<aside id="aboutinfo">
			<h1>Profile Section</h1>
			<?php
				$newfile = new MyFile();
				$newfile->FileRead("../datafiles/profile_info.txt");
			?>
		</aside>
		
		<aside id="learninfo">
			<h1>Learn Section</h1>
			<?php
				$newfile = new MyFile();
				$newfile->FileRead("../datafiles/learn_info.txt");
			?>
		</aside>
		
		<aside id="gamesinfo">
			<h1>Games Section</h1>
			<?php
				$newfile = new MyFile();
				$newfile->FileRead("../datafiles/games_info.txt");
			?>
		</aside>
	</body>
</html>