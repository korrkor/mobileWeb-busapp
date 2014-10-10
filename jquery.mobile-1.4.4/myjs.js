//window.location.reload();
function syncAjax(u) {
    var obj = $.ajax(
            {url: u,
                async: false
            }
    );
    return $.parseJSON(obj.responseText);

}


var receipt;
//            function number()
//            {
//                document.getElementById("ticket").innerHTML = "Your reservation number is " + receipt + "Please keep this number as proof of reservatio and for payment purposes";
//            }

//window.myVariable = "something";

function redirect_login_page()
{
    document.location.href = "admin_login.php";
}
function secondPage()
{
    document.location.href = "second.php";
}

function paid(ticket, id)
{
    debugger;
    var u = "bus_action.php?cmd=5&ticket=" + ticket + "&id=" + id;
    prompt("u", u);
    return syncAjax(u);
}
function check_day(day)
{
    var u = "bus_action.php?cmd=4&day=" + day;
    return syncAjax(u);
}

function add_reservation(ticket, id_number, day, location)
{
    var u = "bus_action.php?cmd=1&day=" + day + "&ticket=" + ticket + "&location=" + location + "&id_number=" + id_number;
//    window.location.reload();
    return syncAjax(u);
}

function redirectToHome()
{
    document.location.href = "index.php";
}
var latitutde;
var longitude;
function redirect(lat, long)
{
    latitutde = lat;
    longitude = long;
    document.location.href = "map.php";
}

$(document).on("pagecreate", "#map-page", function () {

    var defaultLatLng = new google.maps.LatLng(latitutde, longitude);
    if (navigator.geolocation) {
        function success(pos) {
            // Location found, show map with these coordinates
            drawMap(new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude));
        }
        function fail(error) {
            drawMap(defaultLatLng);  // Failed to find location, show default map
        }
        // Find the users current position.  Cache the location for 5 minutes, timeout after 6 seconds
        navigator.geolocation.getCurrentPosition(success, fail, {maximumAge: 500000, enableHighAccuracy: true, timeout: 6000});
    } else {
        drawMap(defaultLatLng);  // No geolocation support, show default map
    }
    function drawMap(latlng) {
        var myOptions = {
            zoom: 10,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
        // Add an overlay to the map of current lat/lng
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: "Greetings!"
        });
    }
});

var delid;
var id2;
function edit($obj, $id)
{
    id2 = $id;

    var r = getHealth($id);
    if (r.result == 0) {
        document.write("hellw");
        //show error message
        return;
    }

    $("#edittopic").prop("value", r.health.topic);
    $("#editdistrict").prop("value", r.health.subdistrict);
    $("#editaudience").prop("value", r.health.targetAudience);
    $("#editvenue").prop("value", r.health.venue);

    $("#editlongitude").prop("value", r.health.longitude);
    $("#editlatitude").prop("value", r.health.latitude);
    $("#editmethod").prop("value", r.health.method);
    $("#editnumAppearance").prop("value", r.health.numAudience);
    $("#editremarks").prop("value", r.health.remarks);
    $("#editfile").prop("value", r.health.file);
    $("#editdate").prop("value", r.health.date);
    $("#editmonth").prop("value", r.health.month);
    //show the form
    //find where the user clicked and store it in x and y
    var y = event.clientY;
    var x = event.clientX / 2;
    //use x and y to set the location of the form
    $("#divEdit").css("top", y);
    $("#divEdit").css("left", x);
    //display the form
    $("#divEdit").fadeIn(1000);
}
//returns a result object for one vaccine 
function getHealth(id) {
    var u = "vaccine_action.php?cmd=1&id=" + id;
    return syncAjax(u);
}

function refresh()
{
    window.location.reload();
}

function update()
{
    var topic = document.getElementById("edittopic").value;
    var district = document.getElementById("editdistrict").value;

    var audience = document.getElementById("editaudience").value;

    var venue = document.getElementById("editvenue").value;

    var longitude = document.getElementById("editlongitude").value;
    var latitude = document.getElementById("editlatitude").value;
    var method = document.getElementById("editmethod").value;
    var numApp = document.getElementById("editnumAppearance").value;
    var remarks = document.getElementById("editremarks").value;
    var file = document.getElementById("editfile").value;
    var date = document.getElementById("editdate").value;
    var month = document.getElementById("editmonth").value;

    var u = "vaccine_action.php?cmd=2&id=" + id2 + "&topic=" + topic + "&district=" + district + "&audience=" + audience +
            "&venue=" + venue + "&long=" + longitude + "&lat=" + latitude + "&method =" + method + "&numApp =" + numApp +
            "&remarks=" + remarks + "&file=" + file + "&date=" + date + "&month=" + month;

    $.getJSON(u, saveDone);
    cancel();
}

function admin_view()
{
    document.location.href = "admin_view.php";
}

function saveDone(data) {
    alert(data);
}

function check_add()
{
    var ticket = Math.floor(Math.random() * 1000000);
    var day = document.getElementById("day").value;
    receipt = ticket;
    var id_number = document.getElementById("id_number").value;
    var location = document.getElementById("location").value;
    var k = check_day(day);
    if (k.result === 0)
    {
        document.getElementById("ticket").style.color = "red";
        document.getElementById("ticket").innerHTML = 'Try registering for another day. Its full';
    }

    else if (k.result === 1)
    {
        var r = add_reservation(ticket, id_number, day, location);
        if (r.result === 0)
        {
            document.getElementById("ticket").style.color = "red";
            document.getElementById("ticket").innerHTML = 'Your registration could not be save. Please try agaun.';
        }

        else if (r.result === 1)
        {

            document.getElementById("ticket").style.color = "green";
            document.getElementById("ticket").innerHTML = 'This is your ticket ' + ticket + ' . Please remember it';
        }
    }
}

function result(ticket_id, id_number)
{
    var r = check(ticket_id, id_number);

    if (r.result === 1)
    {
        generate(ticket_id, id_number);

    }
    else if (r.result === 0)
    {
        document.write("Try again!");
    }
}

function check(ticket_id, id_number)
{
    var u = "http://localhost/mobileWeb/webapp/bus_action.php?cmd=2&ticket=" + ticket_id + "&id_number=" + id_number;
    return syncAjax(u);
}

function generate(ticket_id, id_number)
{
    jQuery('#qr').qrcode({
        render: "table",
        text: ticket_id.toString() + ":" + " " + id_number,
        background: "#3a3"
    });
    debugger;
    paid(ticket_id, id_number);

}

//window.reserved_names = "here";

function redirect_logout_admin()
{
    document.location.href="admin_login.php";
}

function names(day)
{
//    alert(window.location.href);
//    alert("fdd");   
//   window.reserved_names = "korkor"; 
//    var reserved_names = day;
//    reserved_names = day;
//    var u = "index.php?day=" + day;
//      window.history.pushState("here", "Title", u);
//       location.hash="?day=" + day;
//window.location.reload;
//debugger;
//    if (day != "") {
//        window.location.href = u;
//    }
//            window.location.reload("index.php?day=" + day);
//window.reload("http://localhost/mobileWeb/webapp/index.php?day=" + day");
//window.location.href="http://localhost/mobileWeb/webapp/index.php?day=" + day;
//window.reload();
//window.location.href = "http://localhost/mobileWeb/webapp/index.php?day=" + day;

//alert(window.location.href);
// alert("new url" + " " +window.location.href);
//window.reload("http://localhost/mobileWeb/webapp/index.php");
//location.href = location.href + "?day=" + day;
//    history.pushState(null, "A new title!", "?day=" + day);
//           window.location.href="index.php?day=" + day;
//          window.location.reload;
  return syncAjax("http://localhost/mobileWeb/webapp/bus_action.php?cmd=6&day=" + day);
//          window.location.href="index.php?day=" + day;
//    var y = event.clientY;   
//    var x = event.clientX / 2;
//    //use x and y to set the location of the form
//    $("#viewNames").css("top", y);
//    $("#viewNames").css("left", x);
//    //display the form
//    $("#viewNames").fadeIn(1000); 

}


  