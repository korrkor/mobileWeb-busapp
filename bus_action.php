<?php

include("gen.php");

$cmd = get_datan("cmd");
switch ($cmd)
{
    case 1:
        add_reservation();
        break;

    case 2:
        check();
        break;

    case 3:
        get_names();
        break;

    case 4:
        check_days();
        break;
    
    case 5:
        paid();
        break;
    
     case 6:
        days();
        break;

    default:
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "unknown command");
        echo "}";
}

function add_reservation()
{
    include_once("reservation.php");
    $day = get_data("day");
    $location = get_datan("location");
    $ticket = get_datan("ticket");
    $id_number = get_datan("id_number");
    $obj = new reservation();

    if (!($obj->add_reservation($day, $location, $ticket, $id_number)))
    {
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "unknown command");
        echo "}";
    }
    else
    {
        echo "{";
        echo jsonn("result", 1) . ",";
        echo jsons("message", "unknown command");
        echo "}";
    }
}

function get_health()
{
    include_once("healthclass.php");
    include_once("subdistrict.php");
    $id = get_datan("id");

    $h = new healthclass();
    $subd = new subdistrict();
    $h->get_health_by_id($id);
    $row = $h->fetch();
    $subd->get_subdistrict_by_id($row['subdistrict_id']);
    $subdrow = $subd->fetch();
    if (!$row)
    {
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "vaccine not found");
        echo "}";
        return;
    }

    echo "{";
    echo jsonn("result", 1) . ",";
    echo '"health":{';
    echo jsonn("id", $row['idhealth_promotion']) . ",";
    echo jsons("date", $row['date']) . ",";
    echo jsons("venue", $row['venue']) . ",";
    echo jsons("topic", $row['topic']) . ",";
    echo jsons("method", $row['method']) . ",";
    echo jsons("targetAudience", $row['target_audience']) . ",";
    echo jsonn("numAudience", $row['number_of_audience']) . ",";
    echo jsons("remarks", $row['remarks']) . ",";
    echo jsons("month", $row['month']) . ",";
    echo jsonn("latitude", $row['latitude']) . ",";
    echo jsonn("longitude", $row['longitude']) . ",";
    echo jsons("image", $row['image']) . ",";
    echo jsonn("subdistrict", $row['subdistrict_id']);
    echo "}";
    echo "}";
}

function days()
{
    $day=  get_data('day');
    session_start();
   $_SESSION['day'] = $day;
}
function paid()
{
      include_once("reservation.php");
      $ticket = get_datan("ticket");
    $id = get_datan("id");
    $obj_paid = new reservation();
    
    if($obj_paid->paid($ticket))
    {
        echo "{";
            echo jsonn("result", 0) . ",";
            echo jsons("value", "paid");
            echo "}";
            return;
    }
    
    else
    {
        echo "{";
            echo jsonn("result", 0) . ",";
            echo jsons("value", "no");
            echo "}";
            return;
        
    }
}

function check()
{
    include_once("reservation.php");
    $ticket = get_datan("ticket");
    $id = get_datan("id_number");
    $obj = new reservation();
    $obj->check_id($ticket, $id);
    $row = $obj->fetch();

    if ($row)
    {
        echo "{";
        echo jsonn("result", 1) . ",";
        echo jsons("message", "answer not found");
        echo "}";
        return;
    }
    else
    {
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "answer not found");
        echo "}";
        return;
    }
}

function check_days()
{
    include_once("reservation.php");
    $day = get_data('day');
    $obj_check_day = new reservation();
    $obj_check_day->num_reservations_per_day($day);
    $row_obj_check_day = $obj_check_day->fetch();

    if ($row_obj_check_day)
    {
        if ($row_obj_check_day['number'] < 30)
        {
            echo "{";
            echo jsonn("result", 1) . ",";
            echo jsons("value", "fine");
            echo "}";
            return;
        }
        else
        {
            echo "{";
            echo jsonn("result", 0) . ",";
            echo jsons("value", "answer not found");
            echo "}";
            return;
        }
    }
}

?>