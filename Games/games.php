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
		<title>Clayton Games</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="js/games_script.js" type="text/javascript"></script>
		<link href="css/games_styles.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="php">
			<?PHP
				function Write($filename, $textToWrite) {
					$file = fopen($filename, "a");
					fwrite($file, $textToWrite);
					fclose($file);
				}
	
				function Read($filename) {
					$i = 0;
					$lines = array();
					$file = file($filename);
					foreach ($file as $line) {
						echo $line;
						$lines[$i] = $line;
						$i++;
					}
					return $lines;
				}
				Read('loading/games.txt');
			?>
		</div>
		
		<h1 id="main">Games</h1>
		
		<section id="display">
		</section>
		
		<a href="../Home/home.php"><button id="home">Home</button></a>
	</body>
</html>