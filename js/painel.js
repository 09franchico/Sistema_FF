


//abrir menu do painel
let painelMenu=document.querySelector("#menu-painel");
painelMenu.addEventListener("click",()=>{
    let menu=document.querySelector(".menu-painel");
    if(menu.classList.contains("menu-abrir")==true){
        menu.classList.remove("menu-abrir");
       

    }else{
        menu.classList.add("menu-abrir")
        document.querySelector("#menu-painel").style.display="none";

    }

})


let fechar=document.querySelector("#exit-painel");
fechar.addEventListener("click",()=>{
    let fecharMenu=document.querySelector(".menu-painel");
    if(fecharMenu.classList.contains("menu-abrir")){
        fecharMenu.classList.remove("menu-abrir");
        document.querySelector("#menu-painel").style.display="block";
        remover2();
        remove1();
    }
    
})



//abrir o formulario camp
let principal=document.querySelector("#menu-item2");
principal.addEventListener("click",()=>{
    let pegar=document.querySelector(".form-painel");
    if(pegar.classList.contains("form-painel2")==true){
        pegar.classList.remove("form-painel2");
        pegar.style.opacity=0;
        
    }else{
        setTimeout(()=>{
            pegar.style.opacity = 1; // efeito 
         },200);
        pegar.classList.add("form-painel2");
        remover2();
        sumirHomer();
        
    }
})


//ABRI O FORMULARIO RECRUTAMENTO
let menuRecrutamento= document.querySelector("#menu-item4");
menuRecrutamento.addEventListener("click",()=>{
    let pegarModal = document.querySelector(".cont-recrutamento")
    if(pegarModal.classList.contains("form-painel2")==true){
        pegarModal.classList.remove("form-painel2");
        pegarModal.style.opacity=0;
        
        
        
    }else{
        setTimeout(()=>{
            pegarModal.style.opacity = 1; // efeito 
         },200);
        pegarModal.classList.add("form-painel2");
        remove1();
        sumirHomer();
           


    }
})




// REMOVER OS FORMULARIOS QUANDO CLICAR NO OUTRO
function remove1(){
    let sumir=document.querySelector(".form-painel");
    sumir.classList.remove("form-painel2");
    sumir.style.opacity=0;
}
function remover2(){
    let sumir=document.querySelector(".cont-recrutamento");
    sumir.classList.remove("form-painel2");
    sumir.style.opacity=0;

}



//sumir camp 

function sumirHomer(){
    let sumir2 = document.querySelector(".camp-publicados");
        sumir2.style.display="none";
        
}





