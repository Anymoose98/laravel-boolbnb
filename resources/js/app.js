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
        let type = button.getAttribute("data-type")
        let url = `${window.location.origin}/${type}/${id}`;

        let form_delete = document.getElementById("form_delete");

        form_delete.setAttribute("action", url)
    });

});

document.addEventListener('DOMContentLoaded', function() {
    const Api_key = "ARRIZGGoUek6AqDTwVcXta7pCZ07Q490";
    const addressInput = document.getElementById("address");
    const myButton = document.getElementById('myButton');
    const latitudine = document.getElementById('lat');
    const longitudine = document.getElementById('long');
    myButton.addEventListener('click', function(){
        const address = encodeURIComponent(addressInput.value);
        axios.get(`https://api.tomtom.com/search/2/geocode/${address}.json?key=${Api_key}`)
        .then(response => {
            const data = response.data;
            if (data && data.results && data.results.length > 0) {
                const lat = data.results[0].position.lat;
                const lon = data.results[0].position.lon;
                console.log(lat);
                console.log(lon)
                // Display coordinates in the coordinatesDiv
                latitudine.innerHTML = `Latitude: ${lat}`;
                longitudine.innerHTML = `Longitude: ${lon}`;
            } else {
                latitudine.innerHTML = "No results found for the given address.";
            }
        })
        .catch(error => {
            console.error("Error occurred while fetching data:", error);
            coordinatesDiv.innerHTML = "An error occurred. Please try again.";
        });
    });
});

