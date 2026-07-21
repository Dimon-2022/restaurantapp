import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import jQuery from 'jquery';

import Alpine from 'alpinejs';

window.$ = jQuery;
window.jQuery = jQuery;

window.moment = require('moment');
require("tempusdominus-bootstrap-4");


window.Alpine = Alpine;

Alpine.start();
