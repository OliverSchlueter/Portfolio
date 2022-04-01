
//setInterval(setMyAge, 100);

function setMyAge() {
    var myAge = document.getElementById("myAge");

    var bday = new Date("2003-03-13T09:10:00");
    var now = new Date();

    var years = Math.abs(now.getFullYear() - bday.getFullYear());
    var months = Math.abs(now.getMonth() - bday.getMonth());
    var days = Math.abs(now.getDate() - bday.getDate());
    var hours = Math.abs(now.getHours() - bday.getHours());
    var minutes = Math.abs(now.getMinutes() - bday.getMinutes());
    var seconds = Math.abs(now.getSeconds() - bday.getSeconds());

    var ageStr = "";
    ageStr += years + "y ";
    ageStr += (months > 0 ? months + "m " : "");
    ageStr += (days > 0 ? days + "d " : "");
    ageStr += (hours > 0 ? hours + "h " : "");
    ageStr += (minutes > 0 ? minutes + "min " : "");
    ageStr += (seconds > 0 ? seconds + "sek " : "");

    ageStr = ageStr.substring(0, ageStr.length - 1);

    myAge.innerHTML = ageStr;
    //myAge.innerHTML = years + " Jahre " + months + " Monate " + days + " Tage " + hours + " Stunden " + minutes + " Minuten " + seconds + " Sekunden"
}

function myScrollTo(elementName) {
    document.getElementById(elementName).scrollIntoView({block: "start", behavior: "smooth"})
}


function toggleFaq(n) {
    const parent = document.getElementById("faq-item-" + n);
    const question = parent.children[0];
    const toggleSymbol = question.children[0];
    const answer = parent.children[1];
    
    var currentDisplay = answer.style.display;

    if(currentDisplay != "block"){
        answer.style.display = "block";
        toggleSymbol.innerHTML = "-";
    } else {
        answer.style.display = "none";
        toggleSymbol.innerHTML = "+";
    }
}