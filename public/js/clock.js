function displayClock(){
    let clock = document.getElementById("clock")
    let startTime = localStorage.getItem(`now-${id_quiz}`);
    let endTime = 0
    let now = new Date().getTime()
    now = parseFloat(now)
    switch(n){
        case 0: clock.classList.add("d-none")
        case 1: endTime = parseFloat(startTime) + 30*60*1000; break;
        case 2: endTime = parseFloat(startTime) + 60*60*1000; break;
        case 3: endTime = parseFloat(startTime) + 90*60*1000; break;
        case 4: endTime = parseFloat(startTime) + 120*60*1000; break;
    }
    let m = Math.floor((endTime - now)/(1000*60))
    let s = Math.floor((endTime - now)%(1000*60)/(1000))
    if(startTime == null){
        clock.classList.add("d-none")
    } else {
        if(s < 10) clock.innerHTML = `${m}:0${s}`
        else clock.innerHTML = `${m}:${s}`
    }
    if(m == 0 && s == 0){
        clock.innerHTML = `TIME's OUT`
        localStorage.removeItem(`now-${id_quiz}`);
        setTimeout(function(){
            document.getElementById("form").submit()
        }, 500)
    }
    setTimeout(
        displayClock, 1000 
    )
}

function sendForm(){
    if (confirm('Check carefully! Are your sure?')) {
        document.getElementById('form').submit();
        document.getElementById("clock").classList.add("d-none")
        localStorage.removeItem(`now-${id_quiz}`);
    }
}

displayClock()