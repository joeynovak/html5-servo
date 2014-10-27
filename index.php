<!DOCTYPE HTML>
<html>
<head>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="riffwav.js"></script>
    <script type="text/javascript" src="servo.js"></script>
</head>
<body>
<script type="text/javascript">
    var lastx = 0;
    var lasty = 0;
    var lastz = 0;
    var lastEvent = 0;
    window.ondevicemotion = function (event) {
        var threshold = 10;

        var ax = event.accelerationIncludingGravity.x
        var ay = event.accelerationIncludingGravity.y
        var az = event.accelerationIncludingGravity.z

        if (lastx == 0) {
            lastx = Math.abs(ax);
            lasty = Math.abs(ay);
            lastz = Math.abs(az);
        }

        if(lastEvent > 0){
            lastEvent--;
        }
        if(lastEvent == 0 && (Math.abs(lastx - Math.abs(ax)) > threshold || Math.abs(lasty - Math.abs(ay)) > threshold || Math.abs(lastz - Math.abs(az)) > threshold)){
            jQuery('#msgs').append("Too much change");
            ServoJs.moveTo(1, 0);
            setTimeout(function(){
                ServoJs.moveTo(1, 100);
            }, 400);

            setTimeout(function(){
                ServoJs.moveTo(1, 0);
            }, 800);
            lastEvent = 20;
        }

        lastx = Math.abs(ax);
        lasty = Math.abs(ay);
        lastz = Math.abs(az);

        jQuery('#ax').html(Math.round(ax * 100) / 100.0);
        jQuery('#ay').html(Math.round(ay * 100) / 100.0);
        jQuery('#az').html(Math.round(az * 100) / 100.0);
    }
</script>
X: <span id="ax">?</span>
Y: <span id="ay">?</span>
Z: <span id="az">?</span>
Z: <span id="msgs">?</span>
</html>