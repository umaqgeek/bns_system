
<div class="row" style="margin-top: 5%;">
    <div class="col-md-8 col-md-offset-2">
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Bus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php if (isset($bus) && !empty($bus)) { foreach ($bus as $bu) { ?>
                <tr>
                    <td><?=$bu->bu_plat; ?></td>
                    <td><a href="<?=site_url('driver/selectBus/2?bu='.$this->my_func->encrypt($bu->bu_id)); ?>">Choose</a></td>
                </tr>
                <?php } } ?>
                
            </tbody>
        </table>
        
    </div>
</div>