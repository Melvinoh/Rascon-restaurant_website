function initMap() {
    const location = { lat: -1.30823, lng: 36.810838 };
    var map = new google.maps.Map(
        document.getElementById('map'),
        {
            center :location,
            scrollwheel:false,
            zoom: 14,
            zoomControl : true,
            panControl : false,
            streetViewControl : true,
            mapTypeControl: false,
            overviewMapControl: true,
            clickable: false
        }
    )
    var marker = new google.maps.Marker({
        position:location,
        map:map,
    })

    window.initMap = initMap;

    
};
