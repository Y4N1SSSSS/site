var currentWidth = 0; 

function move() {
    var elem = document.getElementById("myBar");

    if (currentWidth < 100) {
        currentWidth += 1;
        elem.style.width = currentWidth + "%";
    }
}
