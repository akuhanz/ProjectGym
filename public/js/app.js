let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev =  document.getElementById('prev');
let thumbnail = document.querySelectorAll('.thumbnail .item');

let countItem =items.length;
let itemActive = 0;

next.onclick = function(){
    itemActive = itemActive + 1;
    if(itemActive >= countItem){
        itemActive = 0;
    }
    showSlider();
}

prev.onclick = function(){
    itemActive = itemActive - 1;
    if(itemActive < 0){
        itemActive = countItem - 1;
    }
    showSlider();
}

let refreshInterval = setInterval(() => {
    next.click();
}, 5000)
function showSlider(){

    let itemActiveOld = document.querySelector('.slider .list .item.active');
    let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
    itemActiveOld.classList.remove('active');
    thumbnailActiveOld.classList.remove('active');

    items[itemActive].classList.add('active');
    thumbnail[itemActive].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => {
        next.click();
    }, 7000)
}

thumbnail.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        itemActive =  index;
        showSlider();
    })
})

 //hamburger
 const hamburger = document.querySelector('#hamburger');
 const navMenu = document.querySelector('#nav-menu');
 
 hamburger.addEventListener('click', function(){
     hamburger.classList.toggle('hamburger-active');
     navMenu.classList.toggle('hidden');
 });
 
 // click diluar hamburger
 window.addEventListener('click', function(e){
     if(e.target != hamburger && e.target != navMenu){
         hamburger.classList.remove('hamburger-active');
         navMenu.classList.add('hidden');
     }
 });