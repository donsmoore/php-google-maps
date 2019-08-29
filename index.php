<?php require_once('./code/setup.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title> TEST - GivePulse  </title>

  <?php require_once("./js/script.js.php"); ?>

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false&libraries=geometry"></script>
  <style type="text/css" media="screen">@import "./css/style.css";</style>
</head>

<body onload="initialize();">

  <div class="debug1" id="debug1">
    <?php echo $givepulse->debug; ?>

  </div>

  <div class="map1" id="map_canvas">
    <h1 style="padding-top: 250px; text-align: center; color: #999; ">Loading GeoEye map. Please Wait.</h1>
  </div>

</body>
</html>
