
<?php
$loc = "";
$bilLoc = 0;
if (isset($location) && !empty($location)) {
    foreach ($location as $lo) {
        $loc .= "['".$lo->lo_name."', ".$lo->lo_lat_lon.", ".$lo->lo_id."],\n";
        $bilLoc += 1;
    }
}
if (isset($driver) && !empty($driver)) {
    foreach ($driver as $dr) {
        if (isset($platno) && !empty($platno)) {
            if ($platno == $dr->bu_plat) {
                $loc .= "['Bus: ".$dr->bu_plat."<br />Driver: ".$dr->u_fullname."', ".$dr->dr_lat_lon.", ".$dr->dr_id."],\n";
            }
        }
    }
}
?>

<div class="row">
    <div class="col-md-12">
        <div id="map" style="width: 650px; height: 500px;"></div>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#.</th>
                    <th>Bus Plat No.</th>
                    <th>Driver</th>
                </tr>
            </thead>
            <tbody>
                <?php $ii=1; if (isset($driver2) && !empty($driver2)) { foreach ($driver2 as $dr2) { ?>
                <tr>
                    <td><?=$ii++; ?>.</td>
                    <td><a href="?platno=<?=$dr2->bu_plat; ?>"><?=$dr2->bu_plat; ?></a></td>
                    <td><a href="?platno=<?=$dr2->bu_plat; ?>"><?=$dr2->u_fullname; ?></a></td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    
    var xmap = document.getElementById('map');
    getLocation();
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            xmap.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    function showPosition(position) {
        setOtherLocation(position.coords.latitude, position.coords.longitude);
    }
    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                xmap.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                xmap.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                xmap.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                xmap.innerHTML = "An unknown error occurred."
                break;
        }
    }
    
    function setOtherLocation(posX, posY) {
        var numLoc = <?= $bilLoc; ?>;
        var locations = [
        <?= $loc; ?>
        ];
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: new google.maps.LatLng(posX, posY),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });
            if (i < numLoc) {
                // location
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
            } else {
                // driver
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png');
            }
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
        
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(posX, posY),
            map: map
        });
        marker.setIcon('http://maps.google.com/mapfiles/ms/icons/yellow-dot.png');
        // self location
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent("I'm here!");
                infowindow.open(map, marker);
            }
        })(marker, locations.length));
    }
</script>