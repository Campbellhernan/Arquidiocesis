function initMap() {
    //  Map for each record
    $.each($(".mini_map"), function(index, value) {
        var center = {lat: 10.182848, lng: -68.002635};
        var id = $(value).data("id");
        var values = $(value).data("map") ? $(value).data("map"): {'type': 'none'};

        var options = {};
        var marker;

        var map = new google.maps.Map(document.getElementById('mini_map' + id), {
            zoom: 18,
            mapTypeId: 'roadmap',
            center: center
        });

        switch (values.type) {
            case google.maps.drawing.OverlayType.MARKER:
                var marker = new google.maps.Marker({
                    'map': map,
                    'position': values['data']
                });
                map.setCenter(values['data']);
                break;
            case google.maps.drawing.OverlayType.POLYGON:
                var marker = new google.maps.Polygon({
                    fillColor: '#ffff00',
                    fillOpacity: 0.35,
                    strokeWeight: 1,
                    zIndex: 1,
                    map: map,
                    paths: values['data']
                });
                if (values['data'].length >= 1) {
                    map.setCenter(values['data'][0]);
                }
                break;
            case google.maps.drawing.OverlayType.RECTANGLE:
                var marker = new google.maps.Rectangle({
                    fillColor: '#ffff00',
                    fillOpacity: 0.35,
                    strokeWeight: 1,
                    zIndex: 1,
                    map: map,
                    bounds: values['data']
                });
                map.setCenter(marker.getBounds().getCenter());
                break;
        }
    });
}
