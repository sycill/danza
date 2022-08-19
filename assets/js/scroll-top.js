

const arrow = document.querySelector('.top-arrow');

// La propriété onscroll renvoie le gestionnaire d'évènements pour l'objet window

window.onscroll = function() {scroll()};

arrow.addEventListener('click', top());

function scroll(){
    if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
        arrow.style.visibility = "visible";
    } else {
        arrow.style.visibility ="hidden";
    }
}

function top(){
    console.log('Where u at again foo ?')
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}