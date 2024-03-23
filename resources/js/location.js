const API_KEY = "ARRIZGGoUek6AqDTwVcXta7pCZ07Q490";
const addressInput = document.getElementById("address");
const axios = require("axios");

function getCoords() {
    const address = addressInput.value;

    return axios.get(`https://api.tomtom.com/search/2/geocode/${address}.json?key=${API_KEY}`)
        .then(response => {
            const data = response.data;
            const coordinates = data.results[0].position;
            console.log(coordinates);
            return coordinates;
        })
        .catch(error => {
            console.error("Error fetching coordinates:", error);
            throw error;
        });
};

document.addEventListener("DOMContentLoaded", function() {
    const submitBtn = document.getElementById("submitBtn");
    if (submitBtn) {
        submitBtn.addEventListener("click", async () => {
            try {
                const coordinates = await getCoords();
                // Your code to handle the coordinates
            } catch (error) {
                console.error("Error:", error);
            }
        });
    } else {
        console.error("Element with id 'submitBtn' not found.");
    }
});
document.addEventListener("DOMContentLoaded", function() {
    const API_KEY = 'ARRIZGGoUek6AqDTwVcXta7pCZ07Q490';
    const address = '1600 Amphitheatre Parkway, Mountain View, CA';
    const geocodeBtn = document.getElementById('geocodeBtn');
    const latitudeElement = document.getElementById('latitude');
    const longitudeElement = document.getElementById('longitude');

    geocodeBtn.addEventListener('click', function() {
        axios.get(`https://api.tomtom.com/search/2/geocode/${encodeURIComponent(address)}.json?key=${API_KEY}`)
            .then(response => {
                const data = response.data;
                if (data.results && data.results.length > 0) {
                    const location = data.results[0].position;
                    latitudeElement.textContent = location.lat;
                    longitudeElement.textContent = location.lon;
                } else {
                    console.log('No results found.');
                }
            })
            .catch(error => {
                console.error('Error fetching coordinates:', error);
            });
    });
});
