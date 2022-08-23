let r = 12;

function periCal(r){
    return 2 * Math.PI * r;
}
console.log(periCal(12));

///////////////////////
// Afficher les dix premiers multiples de la table de 3

// const number = parseInt(prompt('Enter an integer: '));
// // Affiche une boîte de dialogue

//     for(let i = 1; i<= 10; i++){
//        const result = i * number;
//        console.log(`${number} * ${i} = ${result}`);
//     }

////////////////////////

// let alea = Math.floor(Math.random(0.1)*2);
// let player = 0;

// function points(){

//     if(alea === player){
//         console.log(alea + ' : vous marquez 1 point');
//     } else{
//         console.log(alea + ' : Ordinateur marque 1 point');
//     }
    
// }
// points();

/////////////RADAR

let vitesseMax = 130 + (100 * 0.05);
let vitesseActuelle = 120;

function gotcha(vitesseActuelle){
    if(vitesseActuelle > vitesseMax){
        console.log('Gotcha !')
    } else{
        console.log('You can go');
    }
    console.log(vitesseMax);
} 

gotcha(vitesseActuelle);

//////////////SOMME DES ENTIERS JUSQU'À N

