let btnMenu = document.getElementById('btn-menu');
let body = document.getElementsByTagName('body')[0]; //[0] obtiene el primer elemento de body

btnMenu.addEventListener('change', () => { //change ve si el input esta marcado o no
    if (btnMenu.checked) {//verifica si el checkbox del input esta marcado
      body.classList.add('menu-open');
    } else {
      body.classList.remove('menu-open');
    }
  });
