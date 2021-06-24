// SIDEBAR DROPDOWN
let sideBarStatus = false;

function sideBarDropdown(){
    if(!sideBarStatus){
        document.querySelector('.side-bar-mobile').style.height = '100%';        
        document.querySelector('.toggle').innerHTML = '-';        
        sideBarStatus = true;
    }else{
        document.querySelector('.side-bar-mobile').style.height = '0px';
        document.querySelector('.toggle').innerHTML = '+';        
        sideBarStatus =  false;
    }   
}

// MENU MOBILE

function openMenu(){    
    document.querySelector('.nav-mobile').style.transform = "translate(0% , 0)";    
    document.querySelector('.dark-background').style.display= "inherit";
    document.querySelector('.dark-background').style.opacity= "0.6";
    document.querySelector('.dark-background').style.pointerEvents = "inherit";
    document.querySelector('.dark-background').style.cursor = "pointer";
}

function closeMenu(){
    document.querySelector('.nav-mobile').style.transform = "translate(-110% , 0)";    
    document.querySelector('.dark-background').style.display= "none";
    document.querySelector('.dark-background').style.opacity= "0";
    document.querySelector('.dark-background').style.pointerEvents = "none";
    document.querySelector('.dark-background').style.cursor = "none";
}

// SEARCH BAR
let search;

function getSearch(){    
    search = document.querySelector('#hidden').value;    
}

function searchBarOn(){
    document.querySelector(".search").placeholder = "Searching for ...";    
    document.querySelector(".search").style.fontSize = "1.4rem";    
}

function searchBarOff(){
    document.querySelector(".search").placeholder = `${search}`;   
    if(screen.width <= 720){
        document.querySelector(".search").style.fontSize = "1.2rem";
    }else{
        document.querySelector(".search").style.fontSize = "1.8rem";
    }
}

// SLIDE BAR
function updateTextInput(val) {
    document.getElementById('output').value=val;    
  }