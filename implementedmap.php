<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBpF38hUqeQQeXBR2z2G92_Nz3jrFllfyQ"></script>
<script type="text/javascript">
    var route = ["K17","K29A/B","K32","K32A","K33","K35","K36A"];
    
    var points = [
        {//0
            "title": 'Terminal Cikarang',
            "lat": '-6.261542',
            "lng": '107.137266',
            "description": 'Terminal Cikarang'
        }
        ,
        {//1
            "title": 'Lemah Abang Station',
            "lat": '-6.270078',
            "lng": '107.178743',
            "description": 'Station Lemah Abang'
        }
        ,
        {
            "title": 'Serang',
            "lat": '-6.359161',
            "lng": '107.118539',
            "description": 'Serang Cibarusah'
        }
        ,
        {//2
            "title": 'Cibarusah',
            "lat": '-6.437399',
            "lng": '107.075308',
            "description": 'Cibarusah'
        }
        ,
        {//3
            "title": 'Pebayuran',
            "lat": '-6.261645',
            "lng": '107.271875',
            "description": 'Pebayuran'
        }
        ,
        {//4
            "title": 'Sukadanau',
            "lat": '-6.283510',
            "lng": '107.106190',
            "description": 'Sukadanau'
        }
        ,
        {//5
            "title": 'Cibitung',
            "lat": '-6.232785',
            "lng": '107.107437',
            "description": 'Cibitung'
        }
        ,
        {//6
            "title": 'MM2100',
            "lat": '-6.294974',
            "lng": '107.078885',
            "description": 'MM2100'
        }
        ,
        {//7
            "title": 'Delta Mas',
            "lat": '-6.365238',
            "lng": '107.172906',
            "description": 'Delta Mas'
        }
        ,
        {//8
            "title": 'Lippo',
            "lat": '-6.342640',
            "lng": '107.153672',
            "description": 'Lippo Cikarang'
        }
        ,
        {//9
            "title": 'CBL',
            "lat": '-6.227092',
            "lng": '107.094286',
            "description": 'CBL'
        }
    ];
    
    

</script>
<script type="text/javascript">
    var R = "K29A/B";
    window.onload = function() {
        var mapOptions = {
            center: new google.maps.LatLng(/*markers[0].lat*/-6.2828, /*markers[0].lng*/107.1767),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Start General Code
        var path = new google.maps.MVCArray();
        var service = new google.maps.DirectionsService();

        var infoWindow = new google.maps.InfoWindow();
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        var poly = new google.maps.Polyline({
            map: map,
            strokeColor: '#FF8200'
        });
        var lat_lng = new Array();
        // End General Code
        
        //To make the specific route
        var markers = [];
        
        switch(R){
            case "K17":{
                markers[0] = points[0];
                markers[1] = points[3];
                /*
                markers[1] = points[1];
                markers[2] = points[2];
                markers[3] = points[3];
                */
                break;
            }
            case "K29A/B":{
                markers[0] = points[0];
                markers[1] = points[3];
                break;
            }
            case "K32":{
                markers[0] = points[0];
                markers[1] = points[4];
                break;
            }
            case "K32A":{
                markers[0] = points[0];
                markers[1] = points[6];
                /*
                markers[1] = points[5];
                markers[2] = points[6];
                */
                break;
            }
            case "K33":{
                markers[0] = points[1];
                markers[1] = points[8];
                break;
            }
            case "K35":{
                markers[0] = points[0];
                markers[1] = points[7];
                break;
            }
            case "K36A":{
                markers[0] = points[0];
                markers[1] = points[9];
                /*
                markers[1] = points[5];
                markers[2] = points[9];
                */
                break;
            }
        }
        
        for (i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            lat_lng.push(myLatlng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
            (function(marker, data) {
                google.maps.event.addListener(marker, "click", function(e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
        for (var i = 0; i < lat_lng.length; i++) {
            if ((i + 1) < lat_lng.length) {
                var src = lat_lng[i];
                var des = lat_lng[i + 1];
                path.push(src);
                poly.setPath(path);
                service.route({
                    origin: src,
                    destination: des,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                }, function(result, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                            path.push(result.routes[0].overview_path[i]);
                        }
                    }
                });
            }
        }
        //Supposed to create a pin for current loc
        var current = {lat: -6.2828, lng: 107.1767};
        var marker = new google.maps.Marker({
          position: current,
          map: map
        });
    }

</script>
<div id="dvMap" style="width: 500px; height: 500px">
</div>
