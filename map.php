<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="jquery.mobile-1.4.4/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link href="jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.css" rel="stylesheet" type="text/css"/>
    <script src="jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.js" type="text/javascript"></script>
    <script src="jquery.mobile-1.4.4/myjs.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
     
    <style>
      #map-page, #map-canvas { width: 100%; height: 100%; padding: 0; }
    </style> 
      
  </head>
  <body>
      <div data-role="page" id="map-page" data-url="map-page">

    <div data-role="header" data-theme="a">
    <h1>Maps</h1>
    </div>
    <div role="main" class="ui-content" id="map-canvas">
        <!-- map loads here... -->
    </div>
          <div data-role="footer">
              <!--          <a href="#myPanel" class="ui-btn ui-btn-inline ui-icon-bars ui-btn-icon-left" data-display="reveal"></a>          

            <div data-role="panel" style = "background-color:rgb(213, 213, 213)" id="myPanel">
                <?php
//                $objlocation = new currentLocationClass();
//                $objlocation->get_last_row();
//                $rowlocation = $objlocation->fetch();
//                $lat = $rowlocation['latitude'];
//                $long = $rowlocation['longitude'];
////                $objlocation->get_last_location($rowlocation['id']);
////                $locationid = $objlocation->fetch();
//                ?>
                <h3>Menu</h3>
                <br>
                <ul data-role="listview">		
                    <li><a href="" onclick="secondPage()">Pay for my bus fare</a></li>	
                    <li><a href="" onclick="redirect()">View current location of bus</a></li>
                    <li><a href="#">Norway</a></li>	
                    <li><a href="#">Germany</a></li>
                </ul>
            </div>-->
              </div>
</div>

 
  </body>
</html>