/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');



window.Axios = require('axios').default;

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('image-component', require('./components/ImageComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


// lightbox settings 


let ImageArray = []
var index = null
let Images = document.querySelectorAll('.portfolio-img')
let LightBox = document.querySelector(".lightbox");
let LightBoxImg = document.querySelector(".lightbox-image");



let showLightBox = function (event) {


    Images.forEach(item => {
        ImageArray.push(item.getAttribute('src'))
    })
    index = event.target.getAttribute('value');
    LightBox.classList.remove('d-none')
    LightBox.classList.add('d-flex');
    LightBoxImg.src = event.target.src;
    console.log(index)


    return index;


}

Images.forEach(item => {
    item.addEventListener('click', showLightBox)
})





let PrevButton = document.querySelector(".prev")
let NextButton = document.querySelector(".next")
let CloseButton = document.querySelector(".close-box")



let prev = function () {

    if (index == 0) {
        index = ImageArray.length - 1
    } else {
        index--
    }

    LightBoxImg.src = ImageArray[index]

    return index;

}


let next = function () {

    if (index < ImageArray.length - 1) {
        index++


    } else {

        index = 0

    }

    LightBoxImg.src = ImageArray[index]

    return index;

}

let close = function () {

    LightBoxImg.src = "";
    LightBox.classList.remove('d-flex')
    LightBox.classList.add('d-none');
    ImageArray = [];
    index = null;


}


PrevButton.addEventListener("click", prev)
NextButton.addEventListener("click", next)
CloseButton.addEventListener("click", close)