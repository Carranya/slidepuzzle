var rows = 5;
var cols = 5;
var nowTile;
var otherTile;
var turns = 0;

var image = ["15", "11", "7", "6", "5", "14", "13", "19", "25", "9", "22", "18", "16", "3", "23", "17", "24", "4", "21", "12", "1", "8", "10", "20", "2"];

window.onload = function ()
{
    for(let r=0; r<rows; r++)
    {
        for(let c=0; c<cols; c++)
        {
            // create board start position
            let tile = document.createElement("img");
            tile.id = r.toString() + "-" + c.toString();
            tile.src = "img/" + image.shift() + ".jpg";

            // events
            tile.addEventListener("dragstart", dragStart);
            tile.addEventListener("dragover", dragOver);
            tile.addEventListener("dragenter", dragEnter);
            tile.addEventListener("dragleave", dragLeave);
            tile.addEventListener("drop", dragDrop);
            tile.addEventListener("dragend", dragEnd);

            document.getElementById("board").append(tile);
        }
    }
}

function dragStart()
{
    nowTile = this;
}

function dragOver(e)
{
    e.preventDefault();
}

function dragEnter(e)
{
    e.preventDefault();
}

function dragLeave(){}

function dragDrop()
{
    otherTile = this;
}

function dragEnd()
{
    
    if(!otherTile.src.includes("25.jpg"))
    {
        return;
    }

    let nowCoords = nowTile.id.split("-");
    let r = parseInt(nowCoords[0]);
    let c = parseInt(nowCoords[1]);

    let otherCoords = otherTile.id.split("-");
    let r2 = parseInt(otherCoords[0]);
    let c2 = parseInt(otherCoords[1]);

    let moveleft = r == r2 && c2 == c-1;
    let moveright = r == r2 && c2 == c+1;
    let moveup = c == c2 && r2 == r-1;
    let movedown = c == c2 && r2 == r+1;

    let moveable = moveleft || moveright || moveup || movedown;

    if(moveable)
    {
        let nowImg = nowTile.src;
        let otherImg = otherTile.src;

        nowTile.src = otherImg;
        otherTile.src = nowImg;

        turns += 1;
        document.getElementById("turns").innerText = turns;
    }
}
