(function(){
    const tituloPreguntas = [...document.querySelectorAll('.questions__title')];
    console.log(tituloPreguntas)

    tituloPreguntas.forEach(pregunta =>{
        pregunta.addEventListener('click', ()=>{
            let height = 0;
            let respuesta = pregunta.nextElementSibling;
            let addPadding = pregunta.parentElement.parentElement;

            addPadding.classList.toggle('questions__padding--add');
            pregunta.children[0].classList.toggle('questions__arrow--rotate');

            if(respuesta.clientHeight === 0){
                height = respuesta.scrollHeight;
            }

            respuesta.style.height = `${height}px`;
        });
    });
})();