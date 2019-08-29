<script type="text/javascript">

var the_map = null;
var main_marker = null;

var center_lat = 30.26921963;
var center_lng = -97.73640127;

function initialize() {
    var TheLoc = new google.maps.LatLng(center_lat, center_lng);
    var myMapOptions = { zoom: 11 ,center: TheLoc ,scaleControl: true ,mapTypeId: google.maps.MapTypeId.ROADMAP  };
    the_map = new google.maps.Map(document.getElementById("map_canvas"), myMapOptions);
    the_map.setTilt(0);  // otherwise it is titled 45 degrees

    main_marker = new google.maps.Marker({ title: 'Austin', map: the_map, draggable: true, position: new google.maps.LatLng(center_lat, center_lng), visible: false });

  <?php for ($n=0; $n<count($givepulse->rows); $n++) { ?>
    var marker<?php echo $n ?> = new google.maps.Marker({ position: new google.maps.LatLng(<?php echo $givepulse->rows[$n]['latitude'] ?>, <?php echo $givepulse->rows[$n]['longitude'] ?>), title: '<?php echo htmlentities($givepulse->rows[$n]['title'], ENT_QUOTES) ?> \n <?php echo htmlentities($givepulse->rows[$n]['address1'], ENT_QUOTES) ?> ', map: the_map, clickable: true, icon: './images/marker-purple.png' });
  <?php } ?>

}

</script>