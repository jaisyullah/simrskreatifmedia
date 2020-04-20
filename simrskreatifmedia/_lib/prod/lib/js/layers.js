// PHP Layers Menu 1.1.3 (unstable) (C) 2001, 2002 Marco Pratesi <pratesi@telug.it>

DOM = (document.getElementById) ? 1 : 0;
NS4 = (document.layers) ? 1 : 0;
IE4 = (document.all) ? 1 : 0;
var loaded = 0;	// to avoid stupid errors of Microsoft browsers
var movedlayers = 0;
Opera5 = (navigator.userAgent.indexOf("Opera 5") > -1 || navigator.userAgent.indexOf("Opera/5") > -1 || navigator.userAgent.indexOf("Opera 6") > -1 || navigator.userAgent.indexOf("Opera/6") > -1) ? 1 : 0;

// it works with NS4, Mozilla, NS6, Opera 5 and 6, IE
currentY = -1;
function grabMouse(e) {
	if ((DOM && !IE4) || Opera5) {
		currentY = e.clientY;
	} else if (NS4) {
		currentY = e.pageY;
	} else {
//		currentY = event.y;
		currentY = event.clientY;
	}
	if (DOM && !IE4 && !Opera5) {
		currentY += window.pageYOffset;
	} else if (IE4 && DOM && !Opera5) {
		currentY += document.body.scrollTop;
	}
}
if ((DOM || NS4) && !IE4) {
	document.captureEvents(Event.MOUSEDOWN | Event.MOUSEMOVE);
}
document.onmousemove = grabMouse;

function popUp(menuName,on) {
	if (loaded) {
		if (!movedlayers) {
			moveLayers();
			movedlayers = 1;
		}

		if (on) {
//			moveLayers();
			if (DOM) {
				document.getElementById(menuName).style.visibility = "visible";
			} else if (NS4) {
				document.layers[menuName].visibility = "show";
			} else {
				document.all[menuName].style.visibility = "visible";
			}
		} else {
			if (DOM) {
				document.getElementById(menuName).style.visibility = "hidden";
			} else if (NS4) {
				document.layers[menuName].visibility = "hide";
			} else {
				document.all[menuName].style.visibility = "hidden";
			}
		}
	}
}

function setleft(layer,x) {
	if (DOM) {
		document.getElementById(layer).style.left = x;
	} else if (NS4) {
		document.layers[layer].left = x;
	} else {
		document.all[layer].style.pixelLeft = x;
	}
}

function getoffsetleft(layer) {
	var value = 0;
	if (DOM) {	// Mozilla, Konqueror 2.2.  Opera 5 and 6.  IE >= 5.0.
			// timing problems with Konqueror 2.1 ?
		object = document.getElementById(layer);
		value = object.offsetLeft;
//alert (object.tagName + " --- " + object.offsetLeft);
		while (object.tagName != "BODY") {
			object = object.offsetParent;
//alert (object.tagName + " --- " + object.offsetLeft);
			value += object.offsetLeft;
		}
	} else if (NS4) {
		value = document.layers[layer].pageX;
	} else {	// IE4 IS SIMPLY A BASTARD !!!
		layer = "IE4" + layer;
		object = document.all[layer];
		value = object.offsetLeft;
		while (object.tagName != "BODY") {
			object = object.offsetParent;
			value += object.offsetLeft;
		}
	}
	return (value);
}

function settop(layer,y) {
	if (DOM) {
		document.getElementById(layer).style.top = y;
	} else if (NS4) {
		document.layers[layer].top = y;
	} else {
		document.all[layer].style.pixelTop = y;
	}
}

function getoffsettop(layer) {
// IE 5.5 and 6.0 behaviour with this function is really strange:
// in some cases, they return a really too large value...
// ... after all, IE is buggy, nothing new
	var value = 0;
	if (DOM) {
		object = document.getElementById(layer);
		value = object.offsetTop;
		while (object.tagName != "BODY") {
			object = object.offsetParent;
			value += object.offsetTop;
		}
	} else if (NS4) {
		value = document.layers[layer].pageY;
	} else {	// IE4 IS SIMPLY A BASTARD !!!
		layer = "IE4" + layer;
		object = document.all[layer];
		value = object.offsetTop;
		while (object.tagName != "BODY") {
			object = object.offsetParent;
			value += object.offsetTop;
		}
	}
	return (value);
}

function setwidth(layer,w) {
	if (DOM) {
		document.getElementById(layer).style.width = w;
	} else if (NS4) {
//		document.layers[layer].width = w;
	} else {
		document.all[layer].style.pixelWidth = w;
	}
}

function getoffsetwidth(layer) {
// undefined on Konqueror 2.1
	var value = 0;
	if (DOM && !Opera5) {
		value = document.getElementById(layer).offsetWidth;
		if (isNaN(value))
			value = 0;
	} else if (NS4) {
		value = document.layers[layer].document.width;
	} else if (Opera5) {
		value = document.getElementById(layer).style.pixelWidth;
	} else {	// IE4 IS SIMPLY A BASTARD !!!
		layer = "IE4" + layer;
		value = document.all[layer].offsetWidth;
	}
	return (value);
}

function setheight(layer,w) {	// unused, not tested
	if (DOM) {
		document.getElementById(layer).style.height = w;
	} else if (NS4) {
//		document.layers[layer].height = w;
	} else {
		document.all[layer].style.pixelHeight = w;
	}
}

function getoffsetheight(layer) {
// undefined on Konqueror 2.1
	var value = 0;
	if (DOM && !Opera5) {
		value = document.getElementById(layer).offsetHeight;
		if (isNaN(value))
			value = 25;
	} else if (NS4) {
		value = document.layers[layer].document.height;
	} else if (Opera5) {
		value = document.getElementById(layer).style.pixelHeight;
	} else {	// IE4 IS SIMPLY A BASTARD !!!
		layer = "IE4" + layer;
		value = document.all[layer].offsetHeight;
	}
	return (value);
}


function moveLayerY(menuName, ordinata, ordinata_margin) {
if (loaded) {
if (!movedlayers) {
	moveLayers();
	movedlayers = 1;
}
//alert (ordinata);
// Konqueror: ordinata = -1 according to the initialization currentY = -1
// Opera: isNaN(ordinata), currentY is NaN, it seems that Opera ignores the initialization currentY = -1
if (ordinata != -1 && !isNaN(ordinata)) {	// The browser has detected the mouse position
if (DOM) {
// attenzione a "px" !!!
	appoggio = parseInt(document.getElementById(menuName).style.top);
	if (isNaN(appoggio)) appoggio = 0;
	if (Math.abs(appoggio + ordinata_margin - ordinata) > thresholdY)
		document.getElementById(menuName).style.top = ordinata - ordinata_margin;
} else if (NS4) {
	if (Math.abs(document.layers[menuName].top + ordinata_margin - ordinata) > thresholdY)
		document.layers[menuName].top = ordinata - ordinata_margin;
} else {
	if (Math.abs(document.all[menuName].style.pixelTop + ordinata_margin - ordinata) > thresholdY)
		document.all[menuName].style.pixelTop = ordinata - ordinata_margin;
}
}
}
}

