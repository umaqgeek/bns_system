
<form method="post" action="<?=site_url('login/checklogin'); ?>">
<div class="row" style="margin-top: 5%;">
    <div class="col-md-6 col-md-offset-3">
        
        <div class="row">
            <div class="col-md-2">Username :</div>
            <div class="col-md-6"><input type="text" class="form-control" name="username" placeholder="username" /></div>
        </div>
        <div class="row">
            <div class="col-md-2">Password :</div>
            <div class="col-md-6"><input type="password" class="form-control" name="password" placeholder="password" /></div>
        </div>
        <div class="row" style="margin-top: 1%;">
            <div class="col-md-2"></div>
            <div class="col-md-4"><button type="submit" class="btn btn-primary">Login</button></div>
        </div>
        
    </div>
</div>
</form>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User Type</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($users) && !empty($users)) { foreach ($users as $u) { ?>
                <tr>
                    <td><?=$u->ut_desc; ?></td>
                    <td><?=$u->u_username; ?></td>
                    <td><?=$u->u_password; ?></td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>