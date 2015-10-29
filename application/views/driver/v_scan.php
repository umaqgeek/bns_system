
<div class="row" style="margin-top: 5%;">
    <div class="col-md-8 col-md-offset-2">
        
        <video autoplay></video>
        <button id="reset" class="btn btn-primary">Reset camera</button>
        <script src="<?= base_url(); ?>assets/js/qcode-decoder.min.js"></script>
        <script type="text/javascript">
 
        (function () {
          'use strict';

                var qr = new QCodeDecoder();

                if (!(qr.isCanvasSupported() && qr.hasGetUserMedia())) {
                    alert('Your browser doesn\'t match the required specs.');
                    throw new Error('Canvas and getUserMedia are required');
                }

                var video = document.querySelector('video');
                var reset = document.querySelector('#reset');
                var stop = document.querySelector('#stop');

                function resultHandler(err, result) {
                    if (err)
                        return console.log(err.message);
                    $.post("<?=site_url('driver/readBusID'); ?>", { bu:"<?=$busx; ?>", qrcode:result }).done(function(data) {
                        alert(data);
                        location.href='<?=site_url('driver/selectBus'); ?>';
                    });
                }

                // prepare a canvas element that will receive
                // the image to decode, sets the callback for
                // the result and then prepares the
                // videoElement to send its source to the
                // decoder.

                qr.decodeFromCamera(video, resultHandler);

                // attach some event handlers to reset and
                // stop whenever we want.

                reset.onclick = function () {
                    qr.decodeFromCamera(video, resultHandler);
                };

      //    stop.onclick = function () {
      //      qr.stop();
      //    };

            })();
        </script>
        
    </div>
</div>