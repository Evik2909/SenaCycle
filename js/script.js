function iniciarMap(){
    var coord = {lat: 40.73150667976543, lng: -74.05345310275968};
    var map = new google.maps.Map(document.getElementById('map'),{
        zoom: 17,
        center: coord 
    })
    var marker = new google.maps.Marker({
        position: coord,
        map: map
    })
}