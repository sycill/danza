let img = document.getElementsByClassName('img-slider');
let step = 0;
let nbr_img = img.length;
let next = document.querySelector('.next');
let back = document.querySelector('.back');
const slider = document.querySelector('.slider');

next.addEventListener('click', nextSlide);
back.addEventListener('click', previousSlide);


function removeActiveImg(){   
    for(let i = 0; i < nbr_img; i++){
        img[i].classList.remove('active');
    }
}

function nextSlide(){
    step++;
    if(step >= nbr_img){
        step = 0;
    }
    removeActiveImg();
    img[step].classList.add('active');

}

function previousSlide(){
    step --;
    if(step < 0){
        step = nbr_img - 1; 
    }
    removeActiveImg();
    img[step].classList.add('active');
    // console.log(nbr_img);

}

setInterval(() => {
    step++;
    if(step >= nbr_img){
        step = 0;
    }
    removeActiveImg();
    img[step].classList.add('active');

}, 3000)