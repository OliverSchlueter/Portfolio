const snackbarQueue = [];
var snackbarShown = false;

/**
 * Adds new snackbar to queue
 * @param {string} content 
 */
function snackbar(content){
    snackbarQueue.push(content);
}

/**
 * Displays and then removes a new snackbar
 * @param {string} content 
 */
function showSnackbar(content){
    var snackbarElement = document.createElement("div");
    snackbarElement.className = "snackbar";
    
    var contentElement = document.createElement("p");
    contentElement.innerHTML = content;

    snackbarElement.appendChild(contentElement);

    document.body.appendChild(snackbarElement);

    snackbarShown = true;

    setTimeout(() => { 
                snackbarElement.remove(); 
                snackbarShown = false; 
            }, 2900);
}

function snackbarLoop(){
    
    if(snackbarQueue.length == 0 || snackbarShown){
        return;
    }

    var next = snackbarQueue.shift();

    showSnackbar(next);
}

setInterval(snackbarLoop, 500);