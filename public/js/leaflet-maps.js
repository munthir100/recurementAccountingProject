// Initialize the map and set its view to a specific geographical location and zoom level
var map = L.map('map').setView([51.505, -0.09], 13);

// Add a tile layer to the map (this one is from OpenStreetMap)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Add a draggable marker to the map at the same location
var marker = L.marker([51.505, -0.09], { draggable: true }).addTo(map);

// Add a popup to the marker
marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

// Event listener for the marker to get the new coordinates after dragging
marker.on('dragend', function (e) {
    var newLatLng = e.target.getLatLng();
    alert("Marker dragged to new position: " + newLatLng.lat + ", " + newLatLng.lng);
});
