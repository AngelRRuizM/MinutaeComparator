var canvasT, contextT, measuresT;
var canvasQ, contextQ, measuresQ;
var clicked = null;
if(coincidents !== undefined && coincidents !== null) {
    canvasT = document.getElementById("canvasT");
    canvasQ = document.getElementById("canvasQ");
    console.log("init");

    initCanvas(coincidents, canvasT, canvasQ);
}

function initCanvas(list, canvasT, canvasQ){
    contextT = canvasT.getContext("2d");
    contextQ = canvasQ.getContext("2d");

    createImageOnCanvas(canvasT, contextT, templateImg)
    .then((res1) => {
        measuresT = res1;

        createImageOnCanvas(canvasQ, contextQ, queryImg)
        .then((res2) => {
            measuresQ = res2;
            
            for(var i=0; i<list.length; i++) {
                var coincident = list[i];

                if(coincident.color === undefined) {
                    var color = getRandomColor();
                    coincident.color = color;
                }
                
                if(clicked != null && coincident.id == clicked.coincident_id) {
                    contextT.fillStyle = '#FF0000';
                    contextT.strokeStyle = '#FF0000';
                    contextQ.fillStyle = '#FF0000';
                    contextQ.strokeStyle = '#FF0000';
                    drawArc(contextT, coincident.minutias[0].x, coincident.minutias[0].y, 20);
                    drawArc(contextQ, coincident.minutias[1].x, coincident.minutias[1].y, 20);
                }

                drawMinutia(contextT, coincident.minutias[0], coincident.color, 3);
                drawMinutia(contextQ, coincident.minutias[1], coincident.color, 3);
            }
        })
        .catch((err) => {
            alert("No es posible cargar la imagen de la consulta. Intente nuevamente más tarde.");
        })
    })
    .catch((err) => {
        alert("No es posible cargar la imagen de la plantilla. Intente nuevamente más tarde.");
    });
}


// Sets the background image of the canvas
function createImageOnCanvas(canvas, context, imgSource) {
    return new Promise((resolve, reject) => {
        var img = new Image();
        imgT = img;
        img.src = imgSource;
        var res;
        img.onload = () => {
            canvas.width = img.width;
            canvas.height = img.height;
            context.drawImage(img, (0), (0));
            context.save();

            res = {
                width: img.width,
                height: img.height
            };

            resolve(res);
        };

        img.onerror = (err) => {
            reject(err);
        };
    });
}

function drawMinutia(context, minutia, color, width) {
    context.lineWidth = width;
    context.fillStyle = color;
    context.strokeStyle = color;

    drawArc(context, minutia.x, minutia.y, 9);
    drawLine(context, minutia.x, minutia.y, 20, minutia.angle); 
}

// Draws an arc centered in the specified coordinate
function drawArc(context, x, y, r) {
    context.beginPath();
    context.arc(x, y, r, 0, 2*Math.PI);
    context.stroke();
}

// Draw the line from the origin point to the destiny point with the given radius
function drawLine(context, x, y, r, angle) {
    context.beginPath();
    context.moveTo(x, y);
    context.lineTo(x + r*Math.cos(angle), y + r*Math.sin(angle));
    context.stroke();
}

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

// Handels clicks in the canvas
function onClickHandler(e) {
    var index, canvas, measures;
    
    if(e.target.id == 'canvasT') {
        index = 0;
        canvas = canvasT;
        measures = measuresT;
    }
    else {
        index = 1;
        canvas = canvasQ;
        measures = measuresQ;
    }

    var pos = getMousePos(canvas, e);
    pos = normalizePos(pos, measures, canvas);
    var coincident = findMinutia(index, pos);
    
    if(coincident != null) {
        contextT.clearRect(0,0,canvasT.width,canvasT.height);
        contextQ.clearRect(0,0,canvasQ.width,canvasQ.height);
        clicked = coincident;
        initCanvas(coincidents, canvasT, canvasQ);
    }
}

function findMinutia(index, pos) {
    for(var i=0; i<coincidents.length; i++) {
        if(inRange(pos, coincidents[i].minutias[index], 10)) {
            return coincidents[i].minutias[index];
        }
    }

    return null;
}

function normalizePos(pos, measures, canvas) {
    ratio = canvas.clientWidth/measures.width;

    return {
        x: pos.x/ratio,
        y: pos.y/ratio
    };
}

// Get the cordinates of the mouse
function getMousePos(canvas, evt) {
    var rect = canvas.getBoundingClientRect();
    return {
        x: evt.clientX - rect.left,
        y: evt.clientY - rect.top
    };
}

// Check if the position is in the range specified with the center of the minutia and the end of the line
function inRange(point, minutia, range) {
    var centerDistance = Math.sqrt(Math.pow(point.x - minutia.x, 2) + Math.pow(point.y - minutia.y, 2));

    return centerDistance <= range;
}