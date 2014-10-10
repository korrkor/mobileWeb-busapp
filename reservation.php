<?php

include_once("adb.php");
define("max_seats", '30');

class reservation extends adb {

    function reservation()
    {
        adb::adb();
    }

    function add_reservation($day, $location, $ticketid, $id_number)
    {
        $query = "insert into reservation (day,doid,ticketid,pid, status) values('$day','$location','$ticketid',$id_number,0)";
//        print $query;
        return $this->query($query);
    }

    function num_reservations_per_day($day)
    {
        $query = "SELECT COUNT(rid) as number FROM reservation where day ='$day'";
        // print $query;
        return $this->query($query);
    }

    function fare_per_day($day)
    {
        $query="Select sum(fare) as number from dropofflocation inner join reservation on reservation.doid = dropofflocation.doid where reservation.day='$day' and reservation.Status=1";
//        print $query;   
         return $this->query($query);
    }

    function names_of_reservations($day)
    {
        $query = "Select * from account_info inner join reservation on reservation.pid = account_info.pid where reservation.day='$day'";
        return $this->query($query);
    }

    function paid($ticket_id)
    {
        $query = "update reservation set Status = 1 where ticketid = $ticket_id";
//        print $query;
        return $this->query($query);
    }

    function num_paid($day)
    {
        $query = "SELECT COUNT(rid) as number FROM reservation where day ='$day' and Status=1";

        return $this->query($query);
    }

    function num_seats_available($day)
    {
        $this->num_reservations_per_day($day);
        $res = $this->fetch();

        $num_seats_available = max_seats - $res['number'];
        return $num_seats_available;
    }   

    function check_id($ticket_id, $id_number)
    {
        $query = "Select * from reservation where ticketid = $ticket_id";
        return $this->query($query);
    }

}

//		function add_applicant($firstname,$lastname,$othernames,$address,$residence,$relationship_to_child,$workplace,$witness_id){
//			//write the SQL query and call $this->query()
//                    
//			$query ="insert into applicant set firstname='$firstname',lastname='$lastname',
//			othernames='$othernames', address='$address',residence='$residence',relationship_to_child='$relationship_to_child',
//			workplace='$workplace',witness_id='$witness_id',last_modified=now()";
////                        echo "adddddd metod";
//                       print $query;
//			return $this->query($query);
//		}
//		
//		/**
//		*updates the record identified by id 
//		*/
//		function update_applicant($applicant_id,$firstname,$lastname,$othernames,$address,$residence,$relationahip_to_child,$workplace,$consent_id){
//			//write the SQL query and call $this->query()
//			$query="update applicant set firstname='$firstname',lastname='$lastname',othernames='$othernames',
//			address='$address',residence='$residence',relationahip_to_child='$relationahip_to_child',workplace='$workplace',consent_id='$consent_id',
//			last_modified=now()	where applicant_id=$applicant_id";
//			return $this->query($query);
//		}
//		/**
//		*query to delete a applicant 	
//		*@return if successful true else false
//		*/
//		function delete_applicant($applicant_id){
//			$query="Delete from applicant where applicant_id=$applicant_id";
//			return $this->query($query);
//		}
//		
//		function get_applicant_byID($applicant_id){
//			$query="Select * from applicant where applicant_id=$applicant_id";
//			return $this->query($query);
//		}
//		
//
//		
//	}
//	$obj = new reservation();
////////////////////	if($obj->add_applicant("dfvd", "lastname", "othernames", "address", "residence", "relationship_to_child", "workplace", 1)){
////////////////////		echo "added";
////////////////////                print_r($obj->get_insert_id($obj));
////////////////////	}
//	if($obj->fare_per_day("Wednesday"))
//        {
//            print "yes";  
//        }
//        else
//        {
//            print"no";
//        }
//             $row= $obj->fetch();
//            while($row)
//            {
//                
//                  print_r($row);
//                   $row= $obj->fetch();
//            }
//           
//            
//        }
// else {
//     print("no");
//     
// }
////	while($row){
////		
////		
////	}
////	$obj->delete_applicant(2);
?>