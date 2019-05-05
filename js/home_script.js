/*
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
*/

window.onload = setTimeout(SetupDocument, 500);

// This array contains the information about each main tab and will display when hovered over.
var headerTabInfo = ["The Home Tab takes you to this websites home page. The home page gives an overview of the website.",
					"The Profile Tab takes you to the profile of the website designer. A biography and resume are present here.",
					"The Learn Tab takes you to the learning center of the website. You can learn all kinds of things here.",
					"The Game Tab takes you to the gaming center of the website. new games are created and uploaded, so check it out."];

/*	SetupDocument()
		This function sets all four tabs of the document to handle the mouseout
		and mouseover events. These events will run other functions that will
		display the tooltip text for each tab.
*/
function SetupDocument() {	
	if (window.innerWidth < window.innerHeight) window.location.href = "home_mobile.html";
	if (screen.width < screen.height) window.location.href = "home_mobile.html";
	// Get the tabs
	var sectionTabs = document.getElementsByClassName("tabs");
	// Set mouseout and mouseover events to the tabs 
	for (var i = 0; i < sectionTabs.length; i++) {
		sectionTabs[i].addEventListener("mouseout", HideTooltip);
		sectionTabs[i].addEventListener("mouseover", DisplayToolti);
	}
}

/*	DisplayTooltip()
		This function creates a span element that is used as the tooltip for the tab.
		The mousemove event listener is added to the tab element that called the
		function. This gives the tooltip the ability to follow the mouse while moving
		through the tab element. The actually text of the tooltip is also determined
		in this function.		
*/
function DisplayToolt() {
	// Create the span element and set the class name
	var spanTooltip = document.createElement("span");
	spanTooltip.className = "tooltip";
	
	// Add the mousemove event listener to the tab element that called the function
	this.addEventListener("mousemove", ChangeTooltipPosition);
	
	// Determine the text displayed in the tooltip
	var headerTabInfoId = 0;
	if (this.id == "home") headerTabInfoId = 0;
	else if (this.id == "profile") headerTabInfoId = 1;
	else if (this.id == "learn") headerTabInfoId = 2;
	else if (this.id == "games") headerTabInfoId = 3;
	
	// Set the text of the tooltip to the determined string
	spanTooltip.innerHTML = headerTabInfo[headerTabInfoId];
	this.appendChild(spanTooltip);
}

/*	HideTooltip()
		This function loops through all the elements with "tooltip" as their class name
		and sets the visibility to "hidden".
*/
function HideTooltip() {
	var tooltipHide = document.getElementsByClassName("tooltip");
	for (var i = 0; i < tooltipHide.length; i++) {
		tooltipHide[i].style.visibility = "hidden";
	}
}

/*	ChangeTooltipPosition()
		This function moves the tooltip element to a position based on the mouse
		location. This allows the tooltip to follow the mouse movement inside a tab
		element.
*/
function ChangeTooltipPosition() {
	// Get all the elements with class name "tooltip" and set their position
	var tooltipNode = document.getElementsByClassName("tooltip");
	for (var i = 0; i < tooltipNode.length; i++) {
		tooltipNode[i].style.left = (event.clientX / 2) + "px";
		tooltipNode[i].style.top = (event.clientY + 60) + "px";
	}
}