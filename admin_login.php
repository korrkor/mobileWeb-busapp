
<!DOCTYPE html>
<html>

    <head> 

        <script src="jquery.mobile-1.4.4/jquery-1.11.1.min.js" type="text/javascript"></script>
        <link href="jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.css" rel="stylesheet" type="text/css"/>
        <script src="jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.js" type="text/javascript"></script>
        <link href="mycss.css" rel="stylesheet" type="text/css"/>
        <script src="jquery.mobile-1.4.4/myjs.js" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <meta	name="viewport"	content="width=device-width,	initial-scale=1">
        <title>Ashesi Bus Tracker</title>
    </head>
    <body>
        <?php
        include_once("dropoff.php");
        include_once("currentLocationClass.php");
        include_once("reservation.php");
//        include_once ("gen.php");
//        include_once ("gen.js");
        ?>
        <!--Home Page-->

        <!--******************************************************************************************************************-->

        <!--admin page-->
        <div data-role="page" id="admin">	
            <div data-role="header">		
            </div>	
            <div role="main" class="ui-content"> 
                <a	href="#"	data-role="bu>on"	data-rel="back">Back to home</a>
                <div class="ui-field-contain">
                    <label for="username">Username:</label>	
                    <input type="text" id="username" name="username" value=""/>	
                    <br>
                    <br>
                    
                    <label for="password">Password:</label>	
                    <input class="ui-icon-lock" type="password" id="password" name="password" value=""/><br> 
                    
                </div>
                <button id = "button_login" onclick= "admin_view()"  value="Save my reservation">Login</button>
   
  

            </div>	
            <div data-role="footer">
             
            </div>
        </div>

        <!--</div>-->




        <!--        <div data-role="page" id="map-page" data-url="map-page">
            <div data-role="header" data-theme="a">
            <h1>Maps</h1>
            </div>
            <div role="main" class="ui-content" id="map-canvas">
                 map loads here... 
            </div>
        </div>-->

        <!--        <div data-role="page" id="viewbus">	
                    <div data-role="header">		
                    </div>	
                    <div role="main" class="ui-content">
                        
                        <a href="" onclick="InitializeMap()" data-filter="true" data-rel="popup" data-position-to="window" class="ui-btn ui-btn-inline">Make A  Reservation</a>
                        <div id="map-canvas" style="width: 100%; height: 100%"></div>
                    </div>	
                    <div data-role="footer">	
                    </div>	
                </div>-->

        <!--        <div data-role="page" id="payfare">	
                    <div data-role="header">
        
                    </div>	
                    <div data-role="content">
                        <div id="qr">
        
                        </div>
                    </div>	
                    <div data-role="footer">
        
                    </div>	
                </div>-->
    </body>
</html>
