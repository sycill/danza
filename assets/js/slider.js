let img = document.getElementsByClassName('img-slider');
let etape = 0;
let nbr_img = img.length;
let next = document.querySelector('.next');
let back = document.querySelector('.back');

next.addEventListener('click', nextSlide);
back.addEventListener('click', previousSlide);

console.log(nbr_img);

function removeActiveImg(){   
    for(let i = 0; i < nbr_img; i++){
        img[i].classList.remove('active');
    }
}

function nextSlide(){
    etape++;
    if(etape >= nbr_img){
        etape = 0;
    }
    removeActiveImg();
    img[etape].classList.add('active');

}

function previousSlide(){
    etape --;
    if(etape < 0){
        etape = nbr_img - 1;
    }
    removeActiveImg();
    img[etape].classList.add('active');
    console.log(nbr_img);

}

setInterval(() => {
    etape++;
    if(etape >= nbr_img){
        etape = 0;
    }
    removeActiveImg();
    img[etape].classList.add('active');

}, 3000)