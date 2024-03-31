// app.js
import "./bootstrap";
import "flowbite";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

// document.addEventListener('DOMContentLoaded', () => {
//     flatpickr("[datepicker]", {
//         altInput: true,
//         altFormat: "F j, Y",
//         dateFormat: "Y-m-d",
//     });
// });

// document.addEventListener('alpine:init', () => {
//     flatpickr("[datepicker]", {}); // Initialize Flatpickr for elements with [datepicker] attribute
// });
