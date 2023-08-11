import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

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
