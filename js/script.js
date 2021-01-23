

let totalSlider=document.querySelectorAll('.slider--item').length; //pegou a quantidade de slider
let currentSlider = 0;

let calcula = document.querySelector('.slider--width');
    calcula.style.width= `calc(100vw *${totalSlider})`; //calculo para fazer o slide 1 aparecer todo na tela

// colocar o botao voltar e proximo no meio
document.querySelector('.slider--controle').style.height =
    `${document.querySelector('.conteiner2').clientHeight}px`;

    
// funão pra voltar o slider
function voltar (){
    currentSlider--;
    if(currentSlider<0){
        currentSlider = totalSlider -1;
    }
    updateMargin();

}

//função para ir pra proxima slider

function proximo(){
    currentSlider ++;
    if(currentSlider>(totalSlider-1)){
        currentSlider=0;
    }
    updateMargin();

}


// função principal para poder passar os slider
function updateMargin(){
    let slideitem=document.querySelector('.slider--item').clientWidth;
    let newMargin = (currentSlider * slideitem);
    document.querySelector('.slider--width').style.marginLeft = `-${newMargin}px`;
}

//setInterval(proximo,3000);





//abrir a img guilda

function abrir(){
    let aparecer = document.querySelector('.modal');
    if(aparecer.style.display =="none"){
        aparecer.style.display="block";
    }else{
        aparecer.style.display="none";
    }

}
