import './boot.js';

import jQuery from 'jquery';
window.$ = jQuery;
window.jQuery = jQuery;

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);
