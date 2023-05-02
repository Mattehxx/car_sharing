const map = L.map('map').setView([20.13847, 1.40625], 2);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

const currentMarkers = [];
// TODO: togliere dall'array i dati precedenti

var btnSearch = document.getElementById("button_navbar");
var txtStart = document.getElementById("partenza");
var txtDestination = document.getElementById("destinazione");
var txtDistance = document.getElementById("txt-distance");

var startLat = 0.0;
var startLon = 0.0;
var destinationLat = 0.0;
var destinationLon = 0.0;
var startPosition;
var destinationPosition;
// autocompletamento della partenza e della destinazione
btnSearch.addEventListener('click', function(){

    const queryStart = txtStart.value;
    fetch('https://nominatim.openstreetmap.org/search?format=json&polygon=1&addressdetails=1&q=' + queryStart)
        .then(result => result.json())
        .then(parsedResult => {
            startLat = parsedResult[0].lat;
            startLon = parsedResult[0].lon;
            startPosition = new L.LatLng(startLat, startLon);
            currentMarkers.push(new L.marker(startPosition).addTo(map));
        });
    const queryDestination = txtDestination.value;

    //TODO: Ajax e gestisco le code response

    fetch('https://nominatim.openstreetmap.org/search?format=json&polygon=1&addressdetails=1&q=' + queryDestination)
        .then(result => result.json())
        .then(parsedResult => {
            destinationLat = parsedResult[0].lat;
            destinationLon = parsedResult[0].lon;
            destinationPosition = new L.LatLng(destinationLat, destinationLon);
            currentMarkers.push(new L.marker(destinationPosition).addTo(map));
        });
    
    var from = turf.point([startLat, startLon]);
    var to = turf.point([destinationLat, destinationLon]);
    var options = {units: 'kilometers'};
    var distance = turf.distance(from, to, options);
    txtDistance.innerText = "Distanza : " + distance;
   
});