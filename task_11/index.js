arrangementDivsInPlace();


function addNewDraggDiv (){
    var div = document.createElement('div');
    var draggElements =  document.getElementById('draggElements');
    div.setAttribute('class', 'draggElemem');
    draggElements.appendChild(div);
    div.innerHTML = '<input class="input"></input>';

    return div;        
}

function arrangementDivsInPlace () {
    $.ajax({
        method: "POST",
        url: "server/getPosition.php",
        dataType: 'json',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var div = addNewDraggDiv();
                div.style.left = data[i]['x'];
                div.style.top = data[i]['y'];
                div.childNodes[0].value = data[i]['value'];
            }
        }
    });
}

$('#plus').click(function () {
    var div = addNewDraggDiv();
    console.log(div.childNodes[0].focus());

})

$('#draggElements').on('dblclick', 'div', function(e) {
    var obj = this;
    console.log(obj);
    obj.childNodes[0].style.cursor = 'move';
    xInDiv = e.offsetX==undefined?e.layerX:e.offsetX;
    yInDiv = e.offsetY==undefined?e.layerY:e.offsetY;
    dragObj = obj;

    document.onmouseup = function(e){
        obj.childNodes[0].style.cursor = 'text';
        dragObj = null;
    };

    document.onmousemove = function(e){
        var x = e.pageX;
        var y = e.pageY;

        if(dragObj == null)
            return;
        x = x - xInDiv +"px";
        y = y - yInDiv +"px";
        dragObj.style.left = x;
        dragObj.style.top= y;

    };

});

$('#draggElements').on('keypress', 'input', function(e){
    if(e.keyCode==13){
        var x = $(this).parent().css('left');
        var y = $(this).parent().css('top'); 
        var inputIndex = $(this).parent().index();
        savePositionAndValue(inputIndex, this, x, y);
        this.blur();
    }
});

function savePositionAndValue(inputIndex, input, x, y){
    var value = input.value;
    $.ajax({
        method: "POST",
        url: "server/server.php",
        data: ({input:inputIndex, value:value, x:x, y:y})
    });
}

