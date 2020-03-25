
var $ = require('jquery');

$(document).ready(function(){

  $(".menu-icon").on("click", function(){
    $("nav ul").toggleClass("showing");
  });

  $(window).on("scroll", function(){

    if($(window).scrollTop()) {
      $('nav').addClass('black');
      $('svg').addClass('black2');
    }
    else {
      $('nav').removeClass('black');
      $('svg').removeClass('black2');
    }

  });



})
 /*** First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
//
// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */
//
// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
//  const app = new Vue({
//      el: '#app',
//  });


import tt from '@tomtom-international/web-sdk-maps';
import '@tomtom-international/web-sdk-maps/dist/maps-web.min.js';

var lat = $('#lat').val();
var lon = $('#lon').val();

const map = tt.map({
    key: "YPixAIIG2SgrHPBm2WGBWUa9L4JiGcFe",
    container: "map",
    style: 'tomtom://vector/1/basic-main',
    center: [ lon , lat ],
    zoom: 15,
    theme:{
    style:'main',
    layer:'basic',
    source:'vector'
         }

    });

var maker=new tt.Marker().setLngLat([lon,lat]).addTo(map);
map.addControl(new tt.FullscreenControl());
map.addControl(new tt.NavigationControl());
