const burger = document.querySelector('.hamburger');
const navigation = document.querySelector('.navigation');
const header = document.querySelector('header');
// const link = document.querySelectorAll('li');

burger.addEventListener('click', ()=>{
    navigation.classList.toggle('menu-hamburger'); 
    header.classList.toggle('height');
    // link.classList.toggle('color');
})



