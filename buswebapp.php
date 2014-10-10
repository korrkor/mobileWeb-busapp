
<!DOCTYPE html>
<html>

    <head>
        <link rel = "stylesheet" href = "jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.css">
        <!--<link type="text/css" rel="stylesheet" href="buswebapp.css">-->
        <script src = "jquery.mobile-1.4.4/jquery-1.11.1.min.js"></script>
        <script src = "jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.js"></script>
        <title>hh</title>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       mle>
        <meta name="viewport" content="width-device-width, initial-scale=1">
    </head>
    <body>
        <script>
            $(document).on('pageshow', '.selector', function () {
                $('#myPopup').popup('reposition', 'positionTo: window');
            });
        </script>

        <!--Page One--> 
        <!--        <div style="margin:auto">-->
        <div data-role = "page" id = "pageone">
            <div data-role = "header">
                <p>Ashesi Bus Scheduler- Login</p>
            </div>
            <br> 
            <br>    
            <div>
                <h1>Welcome to the Ashesi Bus Scheduler!</h1>
            </div>

            <div role = "main" class = "ui-content" style="background-color: gainsboro"> 
                <form method="post" action= "demoform.asp">	
                    <div data-role="fieldcontain">	
                        <label>Username:</label>	
                        <input type="text" name="uname" id="fname"> <br><br>
                        <label>Password:</label>
                        <input type="password" name="password" id="lname">
                        <label></label>
                        <a href="#pagetwo"><input type="submit" name="submit" value ="Login..." ></a>
                    </div>
                </form>	
                <a><p>Forgotten your password?</p></a>
            </div>

            <div data-role = "footer">

            </div>
        </div>
        <!--</div>-->

        <!--Page Two-->
        <div data-role = "page" id = "pagetwo">
            <div data-role = "header">
                <div data-role="navbar">
                    <ul>
                        <li><a class="ui-btn-active ui-state-persist" href="#" data-icon="home" data-theme="a">Home</a></li>
                        <li><a href="#" data-icon="note">Button 2</a></li>
                        <li><a href="#" data-icon="search" data-theme="a">Search</a></li>
                    </ul>
                </div> 	
            </div>
            <div role = "main" class = "ui-content" style="background-color: gainsboro">
               
                <a href = "#pageone" class="ui-btn-right"><p>Logout</p></a>
                <p>View itinerary for the week:</p> 
                <div data-role="collapsible-set">	
                    <div data-role="collapsible">	
                        <h1 style="color:green">Monday </h1>	
                        <p>Departure time: 17:10 hrs</p>
                        <p>Number of available seats:15 </p>
                        <p>Number of reserved seats: 15</p>
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

                <H2>Lis of Drop off and Pick up points</h2>
                <ul data-role="listview">
                <li><a href="#">Abom Junction</a></li>
                <li><a href="#">Kwabenya</a></li>
                <li><a href="#">37 Military Hospital</a></li>
                <li><a href="#">Christ the King</a></li>
                <li><a href="#">Ashesi University</a></li>
                <li><a href="#">Accra Mall</a></li>
                </ul>
                    <a href="#myPopup" data-filter="true" data-rel="popup" data-position-to="window" class="ui-btn ui-btn-inline">Make A  Reservation</a>

                    <div data-role="popup" id="myPopup" class="ui-content">
                        <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
                        <form method="post" action="demoform.asp">
                            <div>
                                <h3>Reservation detail</h3>
                                <div class="ui-field-contain">
                                    <label for="bday">Date of Reservation:</label>
                                    <input type="date" name="bday" id="bday"><br>

                                    <label for="day">Select Destination</label>
                                    <select name="day" id="day" data-native-menu="false">
                                        <option value="mon">Abom Junction</option>
                                        <option value="tue">Atomic Down</option>
                                        <option value="wed">Accra Mall</option>
                                        <option value="thu">Ashesi University College</option>
                                    </select><br>

                                    <fieldset data-role="controlgroup">
                                        <legend>Notify me when bus is leaving:</legend>
                                        <label for="male">Yes</label>
                                        <input type="radio" name="gender" id="male" value="male"><br>
                                        <label for="female">No</label>
                                        <input type="radio" name="gender" id="female" value="female"> 
                                    </fieldset>
                                </div>
                                <input type="submit" data-inline="true" value="Save my reservation">
                            </div>
                        </form>
                    </div>

                </div>


            </div>
    </body>
</html>
