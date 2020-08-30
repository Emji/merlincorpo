let buttonSwitch = document.querySelector('#btn-link');
let WindowSwitch = document.querySelector('#SloganWindow');
let formWindow = document.querySelector('#formWindow');


let show = function () {

    WindowSwitch.classList.add('d-none')
    formWindow.classList.add('AnimatedForm')
    formWindow.classList.remove('d-none')



}

buttonSwitch.addEventListener("click", show);
