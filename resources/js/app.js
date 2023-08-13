import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/**
 *Documentación para el datepicker
 *
 * https://mymth.github.io/vanillajs-datepicker/#/
 *
 * https://github.com/mymth/vanillajs-datepicker/issues/140
 */

import Datepicker from '../../node_modules/vanillajs-datepicker/js/Datepicker.js';
import es from '../../node_modules/vanillajs-datepicker/js/i18n/locales/es.js';

Object.assign(Datepicker.locales, es);
/*
const elem = document.querySelector('input[name="foo"]');
const datepicker = new Datepicker(elem, {
    // ...options
    language: "es",
});
*/

//const elem = document.querySelector('input[name="fechaInicioEvento"]');
//Datepicker.formatDate(elem.value, 'dd/MM/yyyy', 'es');
/*const datepicker = new Datepicker(elem, {
    // ...options

    language: "es",
});
*/

class MyDatepicker extends Datepicker {
    constructor(element, options = {}, rangepicker = undefined) {
        super(element, Object.assign({
            todayHighlight: true,
            format:'dd/mm/yyyy',
            language: 'es',
            autohide: true,
        }, options), rangepicker);
    }
}

//const elem = document.querySelector('input[name="fechaInicioEvento"]');
//var datepicker = new MyDatepicker(elem);

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("input.date-picker").forEach(function (datepickerEl) {
        var datepicker = new MyDatepicker(datepickerEl);
        //const d = new Datepicker(datepickerEl);
        //d.setOptions(datepickerOptions);
    });
});
/*
const datepickerOptions = {
    language: "es",
    autohide: true,
    format: "dd/mm/yyyy",
};
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("input.date-picker").forEach(function (datepickerEl) {
        const d = new Datepicker(datepickerEl);
        d.setOptions(datepickerOptions);
    });
});

*/


/*
import Datepicker from "flowbite-datepicker/Datepicker";
import { locales } from "../../node_modules/flowbite-datepicker/js/i18n/base-locales.js";
import es from "flowbite-datepicker/locales/es";

Datepicker.locales.es = es.es;

const datepickerOptions = {
    language: "es",
};

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[datepicker]").forEach(function (datepickerEl) {
        const d = new Datepicker(datepickerEl);
        d.setOptions(datepickerOptions);
    });
});
*/
