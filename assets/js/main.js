// navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
//   	enableHighAccuracy: true
// });

setupMap([-40.35, -19.7]);

function successLocation(position)
{
  	setupMap([position.coords.longitude, position.coords.latitude]);
}

function errorLocation()
{
  	setupMap([-19.7, -40.35]);
}

function setupMap(center)
{
	const map = new mapboxgl.Map({
		container: "tornus-map",
		style: "mapbox://styles/alanhdiniz/cl0mdpb1j002415o41oog7r1e",
		center: center,
		zoom: 6
	});

	const marker = new mapboxgl.Marker().setLngLat(center).addTo(map);

	const geocoder = new MapboxGeocoder({
		accessToken: mapboxgl.accessToken,
		placeholder: 'Procurar algum lugar',
		mapboxgl: mapboxgl,
		marker: false
	});

	map.addControl(geocoder);
}

function setupMapWithAddress(address)
{
	const map = new mapboxgl.Map({
		container: "tornus-map",
		style: "mapbox://styles/alanhdiniz/cl0mdpb1j002415o41oog7r1e",
		zoom: 6
	});

	const geocoder = new MapboxGeocoder({
		accessToken: mapboxgl.accessToken,
		placeholder: 'Procurar algum lugar',
		mapboxgl: mapboxgl,
		marker: true
	});

	geocoder.setLocation(address);

	map.addControl(geocoder);
}
