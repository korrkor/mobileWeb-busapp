<!DOCTYPE html>
<html>
    <head>
        <title>basic example</title>
        <link rel = "stylesheet" href = "jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.css">
        <script src = "jquery.mobile-1.4.4/jquery-1.11.1.min.js"></script>
        <script src = "jquery.mobile-1.4.4/myjs.js"></script>
        <script src = "jquery.mobile-1.4.4/jquery.mobile-1.4.4.min.js"></script>
    </head>
    <body>
        <?php
        include_once("dropoff.php");
        include_once("currentLocationClass.php");
        include_once("reservation.php");
//        include_once ("gen.php");
//        include_once ("gen.js");
        ?>
        <script type="text/javascript" src="jquery.mobile-1.4.4/jquery.qrcode.js"></script>
        <script type="text/javascript" src="jquery.mobile-1.4.4/qrcode.js"></script>

        <div data-role="page" id="payfare">
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
                    <li><a href=""  onclick="redirectToHome()()">Home</a></li>	
                    <li><a href=""  onclick="secondPage()">Pay for my bus fare</a></li>	
                    <li><a href="" onclick="redirect(<?php echo $lat ?>, <?php echo $long ?>)">View current location of bus</a></li>

                </ul>
            </div>

            <div data-role="header">
            </div>

            <div role = "main" class = "ui-content">  
                <div data-role="fieldcontain">	
                    <label>Please enter your ticket number:</label>	
                    <input type="text" name="ticket_id" id="ticket_id"><br><br>	
                    <label>ID number:</label>	
                    <input type="text" name="id_number" id="id_number"><br><br>
                    <input type="submit" onclick= "result(document.getElementById('ticket_id').value, document.getElementById('id_number').value)" data-inline="true" value="Generate qr code"> 
                </div>
                <div id="qr"></div> 
               
                <!--<button onclick="alerta()">here</button>-->
            </div>	
            <div data-role="footer"> 

            </div>	
        </div>

    </body>
</html>
