function initMap()
{
    const es = {lat: -19.5777346, lng: -37.612881};
    const map = new google.maps.Map(document.getElementsByClassName('google-map'), {
        zoom: 4,
        center: es
    });
    const marker = new google.maps.Marker({
        position: es,
        map: map
    });
}