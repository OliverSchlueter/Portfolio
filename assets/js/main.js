const slide_ins = [];

Array.from(document.getElementsByClassName("slide_in_top")).forEach(e => {
    slide_ins.push({
        element: e,
        side: "top"
    });
    e.classList.add("hide_element");
});

Array.from(document.getElementsByClassName("slide_in_bottom")).forEach(e => {
    slide_ins.push({
        element: e,
        side: "bottom"
    });
    e.classList.add("hide_element");
});

Array.from(document.getElementsByClassName("slide_in_left")).forEach(e => {
    slide_ins.push({
        element: e,
        side: "left"
    });
    e.classList.add("hide_element");
});

Array.from(document.getElementsByClassName("slide_in_right")).forEach(e => {
    slide_ins.push({
        element: e,
        side: "right"
    });
    e.classList.add("hide_element");
});

Array.from(document.getElementsByClassName("slide_in_scale")).forEach(e => {
    slide_ins.push({
        element: e,
        side: "scale"
    });
    e.classList.add("hide_element");
});



document.addEventListener("scroll", scrollListener);

scrollListener();


function scrollListener(){
    //const maxPos = document.body.scrollHeight - window.innerHeight;
    //const percentage = scrollPos / maxPos;
    
    const scrollPos = window.scrollY;
    const headerHeight = document.getElementById("header").scrollHeight;

    /*
        Scroll up button
    */
    const up_btn = document.getElementById("up-btn");
    if(scrollPos > headerHeight/2){
        up_btn.style.visibility = "visible";
    } else {
        up_btn.style.visibility = "hidden";
    }


    /*
        Slide ins
    */
    for (let i = 0; i < slide_ins.length; i++) {
        const s = slide_ins[i];
        
        if(!s.done){
            s.element.classList.remove("hide_element");
            if(isElementVisible(s.element)){
                s.element.classList.add("animate");
                slide_ins.splice(i, 1);
            } else {
                s.element.classList.add("hide_element");
            }
            
        }
    }

    /*
        Rising numbers
    */
    for (let i = 0; i < document.getElementsByClassName("rising_number").length; i++) {
        const element = document.getElementsByClassName("rising_number")[i];

        if(!isElementVisible(element))
            continue;

        const n =  parseInt(element.getAttribute("rising_number"));

        const increamentDelay = 2000 / n;

        element.classList.remove("rising_number");
    
        for (let i = 0; i <= n; i++) {
            setTimeout(() => {
                element.textContent = i;
            }, i*increamentDelay);
        }
    }
}


function isElementVisible(element) {
    const rect = element.getBoundingClientRect();
    return rect.bottom <= screen.availHeight - ((rect.top - rect.bottom) / 3);
}

function myScrollTo(elementName) {
    slide_ins.forEach(s => s.element.classList.remove("hide_element"));
    document.getElementById(elementName).scrollIntoView({block: "start", behavior: "smooth"});
    slide_ins.forEach(s => !s.done ? s.element.classList.add("hide_element") : none);
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

function getRandomFromList(list) {
    return list[Math.floor((Math.random()*list.length))];
  }

const logoClickTexts = ["Hallo! Ich freue mich sehr, dass Du da bist :D", "Hey, wie war Dein Tag heute?", "Ich bin bloß ein Logo :/", "Hast Du schon meine eigene Programmiersprache, Java-- gesehen?"];

document.getElementById("logo").onclick = (e) => {
    snackbar(getRandomFromList(logoClickTexts));
}


function charJump(element){
    element.classList.add("jump");

    setTimeout(() => {
        element.classList.remove("jump")
    }, 410);
}

for (let i = 0; i < document.getElementsByClassName("jump_char").length; i++) {
    const element = document.getElementsByClassName("jump_char")[i];

    element.onmouseover = () => charJump(element);

    if(element.classList.contains("load")){
        setTimeout(() => {
            charJump(element); 
        }, 100 + 50*(i+1));
    }
}