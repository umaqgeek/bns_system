
<table class="table table-striped">
    <thead>
        <tr>
            <th>Bus Plat</th>
            <th>Driver</th>
            <th>Location</th>
            <th>Date Time</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($driver_location) && !empty($driver_location)) { foreach ($driver_location as $dl) { ?>
        <tr>
            <td><?=$dl->bu_plat; ?></td>
            <td><?=$dl->u_fullname; ?></td>
            <td><?=$dl->lo_name; ?></td>
            <td><?=$dl->dl_datetime; ?></td>
        </tr>
        <?php } } ?>
    </tbody>        
</table>