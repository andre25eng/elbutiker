window.onload = start;

function start() {
    const eLista = document.querySelector(".platser");
    const eKnapp = document.querySelector("button");
    let url = "./spara2.php";
    let index = 0;

    mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmUyNWVuZyIsImEiOiJjanBheTM4NW8yMDhmM3BvM2JiaTM3d250In0.D7717VTsZje4SAxxUqanEQ';
    let map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/andre25eng/cjpb2s8a9a4ya2slmb0z2nyem', // stylesheet location
        center: [18.06, 59.33], // starting position [lng, lat]
        zoom: 11 // starting zoom
    });

    map.on("click", addMarker);

    function addMarker(e) {
        let marker1 = new mapboxgl.Marker({
                draggable: true
            })
            .setLngLat(e.lngLat)
            .addTo(map);

        console.log(e.lngLat);
        eLista.innerHTML += "<input name=\"koordinater[]\" type=\"text\" value=\"" + rund(e.lngLat.lng) + "," + rund(e.lngLat.lat) + "\"><input name=\"beskrivningar[]\" type=\"text\" value=\"Beskrivning\">";
    }

    function rund(tal) {
        return tal.toFixed(5);
    }

    eKnapp.addEventListener("click", spara);
    function spara() {
        let ajax = new XMLHttpRequest();
        ajax.addEventListener("loadend", sparaPlatser);
        function sparaPlatser() {
            if (this.responseText == "klart") {
                alert("Platserna sparades i filen.");
            } else {
                alert("Något blev fel.");
            }
        }
        ajax.open("POST", url, true);

        let formData = new FormData(eLista);

        ajax.send(formData);
    }
}