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

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("input.date-picker").forEach(function (datepickerEl) {
        var datepicker = new MyDatepicker(datepickerEl);
    });
});
