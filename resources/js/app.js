import './boot.js';

import './jquery.min.js';
import './bootstrap.min.js';
import './custom.js';

import jQuery from 'jquery';
window.$ = jQuery;
window.jQuery = jQuery;

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);
