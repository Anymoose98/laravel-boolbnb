import './bootstrap';
import axios from 'axios';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import { result } from 'lodash';
import.meta.glob([
    '../img/**'
])
const deleteButtons = document.querySelectorAll(".btn-danger");

/* event listener legato al bottone rosso "Elimina", non al bottone interno della modale */
deleteButtons.forEach((button) => {
    button.addEventListener("click", function(){
        let id = button.getAttribute("data-id");
        let type = button.getAttribute("data-type")
        let url = `${window.location.origin}/${type}/${id}`;

        let form_delete = document.getElementById("form_delete");

        form_delete.setAttribute("action", url)
    });

});



const myButton = document.getElementById('myButton');
const key = 'GQoylkWTb8A3X4kupHH9BTdJj1GJaVKo';
const indirizzoInput = document.getElementById('indirizzo');



// Controllo JS della password di conferma 
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("registrationForm");
    form.addEventListener("submit", function(event) {
        let password = document.getElementById("password").value;
        let confirmPassword = document.getElementById("password-confirm").value;

        if (password !== confirmPassword) {
            alert("LE PASSWORD NON COINCIDONO");
            event.preventDefault(); 
        }
    });
});



