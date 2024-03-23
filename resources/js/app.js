import './bootstrap';
import axios from 'axios';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
const deleteButtons = document.querySelectorAll(".btn-danger");

/* event listener legato al bottone rosso "Elimina", non al bottone interno della modale */
deleteButtons.forEach((button) => {
    button.addEventListener("click", function(){
        let id = button.getAttribute("data-id");
        console.log(id)
        let url = `${window.location.origin}/apartments/${id}`;
       console.log(url)
        let form_delete = document.getElementById("form_delete");

        form_delete.setAttribute("action", url)
    });

});


const myButton = document.getElementById('myButton')
// myButton.myButton.addEventListener('click' 'chiamataApi');{
    axios.get('https://api.tomtom.com/search/2/geocode/Via%20delle%20Baleniere%2070.json?key=GQoylkWTb8A3X4kupHH9BTdJj1GJaVKo')

    .then(response => {
        const data = response.data;
        const lat = data.results[0].position.lat;
        const lon = data.results[0].position.lon;
        console.log("prova")
        console.log("Latitudine:", lat);
        console.log("Longitudine:", lon);


    });


