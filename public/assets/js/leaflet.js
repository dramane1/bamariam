// // Map init
var bko = [12.6127496, -8.0655531];

var map = L.map('mapid').setView(bko, 10);

// // Map Image
L.tileLayer('https://maps.heigit.org/openmapsurfer/tiles/roads/webmercator/{z}/{x}/{y}.png', {
    maxZoom: 20
}).addTo(map)
