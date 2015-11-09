
<div class="row" style="margin-top: 5%;">
    <div class="col-md-8 col-md-offset-2" id="list1">



    </div>
</div>

<script>
    function runGetList() {
        var platno = "<?=(isset($_GET['platno']))?($_GET['platno']):('-'); ?>";
        $.post("<?= site_url('passenger/getList1'); ?>", {
            platno: platno
        }).done(function (data) {
            $("#list1").html(data);
        });
        //setTimeout('runGetList()', 20000);
    }
    $(document).ready(function () {
        runGetList();
    });
</script>