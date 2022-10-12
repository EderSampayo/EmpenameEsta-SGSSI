(function(){

    const sliders = [...document.querySelectorAll('.testimony__body')]; //Testomony__body: todos los elementos que funcionan como sliders (3 puntos: en vez de ser nodo de elementos ahora son array)
    const botonNext = document.querySelector('#next');
    const botonAtras = document.querySelector('#before');
    let valor;

    botonNext.addEventListener('click', ()=>{
        cambiarPosicion(1);
    });

    botonAtras.addEventListener('click', ()=>{
        cambiarPosicion(-1);
    });

    const cambiarPosicion = (add)=>{
        const sliderActual = document.querySelector('.testimony__body--show').dataset.id;
        valor = Number(sliderActual);               //Number() porque en vez de sumar está concatenando
        valor = valor + add;


        sliders[Number(sliderActual)-1].classList.remove('testimony__body--show');
        if(valor === sliders.length+1 || valor === 0){
            valor = valor === 0 ? sliders.length  : 1;
        }

        sliders[valor-1].classList.add('testimony__body--show');

    }

})();