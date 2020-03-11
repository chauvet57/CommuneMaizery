
function appelMap() {

    mapboxgl.accessToken = 'pk.eyJ1IjoiZGF2aWQ1NzUzMCIsImEiOiJjazdtMmxoZGgwZGlwM2ZzMnZ0Ynk0amo2In0.Yq3qiW4aIAzbdvmw1eeZlQ';
    var map = new mapboxgl.Map({
        style: 'mapbox://styles/mapbox/light-v10',
        center: [6.33, 49.10],
        zoom: 13,
        pitch: 45,
        bearing: -17.6,
        container: 'map',
        antialias: true
    });

    // The 'building' layer in the mapbox-streets vector source contains building-height
    // data from OpenStreetMap.
    map.on('load', function () {
        // Insert the layer beneath any symbol layer.
        var layers = map.getStyle().layers;

        var labelLayerId;
        for (var i = 0; i < layers.length; i++) {
            if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
                labelLayerId = layers[i].id;
                break;
            }
        }

        map.addLayer(
            {
                'id': '3d-buildings',
                'source': 'composite',
                'source-layer': 'building',
                'filter': ['==', 'extrude', 'true'],
                'type': 'fill-extrusion',
                'minzoom': 15,
                'paint': {
                    'fill-extrusion-color': '#aaa',

                    // use an 'interpolate' expression to add a smooth transition effect to the
                    // buildings as the user zooms in
                    'fill-extrusion-height': [
                        'interpolate',
                        ['linear'],
                        ['zoom'],
                        15,
                        0,
                        15.05,
                        ['get', 'height']
                    ],
                    'fill-extrusion-base': [
                        'interpolate',
                        ['linear'],
                        ['zoom'],
                        15,
                        0,
                        15.05,
                        ['get', 'min_height']
                    ],
                    'fill-extrusion-opacity': 0.6
                }
            },
            labelLayerId
        );
    });

    var popup = new mapboxgl.Popup({ offset: 25})
    .setText("Mairie")
    .setHTML(`<div class="card" style="width: 11rem;">
    <img class="card-img-top" src="/images/image_mairie.jpg" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">Mairie</h>
      <h6> Colligny-Maizery</h6>
    </div>
  </div>`)

    var marker = new mapboxgl.Marker({
        draggable: true
        })
        .setLngLat([6.324718, 49.098906])
        .setPopup(popup)
        .addTo(map);
         
        function onDragEnd() {
        var lngLat = marker.getLngLat();
        coordinates.style.display = 'block';
        coordinates.innerHTML =
        'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
        }
         
        marker.on('dragend', onDragEnd);

  
}