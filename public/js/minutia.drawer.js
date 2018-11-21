if(coincidents !== undefined && coincidents !== null) {
    var canvasT = document.getElementById("canvasT");
    var canvasQ = document.getElementById("canvasQ");
    console.log("init");

    initCanvas(coincidents, canvasT, canvasQ);
}

function initCanvas(list, canvasT, canvasQ){
    var contextT = canvasT.getContext("2d");
    var contextQ = canvasQ.getContext("2d");
    var template, query;

    createImageOnCanvas(canvasT, contextT, templateImg)
    .then((res1) => {
        template = res1;

        createImageOnCanvas(canvasQ, contextQ, queryImg)
        .then((res2) => {
            query = res2;
            
            for(var i=0; i<list.length; i++) {
                var coincident = list[i];
                var color = getRandomColor();
                coincident.color = color;
        
                drawMinutia(contextT, coincident.minutias[0], color);
                drawMinutia(contextQ, coincident.minutias[1], color);
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
        img.src = imgSource;
        var res;
        img.onload = () => {
            canvas.width = img.width;
            canvas.height = img.height;
            context.drawImage(img, (0), (0));
            context.save();

            res = {
                width: img.width,
                height: img.height,
                nwidth: img.naturalWidth,
                nheight: img.naturalHeight
            };

            resolve(res);
        };

        img.onerror = () => {
            reject("error");
        };
    });
}

function drawMinutia(context, minutia, color) {
    context.fillStyle = color;
    context.strokeStyle = color;

    drawArc(context, minutia.x, minutia.y);
    drawLine(context, minutia.x, minutia.y, 20, minutia.angle); 
}

// Draws an arc centered in the specified coordinate
function drawArc(context, x, y) {
    context.beginPath();
    context.arc(x, y, 8, 0, 2*Math.PI);
    context.lineWidth = 3;
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