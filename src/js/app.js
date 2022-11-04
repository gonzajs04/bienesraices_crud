document.addEventListener('DOMContentLoaded',()=>{
    abrirMenu(); //CREO FUNCION ABRIR MENU
    darkMode(); //CREO FUNCION PARA ACTIVAR DARK MODE

});

function abrirMenu(){
    const menu = document.querySelector('.menu-mobile'); //SELECCIONO EN MENU ANVORGUESA
    menu.addEventListener('click',desplegar); //CUANDO CLICKEO EL MENU, LLAMO A UNA FUNCION LLAMADA DESPLEGAR
};

function desplegar(){
    const nav = document.querySelector('.nav'); //SELECCIONO LA NAVEGACION
    if(nav.classList.contains('visible')){ //LE PREGUNTO SI TIENE UNA CLASE LLAMADA VISIBLE, ES DECIR, SI YA ESTA MOSTRANDOSE EL MENU
        nav.classList.remove('visible'); //SI ES ASI, LA REMUEVO, 
      
    }else{
        nav.classList.add('visible'); //SI NO EXISTE, LA AÑADO Y MUESTRO EL MENU
       
    }

}

function darkMode(){

    const preferenciaDark = window.matchMedia('(prefers-color-scheme:dark)');
    // console.log(preferenciaDark.matches); //NOS ARROJA TRUE SI PREFIERE NEGRO Y FALSE SI PREFIERE CLARO
    if(preferenciaDark.matches){
        document.body.classList.add('dark-mode')
    }else{
        document.body.classList.remove('dark-mode')
    }

    preferenciaDark.addEventListener('change',()=>{ //EN CASO DE QUE CAMBIE DE PREFERENCIA EN TIEMPO REAL, SE ACTUALIZA AUTOMATICAMENTE

        if(preferenciaDark.matches){
            document.body.classList.add('dark-mode')
        }else{
            document.body.classList.remove('dark-mode')
        }

    });

    const botonDark = document.querySelector('.img-boton'); //SELECCIONO EL BOTON

   
    botonDark.addEventListener('click',function(){ //FUNCION CLICK EN BOTON
        document.body.classList.toggle('dark-mode'); //LE AÑADO UNA CLASE DARK-MODE AL BODY

    });

}


