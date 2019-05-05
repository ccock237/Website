<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Learn</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="../css/base.css" rel="stylesheet" type="text/css" />
		<link href="../css/learn.css" rel="stylesheet" type="text/css" />
		<script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="../js/learn.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<img id="header_img" src="../img/header.png" alt="CDC Programming" />
			<ul id="header_tabs">
				<li><a href="../Home">Home</a></li>
				<li><a href="../Games">Games</a></li>
				<li class="current_doc"><a href="../Learn">Learn</a></li>
				<li><a href="../About">About</a></li>
				<li><a href="../Profile">Profile</a></li>
			</ul>
		</header>
		
		<table>
			<tr>
				<th>About</th>
				<th>Language</th>
			</tr>
			<tr>
				<td>
					Welcome to the learn webpage. Here, you can learn about many common programming
					languages that are used today. You will need an account to access all the languages.
					To create an account, click the <b>Sign In</b> button at the top right of the screen.
					It will take you to a page where you can create an account or sign in. When you are signed
					in, select a language to the right to start learning about the programming language.
				</td>
				<td>
					<select name="language" size="7">
					  <option>HTML</option>
					  <option>CSS</option>
					  <option>Javascript</option>
					  <option>PHP</option>
					  <option>Java</option>
					  <option>C</option>
					  <option>C++</option>
					  <option>C#</option>
					  <option>Python</option>
					</select>
				</td>
			</tr>
		</table>
	</body>
</html>