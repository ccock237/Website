window.onload = document.addEventListener("mousemove", Setup);

var backX = [];
var backY = [];

function Setup() {
	document.addEventListener("click", Stop);
	var title = document.getElementById("gameTitle");
	title.innerHTML = "3D Game Test";
	
	backX[0] = event.clientX - 100;
	backY[0] = event.client - 50;
	backX[1] = event.clientX  - 100;
	backY[1] = event.clientY;
	backX[2] = event.clientX;
	backY[2] = event.clientY - 50;
	
	var posY = [event.clientY, event.clientY + 50, event.clientY + 50, event.clientY];
	var posX = [event.clientX, event.clientX, event.clientX + 100, event.clientX + 100];
	
	var pos2X = [event.clientX, event.clientX - 100, event.clientX - 100, event.clientX];
	var pos2Y = [event.clientY, event.clientY - 50, event.clientY, event.clientY + 50];
	
	var pos3X = [event.clientX, event.clientX - 100, event.clientX, event.clientX + 100];
	var pos3Y = [event.clientY, event.clientY - 50, event.clientY - 50, event.clientY];
	
	DrawBackground("black");
	DrawPolygon(posX, posY, 0, "white", "black", "obj1");
	DrawPolygon(pos2X, pos2Y, 0, "white", "black", "obj2");
	DrawPolygon(pos3X, pos3Y, 0, "white", "black", "obj3");
	
	//Rotate("Roll", "obj1", 90, 0);
	
	/*
	var screen = document.getElementById("screen");
	screen.addEventListener("mousemove", function() {
		DrawFromCenter(event.clientX, event.clientY - 100, posX, posY, "green", "black");
	});
	
	
	var posX = SetPositionsX(50, 100, 100, 50);
	var posY = SetPositionsY(50, 50, 100, 100);
	
	DrawPolygon(posX, posY, 0, "green", "black");
	
	CreateObject(200, 200, 0, posX, posY, 0);
	
	//RotateRoll(posX, posY, 0, 0, 45);
	
	//DrawPolygon(posX, posY, 0, "green", "black");
	*/
}

function Stop() {
	document.removeEventListener("mousemove", Setup);
	document.addEventListener("mousemove", Stop);
	
		var posY = [event.clientY, event.clientY + 50, event.clientY + 50, event.clientY];
		var posX = [event.clientX, event.clientX, event.clientX + 100, event.clientX + 100];
	
		var pos2X = [event.clientX, backX[0], backX[1], event.clientX];
		var pos2Y = [event.clientY, backY[0], backY[1], event.clientY + 50];
	
		var pos3X = [event.clientX, event.clientX - 100, backX[2], event.clientX + 100];
		var pos3Y = [event.clientY, event.clientY - 50, backY[2], event.clientY];
	
		DrawBackground("black");
		DrawPolygon(posX, posY, 0, "white", "black", "obj1");
		DrawPolygon(pos2X, pos2Y, 0, "white", "black", "obj2");
		DrawPolygon(pos3X, pos3Y, 0, "white", "black", "obj3");
}

function DrawBackground(color) {
	var screen = document.getElementById("screen");
	screen.style.backgroundColor = color;
	screen.innerHTML = "";
}

function Rotate(type, objID, currentDeg, newDeg) {
	if (type == "Roll") {
		var object = document.getElementById(objID);
		var points = object.getAttribute("points");
		
		for (var i = 0; i < points.length; i++) {
			
		}
		
		if (currentDeg == "90") {
			
		}
		
		
		
		
		
		
		
		var object = document.getElementById(objID);
		object.setAttribute("points", points);
	}
}

function CreateObject(setX, setY, setZ, pointsX, pointsY, pointsZ) {
	var polygonX = [];
	var polygonY = [];
	var polygonZ = [];
	
	for (var i = 0; i < pointsX.length; i++) {
		polygonX[i] = setX + pointsX[i];
	}
	
	for (var i = 0; i < pointsY.length; i++) {
		polygonY[i] = setY + pointsY[i];
	}
	
	for (var i = 0; i < pointsZ.length; i++) {
		polygonZ[i] = setZ + pointsZ[i];
	}
	
	DrawPolygon(polygonX, polygonY, polygonZ, "white", "black");
}

function RotateRoll(objX, objY, objZ, currentDeg, degrees) {
	var center = GetCenter(objX, objY);
	var rightSide = [];
	var leftSide = [];
	var topSide = [];
	var bottomSide = [];
	var j = 0;
	var k = 0;
	
	for (var i = 0; i < objX.length; i++) {
		if (objX[i] > center[0]) {
			rightSide[j] = i;
			alert("rightSide " + rightSide[j]);
			j++;
		}
		else if (objX[i] < center[0]) {
			leftSide[k] = i;
			alert("leftSide " + leftSide[k]);
			k++;
		}
	}
	
	j = 0;
	k = 0;
	
	for (var i = 0; i < objY.length; i++) {
		if (objY[i] > center[1]) {
			bottomSide[j] = i;
			alert("bottomSide " + bottomSide[j]);
			j++;
		}
		else if (objY[i] < center[1]) {
			topSide[k] = i;
			alert("topSide " + topSide[k]);
			k++;
		}
	}
	
	if (degrees == 45) {
		for (var i = 0; i < rightSide.length; i++) {
			objX[rightSide[i]] *= (Math.sqrt(2) / 2);
			alert("objX " + objX[rightSide[i]]);
		}
		
		for (var i = 0; i < leftSide.length; i++) {
			objX[leftSide[i]] = (center[0] - objX[leftSide[i]]) * (Math.sqrt(2) / 2);
			alert("objX " + objX[leftSide[i]]);
		}
		
		for (var i = 0; i < topSide.length; i++) {
			objY[topSide[i]] *= (-Math.sqrt(2) / 2);
			alert("objY " + objY[topSide[i]]);
		}
		
		for (var i = 0; i < bottomSide.length; i++) {
			objY[bottomSide[i]] *= (Math.sqrt(2) / 2);
			alert("objY " + objY[bottomSide[i]]);
		}
	}
}

function RotatePitch(objX, objY) {
	
}

function RotateYaw(objX, objY) {
	
}

function DrawPolygon(positionX, positionY, positionZ, fillColor, strokeColor, id) {
	var screen = document.getElementById("screen"); 
	var polygon = "<polygon points='";
	
	for (var i = 0; i < positionX.length - 1; i++) {
		polygon += positionX[i] + "," + positionY[i] + " ";
	}
	polygon += positionX[i] + "," + positionY[i] + "' id='" + id + "' style='fill:" + fillColor + ";stroke:" + strokeColor + ";stroke-width:1' />";
	//alert(polygon);
	screen.innerHTML += polygon;
}

function SetPositionsX() {
	var x_positions = [];
	for (var i = 0; i < arguments.length; i++) {
		x_positions[i] = arguments[i];
	}
	return x_positions;
}

function SetPositionsY() {
	var y_positions = [];
	for (var i = 0; i < arguments.length; i++) {
		y_positions[i] = arguments[i];
	}
	return y_positions;
}

function DrawFromCenter(centerX, centerY, pointsX, pointsY, fillColor, strokeColor) {
	var center = GetCenter(pointsX, pointsY);
	AddTo(pointsX, centerX - center[0]);
	AddTo(pointsY, centerY - center[1]);
	
	DrawPolygon(pointsX, pointsY, fillColor, strokeColor);
}

function AddTo(fromVal, toVal) {
	for (var i = 0; i < fromVal.length; i++) {
		fromVal[i] += toVal;
	}
}

function GetCenter(x_pos, y_pos) {
	var x_middle = 0;
	var x_left = 0;
	var x_right = 0;
	var y_middle = 0;
	var y_top = 0;
	var y_bottom = 0;
	
	x_left = x_pos[0];
	x_right = x_pos[0];
	for (var i = 1; i < x_pos.length; i++) {
		if (x_left > x_pos[i]) {
			x_left = x_pos[i];
		}
		if (x_right < x_pos[i]) {
			x_right = x_pos[i];
		}
	}
	
	y_top = y_pos[0];
	y_bottom = y_pos[0];
	for (var i = 1; i < y_pos.length; i++) {
		if (y_top > y_pos[i]) {
			y_top = y_pos[i];
		}
		if (y_bottom < y_pos[i]) {
			y_bottom = y_pos[i];
		}
	}
	
	x_middle = (x_left + x_right) / 2;
	y_middle = (y_top + y_bottom) / 2;
	
	return [x_middle, y_middle];
}