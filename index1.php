
<!DOCTYPE html>
<html>

    <head> 

        <link rel = "stylesheet" href = "jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.css">
        <script src="jquery.mobile-1.4.4/jquery.qrcode.js"></script>
        <!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
        <!--<link type="text/css" rel="stylesheet" href="buswebapp.css">-->
        <script src = "jquery.mobile-1.4.4/jquery-1.11.1.min.js"></script>
        <script src = "jquery.mobile-1.4.4/myjs.js"></script>
        <script src = "jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.js"></script>

        <!--        <meta name="viewport" content="width-device-width, initial-scale=1">-->
        <title>hh</title>
    </head>
    <body>

        <script>
            
        </script>

        <?php
        include_once("dropoff.php");
        include_once("currentLocationClass.php");
        include_once("reservation.php");
        ?>

        <!--Home Page-->
        <div data-role = "page" id = "homepage">
            <a href="#myPanel" class="ui-btn ui-btn-inline ui-icon-bars ui-btn-icon-left" data-display="reveal"></a>          

            <div data-role="panel" style = "background-color:rgb(213, 213, 213)" id="myPanel">
                <?php
                $objlocation = new currentLocationClass();
                $objlocation->get_last_id($objlocation);
                $rowlocation = $objlocation->fetch();
                $objlocation->get_last_location($rowlocation);
                $locationid = $objlocation->fetch();
                ?>
                <h3>ljljkjlkjk</h3>
                <br>
                <ul data-role="listview">		
                    <li><a href="" onclick="secondPage()">Pay for my bus fare</a></li>	
                    <li><a href="" onclick="initialize()">View current location of bus</a></li>
                    <li><a href="#">Norway</a></li>	
                    <li><a href="#">Germany</a></li>
                </ul>
            </div>

            <div data-role = "header">

            </div>
            <div role = "main" class = "ui-content" style="background-color: gainsboro">
                <p>View itinerary for the week:</p> 

                <div data-role="collapsible-set">	
                    <div data-role="collapsible">	
                        <h1 style="color:green">Monday </h1> 
                        <p>Departure time: 17:10 hrs</p>
                        
<!--//                        $reserve = new reservation();
//                        $reserve ->num_seats_available("Monday");
//                        
//                        echo"<p>$'num seats available;' . reserve </p>";
//                        
//                        "<p></p>";-->
                       
                        
                        
                        
                        
                        <p>Number of Passengers(paid reservations) : </p>
                    </div>
                    <br>

                    <div data-role="collapsible">	
                        <h1 style="color:green">Tuesday </h1>	
                        <p>Departure time: 17:10 hrs</p>
                        <p>Number of available seats:15 </p>
                        <p>Number of reserved seats: 15</p>
                        <p>Number of Passengers(paid reservations) : </p>
                    </div>
                    <br>

                    <div data-role="collapsible">	
                        <h1 style="color:green">Wednesday </h1>	
                        <p>Departure time: 17:10 hrs</p>
                        <p>Number of available seats:15 </p>
                        <p>Number of reserved seats: 15</p>
                        <p>Number of Passengers(paid reservations) : </p>	
                    </div>
                    <br>

                    <div data-role="collapsible">	
                        <h1 style="color:green">Thursday </h1>	
                        <p>Departure time: 17:10 hrs</p>
                        <p>Number of available seats:15 </p>
                        <p>Number of reserved seats: 15</p>
                        <p>Number of Passengers(paid reservations) : </p>	
                    </div>
                    <br>

                    <div data-role="collapsible">	
                        <h1 style="color:green">Friday</h1>	
                        <p>Departure time: 17:10 hrs</p>
                        <p>Number of available seats:15 </p>
                        <p>Number of reserved seats: 15</p>
                        <p>Number of Passengers(paid reservations) : </p>	
                    </div>
                    <br>
                </div>

                <a href="#myPopup" data-rel="popup" data-position-to="window" class="ui-btn ui-btn-inline">Make A  Reservation</a>

                <div data-role="popup" id="myPopup" class="ui-content">
                    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                    <form method="get" action="">

                        <h3>Reservation detail</h3>
                        <div class="ui-field-contain">
                            <label>Reservation Day:</label>
                            <select name="day" id="day" data-native-menu="false">
                                <option value=Monday>Monday</option>
                                <option value=Tuesday>Tuesday</option>
                                <option value=Wednesday>Wednesday</option>
                                <option value=Thursday>Thursday</option>
                                <option value=Friday>Friday</option>
                            </select>
                            <br>

                            <label for="location">Select Destination</label>
                            <select name="location" id="location" data-native-menu="false">
                                <?php
                                $obj = new dropoff();
                                $obj->get_all_stops();
                                $row = $obj->fetch();

                                while ($row) {
                                    echo"<option value='$row[doid]'>$row[name]</option>";
                                    $row = $obj->fetch();
                                }
                                ?>
                            </select><br>

                            <fieldset data-role="controlgroup">
                                <legend>Notify me when bus is leaving:</legend>
                                <label for="male">Yes</label>
                                <input type="radio" name="yes" id="male" value="male"><br>
                                <label for="female">No</label>
                                <input type="radio" name="no" id="female" value="female"> 
                            </fieldset>
                        </div>
                        <input type="submit" onclick= "add_reservation()" data-inline="true" value="Save my reservation">

                    </form>

                </div> 

            </div> 
        </div>

        <div data-role="page" id="viewbus">	
            <div data-role="header">		
            </div>	
            <div role="main" class="ui-content">
                <!--                <a href="" onclick="InitializeMap()" data-filter="true" data-rel="popup" data-position-to="window" class="ui-btn ui-btn-inline">Make A  Reservation</a>-->
                <div id="map-canvas" style="width: 100%; height: 100%"></div>
            </div>	
            <div data-role="footer">	
            </div>	
        </div>	

        <div data-role="page" id="payfare">	
            <div data-role="header">

            </div>	
            <div data-role="content">
                <div id="qr">

                </div>
            </div>	
            <div data-role="footer">

            </div>	
        </div>
    </body>
</html>
