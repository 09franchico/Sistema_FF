
let botao = document.querySelector("#cadastro");
botao.addEventListener("click",(Event)=>{
    Event.preventDefault();
     let formulario  = document.querySelector("#camp-sumir");
     if(formulario.style.display = "flex"){
         formulario.style.display = "none";
         document.querySelector(".form-painel").style.display = "flex";
     }else{
         formulario.style.display = "flex";
     }
})







