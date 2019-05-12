function switchRight(id) {
    var left = document.getElementById(id).innerText;
    var right = document.getElementById(id+1).innerText;
    document.getElementById(id).innerText = right;
    document.getElementById(id+1).innerText = left;
}

function swapEnds(id) {
    var left = document.getElementById(id-1).innerText;
    var right = document.getElementById(id+1).innerText;
    document.getElementById(id-1).innerText = right;
    document.getElementById(id+1).innerText = left;
}

function switchLeft(id) {
    var right = document.getElementById(id).innerText;
    var left = document.getElementById(id-1).innerText;
    document.getElementById(id).innerText = left;
    document.getElementById(id-1).innerText = right;
}

function init() {
    var btns = document.querySelectorAll('.btn');

    btns.forEach((el) => {
        el.addEventListener('click', () => {
            switch(parseInt(el.id)) {
                // Left
                case 1:
                case 4:
                case 7:
                    switchRight(id);
                    break;
        
                // Center
                case 2:
                case 5:
                case 8:
                    swapEnds(id);
                    break;
        
                // Right
                case 3:
                case 6:
                case 9:
                    switchLeft(id);
                    break;
            }
        })
    }) 
}

init();