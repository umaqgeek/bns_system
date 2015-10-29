
<div class="row" style="margin-top: 5%;">
    <div class="col-md-8 col-md-offset-2">
        
        <?php
        if (isset($_GET['location'])) {
            if (isset($lo) && !empty($lo)) {
                echo "<h3>" . $lo[0]->lo_name . "</h3>";
            }
            $ayat = (isset($_GET['location'])) ? ($this->my_func->encrypt($_GET['location'])) : ("No bus!");
            $qrcode = new QRGenerator($ayat, 100);  // 100 is the qr size
            print "<img src='" . $qrcode->generate() . "'>";
        }
            ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($location) && !empty($location)) { foreach ($location as $lo) { ?>
                <tr>
                    <td><?=$lo->lo_name; ?></td>
                    <td><?=$lo->lt_desc; ?></td>
                    <td><a href="<?=site_url('admin/qrgen?location='.$this->my_func->encrypt($lo->lo_id)); ?>">Generate Code</a></td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
        
    </div>
</div>