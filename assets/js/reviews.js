const wrapper = document.querySelector('.wrapper');
const switches = document.querySelectorAll('.switches button');

let activeReview = 0; 

switches.forEach((item, i) => {
    item.addEventListener('click', () => {
        switches[activeReview].classList.remove('switch');
        wrapper.style.marginLeft = `-${100 * i}%`;
        item.classList.add('switch');
        activeReview = i;
    })
})