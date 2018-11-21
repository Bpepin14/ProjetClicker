var myCanvas = document.getElementById('myCanvas'),
canDraw = myCanvas.getContext('2d');
//Create vars to control the width and height of the canvas
var maxX = innerWidth;
var maxY = innerHeight;
//This function sets the maxX and maxY values to the max width and height of the window
var resizeFunc = function(){
    maxX = window.innerWidth;
    maxY = window.innerHeight;
    document.getElementById('myCanvas').width = maxX;
    document.getElementById('myCanvas').height = maxY;
};

//Size the canvas to the screen on load
onload = resizeFunc;
//Reload the screen, resulting in a new skyline
onresize = function(){
  location = location;
};

//Create starfield array
//First define star prototype
var Star = function(x,y) {
    this.x = x;
    this.y = y;
}
//Now create an empty array and loop through it to fill it with Star objects
var starArray = [];
for (var i = 0; starArray.length < 260; i++) {
    var myX = Math.ceil(Math.random()*maxX),
    myY = Math.ceil(Math.random()*maxY);
    starArray.push(new Star (myX,myY));
}

//Create building array
//First define building prototype
var Building = function(x,y,w,h,winHeight,triTop) {
    this.x = x;
    this.y = y;
    this.w = w;
    this.h = h;
    this.winHeight = winHeight;
    this.triTop = triTop;
}

var totalWidth = 0,  //Define totalWidth variable to stop creating buildings once the total width is greater than maxX
towerNum = 0,        //towerNum will limit the number of red-dot towers that can be created
lastBuildHeight = 0, //lastBuildHeight will ensure that two buildings of the same height are not adjacent to one another
buildingArray = []; //Now create an empty array and loop through it to fill it with Building objects
for (var i = 0; totalWidth < maxX; i++) {
    var myWinHeight = (Math.random() < 0.1) ? 20 : 10 ,
    myH = Math.ceil(Math.random() * 15) * myWinHeight,
    myW,
    myX,
    myY,
    myTop;
    //Check if height needs to be recalculated
    if (myH === lastBuildHeight) {
        myH = Math.ceil(Math.random() * 15) * myWinHeight;
    }
    myW = Math.ceil(Math.random() * 10) * 10;
    //Check if width needs to be recalculated
    if (myW === 10 && towerNum < 3) {
        myW = Math.ceil(Math.random() * 10) * 10;
    }
    if (myW <= 10) {
        myH += 40;
        towerNum += 1;
    }
    myX = totalWidth;
    myY = maxY - myH;
    myTop = (Math.random() < 0.1 && myW > 10) ? 1 : 0;
    buildingArray.push(new Building (myX,myY,myW,myH,myWinHeight,myTop));
    totalWidth += myW;
    lastBuildHeight = myH;
}

//Create window array
//First define window prototype
var Windowlight = function (x,y,lit,tall) {
    this.x = x;
    this.y = y;
    this.lit = lit;
    this.tall = tall;
}

//Create an array of windows and fill it
var windowLightArray = [];
for (var i = 0; i < buildingArray.length; i++) {
    if (buildingArray[i].w > 10) {
        for (var j = 0; j < buildingArray[i].w; j += 10) {
            for (var k = 0; k < buildingArray[i].h; k += buildingArray[i].winHeight) {
                if (Math.random() < 0.1) {
                    var myX = (buildingArray[i].x + j) + 2,
                    myY = (buildingArray[i].y + k) + 2;
                    windowLightArray.push(new Windowlight(myX, myY, 1, buildingArray[i].winHeight));
                }
                else {
                    var myX = (buildingArray[i].x + j) + 2,
                    myY = (buildingArray[i].y + k) + 2;
                    windowLightArray.push(new Windowlight(myX, myY, 0, buildingArray[i].winHeight));
                }
            }
        }
    }
}

//Create a prototype for red dots
var RedDot = function(x,y,myCounter) {
    this.x = x;
    this.y = y;
    this.myCounter = Math.ceil(Math.random() * 50);
}
//Create an array of red dots for towers of width 10 or less
var dotArray = [];

for (var i = 0; i < buildingArray.length; i++) {
    if (buildingArray[i].w === 10) {
        var myX = buildingArray[i].x + 5,
        myY = buildingArray[i].y - 5;
        dotArray.push(new RedDot (myX,myY));
    }
}

//Create the moon
var moonX = Math.ceil(Math.random() * (maxX / 2)) + 50,
moonY = Math.ceil(Math.random() * (maxY / 3)) + 50,
moonDir = (Math.round(Math.random()) < 0.5) ? -0.05 : 0.05,
    
//Create the shooting star
shootingStarX = Math.ceil(Math.random() * maxX),
shootingStarY = -10,
shootingStarDir = 0.5,
//Set variables to control the background color
bgTop = moonY / maxY,
fadeOut = 0;
    
function draw() {
    canDraw.clearRect(0,0,maxX,maxY);
    //Draw the backgrounds
    var bgGrad = canDraw.createRadialGradient(moonX,moonY,0,moonX,moonY,innerWidth);
    bgGrad.addColorStop(0, 'rgb(30,30,70)');
    bgGrad.addColorStop(1, 'rgb(5,5,15)');
    canDraw.fillStyle = bgGrad;
    canDraw.fillRect(0,0,maxX,maxY);
  	bgTop = moonY / maxY;
    
    //Draw starfield
    for (var i = 0; i < starArray.length; i++) {
        canDraw.globalAlpha = 1 - (Math.random()/1.5);
        canDraw.fillStyle = "#FAF";
        canDraw.fillRect(starArray[i].x,starArray[i].y,1,1);
    }
    canDraw.globalAlpha = 1;
    
    //Shooting star drawing and logic
    canDraw.fillStyle = "#FFF";
    canDraw.beginPath();
    canDraw.arc(shootingStarX, shootingStarY, 1, 0, Math.PI*2);
    canDraw.fill();
  	canDraw.beginPath();
    canDraw.arc(shootingStarX - 5, shootingStarY - 5, 0.66, 0, Math.PI*2);
    canDraw.fill();
  	canDraw.beginPath();
    canDraw.arc(shootingStarX - 10, shootingStarY - 10, 0.5, 0, Math.PI*2);
    canDraw.fill();
    if (shootingStarX > maxX + 50 || shootingStarX < -20 || shootingStarY > maxY + 50) {
        if (Math.random() < 0.0015) {
            shootingStarX = Math.ceil(Math.random() * maxX);
            shootingStarY = -1;
        }
    }
    else {
        shootingStarX += 7;
        shootingStarY += 7;
    }
    
    //Draw moon and move it
    var moonGrad = canDraw.createRadialGradient(moonX,moonY,0,moonX,moonY,40);
    moonGrad.addColorStop(0.88, 'rgba(248,200,255,1)');
    moonGrad.addColorStop(1, 'rgba(255,255,255,0)');
    canDraw.fillStyle = moonGrad;
    canDraw.beginPath();
    canDraw.arc(moonX,moonY,40,0,Math.PI*2,0)
    canDraw.fill();
    moonX += moonDir;
    if (moonY > maxY + 50 || moonX > maxX + 50 || moonX < -42) {
        moonY = moonY;
    }
    else {
        moonY += 0.05;
    }
    
    //Draw buildings - dynamic foreground
    for (var k = 0; k < buildingArray.length; k++) {
        canDraw.fillStyle = "#000";
        canDraw.fillRect(buildingArray[k].x,buildingArray[k].y,buildingArray[k].w,buildingArray[k].h);
        if (buildingArray[k].triTop === 1) {
            canDraw.beginPath();
            canDraw.moveTo(buildingArray[k].x,buildingArray[k].y);
            canDraw.lineTo(buildingArray[k].x + buildingArray[k].w / 2, buildingArray[k].y - buildingArray[k].winHeight * 4);
            canDraw.lineTo(buildingArray[k].x + buildingArray[k].w, buildingArray[k].y);
            canDraw.fill();
        }
    }
    
    //Draw windows - dynamic foreground
    for (var j = 0; j < windowLightArray.length; j++) {
        if (windowLightArray[j].lit) {
            canDraw.fillStyle = "#EE9";
            canDraw.fillRect(windowLightArray[j].x,windowLightArray[j].y,6,windowLightArray[j].tall - 4);
            if (Math.random() < 0.00002) {
                windowLightArray[j].lit = 0;
            }
        }
        else if (windowLightArray[j].lit === 0) {
            canDraw.fillStyle = "#020202";
            canDraw.fillRect(windowLightArray[j].x,windowLightArray[j].y,6,windowLightArray[j].tall - 4);
            if (Math.random() < 0.00001) {
                windowLightArray[j].lit = 1;
            } 
        }
    }
    //Draw the red dot on towers with a width of 10
    for (var m = 0; m < dotArray.length; m++) {
        if (dotArray[m].myCounter % 100 > 50) {
            canDraw.fillStyle = "#F00";
        }
        else {
            canDraw.fillStyle = "#010203";
        }
        canDraw.beginPath();
        canDraw.arc(dotArray[m].x + 0.5,dotArray[m].y,2,0,Math.PI*2);
        canDraw.fill();
        dotArray[m].myCounter++;
    }
    canDraw.globalAlpha = 1;
  	if (moonY > maxY || moonX > maxX + 40 || moonX < -40 && fadeOut < 1) {
      canDraw.fillStyle = 'rgba(0,0,0,' + fadeOut + ')';
      canDraw.fillRect(0,0,maxX,maxY);
      fadeOut += 0.005;
    }
  	if (fadeOut >= 1) {
      fadeOut = 0;
      moonY = -50;
      moonX = 100 + (Math.random() * (innerWidth - 100));
    }
  	window.requestAnimationFrame(draw);
}

draw();