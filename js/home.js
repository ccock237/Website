$(document).ready(function () {	
	$(".tabs").hover(TabHover, TabUnhover);
	$(".tabs").click(MoreInfo);
});

function TabHover() {
	$(this).children().css("color", "white");
}

function TabUnhover() {
	$(this).children().css("color", "black");
}

function MoreInfo() {
	// Get the ID of the aside with the information
	var infoID = "#" + ($(this).attr("id")) + "info";
	
	// Create a div element
	var messageBox = "<div id='messagebox'><img id='exit' src='../img/exit.jpg' alt='exit' />" + $(infoID).html() + "</div>";
	$("body").append(messageBox);
	
	$("#messagebox").css({
		"position" : "absolute",
		"top" : "10vh",
		"left" : "10vw",
		"background-color" : "white",
		"border" : "solid 2px black",
		"width" : "80vw",
		"height" : "80vh",
		"z-index" : "99",
		"font-size" : "1.5vw",
		"text-align" : "center"
	});
	
	$("#exit").css({
		"position" : "absolute",
		"top" : "0vh",
		"left" : "0vw",
		"width" : "5vw",
		"height" : "3vw"
	});
	
	$("#exit").hover(function() {
		$(this).css("cursor", "pointer");
	}, function() {
		$(this).css("cursor", "default");
	});
	
	$("#exit").click(BackToHome);
}

function BackToHome() {
	location.reload();
}