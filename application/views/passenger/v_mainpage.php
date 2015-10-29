
<div class="row" style="margin-top: 5%;">
    <div class="col-md-8 col-md-offset-2" id="list1">



    </div>
</div>

<script>
    function runGetList() {
        $.post("<?= site_url('passenger/getList1'); ?>", {}).done(function (data) {
            $("#list1").html(data);
        });
        setTimeout('runGetList()', 20000);
    }
    $(document).ready(function () {
        runGetList();
    });
</script>