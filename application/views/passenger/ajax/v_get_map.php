
<div id="map" style="width: 800px; height: 600px;"></div>

<?php
$loc = "";
if (isset($location) && !empty($location)) {
    foreach ($location as $lo) {
        $loc .= "['".$lo->lo_name."', ".$lo->lo_lat_lon.", ".$lo->lo_id."],\n";
    }
}
if (isset($driver) && !empty($driver)) {
    foreach ($driver as $dr) {
        $loc .= "['Bus: ".$dr->bu_plat."<br />Driver: ".$dr->u_fullname."', ".$dr->dr_lat_lon.", ".$dr->dr_id."],\n";
    }
}
?>

<script type="text/javascript">
    var locations = [
        <?=$loc; ?>
    ];
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: new google.maps.LatLng(2.26, 102.28),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>