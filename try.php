
<!DOCTYPE html>
<html>

    <head> 

        <script src="jquery.mobile-1.4.4/jquery-1.11.1.min.js" type="text/javascript"></script>
        <link href="jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.css" rel="stylesheet" type="text/css"/>
        <script src="jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.js" type="text/javascript"></script>
        <link href="mycss.css" rel="stylesheet" type="text/css"/>
        <script src="jquery.mobile-1.4.4/myjs.js" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
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
        <div data-role = "page" id = "homepage" data-theme="a">
            <a href="#myPanel" class="ui-btn ui-btn-inline ui-icon-bars ui-btn-icon-left" data-display="reveal"></a>          

            <div data-role="panel" style = "background-color:rgb(213, 213, 213)" id="myPanel">
                <?php
                $objlocation = new currentLocationClass();
                $objlocation->get_last_row();
                $rowlocation = $objlocation->fetch();
                $lat = $rowlocation['latitude'];
                $long = $rowlocation['longitude'];
                ?>
                <h2>Menu</h2>
                <br>
                <ul data-role="listview">		
                    <li><a href=""  onclick="secondPage()">Pay for my bus fare</a></li>	
                    <li><a href="" onclick="redirect(<?php echo $lat ?>, <?php echo $long ?>)">View current location of bus</a></li>

                </ul>
            </div>
            <div data-role = "header">
            </div>
            <div role = "main" class = "ui-content" style="background-color: gainsboro">

                <a id="admin_login" href="#admin">Login as admin</a>
                <div id="ticket"></div>

                <h4>View itinerary for the week:</h4>           

                <div data-role="collapsible-set">	
                    <div data-role="collapsible">	
                        <h1 style="color:green">Monday </h1> 
                        <p>Departure time: 17:10 hrs</p>
                        <?php
                        $monday = "Monday";
                        $reserve = new reservation();
                        $reserve->num_reservations_per_day("Monday");
                        $row_reserve = $reserve->fetch();
                        $seats_available = $reserve->num_seats_available("Monday");
                        $paid_reservations = $reserve->num_paid("Monday");
                        $paid_row = $reserve->fetch();
                        echo "Number of reserved seats:" . " " . $row_reserve['number'];
                        echo"<br>";
                        echo"<br>";
                        echo "Number of seats available:" . " " . $seats_available;
                        echo"<br>";
                        echo"<br>";
                        echo "Number of paid reservations:" . " " . $paid_row['number'];
                        ?>
                        <br>
                        <a href="#viewNames"  onclick="names('Monday')" data-rel="popup" data-position-to="window" class="ui-btn ui-btn-inline">See people who have reserved</a>
                    </div>
                    <br>

                    <div data-role="collapsible">	
                        <h1 style="color:green">Tuesday </h1>	
                        <p>Departure time: 17:10 hrs</p>
                        <?php
                        $reserve2 = new reservation();
                        $reserve2->num_reservations_per_day("Tuesday");
                        $row_reserve2 = $reserve2->fetch();
                        $seats_available2 = $reserve2->num_seats_available("Tuesday");
                        $paid_reservations2 = $reserve2->num_paid("Tuesday");
                        $paid_row2 = $reserve2->fetch();
                        echo "Number of reserved seats:" . " " . $row_reserve2['number'];
                        echo"<br>";
                        echo"<br>";
                        echo "Number of seats available:" . " " . $seats_available2;
                        echo"<br>";
                        echo"<br>";
                        echo "Number of paid reservations:" . " " . $paid_row2['number'];
                        ?>
                    </div>
                    <br>

                    <div data-role="collapsible">	
                        <h1 style="color:green">Wednesday </h1>	
                        <p>Departure time: 17:10 hrs</p>
                        <?php
                        $reserve3 = new reservation();
                        $reserve3->num_reservations_per_day("Wednesday");
                        $row_reserve3 = $reserve3->fetch();
                        $seats_available3 = $reserve3->num_seats_available("Wednesday");
                        $paid_reservations3 = $reserve3->num_paid("Wednesday");
                        $paid_row3 = $reserve3->fetch();
                        echo "Number of reserved seats:" . " " . $row_reserve3['number'];
                        echo"<br>";
                        echo"<br>";
                        echo "Number of seats available:" . " " . $seats_available3;
                        echo"<br>";
                        echo"<br>";
                        echo "Number of paid reservations:" . " " . $paid_row3['number'];
                        ?>	
                    </div>
                    <br>

                    <div data-role="collapsible">	
                        <h1 style="color:green">Thursday </h1>	
                        <p>Departure time: 17:10 hrs</p>
                        <?php
                        $reserve4 = new reservation();
                        $reserve4->num_reservations_per_day("Thursday");
                        $row_reserve4 = $reserve4->fetch();
                        $seats_available4 = $reserve4->num_seats_available("Thursday");
                        $paid_reservations4 = $reserve4->num_paid("Thursday");
                        $paid_row4 = $reserve4->fetch();
                        echo "Number of reserved seats:" . " " . $row_reserve3['number'];
                        echo"<br>";
                        echo"<br>";
                        echo "Number of seats available:" . " " . $seats_available3;
                        echo"<br>";
                        echo"<br>";
                        echo "Number of paid reservations:" . " " . $paid_row4['number'];
                        ?>	
                    </div>
                    <br>

                    <div data-role="collapsible">	
                        <h1 style="color:green">Friday</h1>	
                        <p>Departure time: 17:10 hrs</p>    
                        <?php
                        $reserve5 = new reservation();
                        $reserve5->num_reservations_per_day("Friday");
                        $row_reserve5 = $reserve5->fetch();
                        $seats_available5 = $reserve5->num_seats_available("Friday");
                        $paid_reservations5 = $reserve5->num_paid("Friday");
                        $paid_row5 = $reserve5->fetch();
                        echo "Number of reserved seats:" . " " . $row_reserve5['number'];
                        echo"<br>";
                        echo"<br>";
                        echo "Number of seats available:" . " " . $seats_available5;
                        echo"<br>";
                        echo"<br>";
                        echo "Number of paid reservations:" . " " . $paid_row5['number'];
                        ?>	
                    </div>
                    <br>
                </div>

                <a href="#myPopup" data-rel="popup" data-position-to="window" class="ui-btn ui-btn-inline">Make A  Reservation</a>

                <div data-role="popup" id="myPopup" class="ui-content">
                    <a href="" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                    <!--<form method="get" action="">-->

                    <h3>Reservation detail</h3>
                    <div class="ui-field-contain">
                        <label for="id_number">Id Number:</label>	
                        <input type="text" id="id_number" name="id_number" value=""/>	
                        <br>
                        <label>Reservation Day:</label>
                        <select name="day" id="day" data-native-menu="false">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                        </select>
                        <br>

                        <label for="location">Select Destination</label>
                        <select name="location" id="location" data-native-menu="false">
                            <?php
                            $obj = new dropoff();
                            $obj->get_all_stops();
                            $row = $obj->fetch();

                            while ($row)
                            {
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
                    <button onclick= "check_add()" data-inline="true" value="Save my reservation">Save my reservation</button>

                    <!--</form>-->

                </div> 

                <!--*********************************************************************************************************************************************-->
                <!--<popup names of people-->

                <?php
//                function names($day)
//                {
//                    print $day;
//                }
//                
//                
                ?>
                <div data-role="popup" id="viewNames" class="ui-content"  data-iscroll>

                    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                    <ul  data-role="listview">

                        <?php
                        $days = $_GET['day'];
//                  print  "this ivgvjjvjvhjs" . $daysss;
                        echo "<li><a href='#'>this is days . $days</a></li>";
                        $objnames = new reservation();
                        $objnames->names_of_reservations($days);
                        $row_names = $objnames->fetch();
                        while ($row_names)
                        {
                            echo "<li><a href='#'>$row_names[first_name] $row_names[last_name]</a></li>";
                            $row_names = $objnames->fetch();
                        }
                        ?>            	 

<!--"<script>document.write(reserved_names);</script>-->
                    </ul> 
                </div>
            </div>  
            <div data-role="footer">	
            </div>
        </div>   
        <!--******************************************************************************************************************-->

        <!--admin page-->
        <div data-role="page" id="admin">	
            <div data-role="header">		
            </div>	
            <div role="main" class="ui-content"> 
fdsgfds
                <!--                      <div class="ui-field-contain">-->
                gfhjkkgfhjkljhghjk
                <!--                        <label for="username">Username:</label>	
                                        <input type="text" id="username" name="username" value=""/>	
                          fdsgsdfg              
                                        <label for="password">Password:</label>	
                                        <input type="password" id="password" name="password" value=""/>	-->
                <!--                        </div>-->



                <!--                    </div>	-->

            </div>
            <div data-role="footer">	
            </div>
        </div>




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
