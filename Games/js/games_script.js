document.onload = setTimeout(GetGames, 50);

function GetGames() {
	var php = document.getElementById("php");
	php.style.display = "none";
	
	var needsTrim = php.innerHTML
	needsTrim = Trim(needsTrim);
	
	var game_title = needsTrim.split("\n");
	var game_file = [];
	
	for (var i = 0; i < game_title.length; i++) {
		game_file[i] = RemoveSpaces(game_title[i]);
	}
	
	var divisor = 0;
	var divisor2 = 0;
	var perRow = 0;
	
	if (window.innerHeight > window.innerWidth) {
		// Mobile Device
		divisor = 4.3;
		divisor2 = 7.5;
		perRow = 3;
	}
	else if (((window.innerHeight - window.innerWidth) <= -1) && ((window.innerHeight - window.innerWidth) >= -100)) {
		// Tablet Device
		divisor = 7.5;
		divisor2 = 7;
		perRow = 5;
	}
	else {
		// PC Device
		divisor = 7.5;
		divisor2 = 5;
		perRow = 5;
	}
	
	var display = document.getElementById("display");
	var i = 0;
	
	// Row starter
	for (i = 0; i < perRow; i++) {
		if (i < game_title.length) display.innerHTML += "<div class='row1' id='" + game_file[i] + "'><img src='img/" + game_file[i] + ".jpg' /><p>" + game_title[i] + "</p></div>";
	}
	// Additional Rows
	for (i = i; i < game_title.length; i++) {
		display.innerHTML += "<div class='row' onclick=''><img /><p></p></div>";
	}
	
	var topLevel = document.getElementsByClassName("row1");
	var rows = document.getElementsByClassName("row");
	
	for (var j = 0; j < topLevel.length; j++) {
		topLevel[j].addEventListener("click", Select);
		topLevel[j].style.height = window.innerHeight / divisor2;
		topLevel[j].style.width = window.innerWidth / divisor;
	}
	
	for (var j = 0; j < rows.length; j++) {
		rows[j].addEventListener("click", Select);
		rows[j].style.height = window.innerHeight / divisor2;
		rows[j].style.width = window.innerWidth / divisor;
	}
	
}

function RemoveSpaces(string) {
	var words = string.split(" ");
	var removed = "";
	for (var i = 0; i < words.length; i++) {
		removed += words[i];
	}
	return removed;
}

function Trim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}

function Select() {
	var game = this.id;
	document.cookie = "load=" + game;
	window.location.href = "gameStage.html";
}