import './bootstrap';
import '../sass/app.scss'; 
import jQuery from 'jquery';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.$ = jQuery;

Alpine.start();
