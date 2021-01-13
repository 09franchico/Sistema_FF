
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
    }
})



//abrir home



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
         remove();
    }
})



// remover o home
function remove(){
    let sumir=document.querySelector(".video-painel");
    sumir.style.display="none";

}