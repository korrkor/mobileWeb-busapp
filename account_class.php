<?php

include_once("adb.php");

class account_class extends adb {

    function account_class() {
        adb::adb();
    }

    function hjgj ($day, $location, $ticketid) {
        $query = "insert into reservation (day,doid,ticketid,status) values('$day','$location','$ticketid',0)";
        //print $query;
        return $this->query($query);
    }

    function num_reservations_per_day($day) {
        $query = "SELECT COUNT(rid) as number FROM reservation where day ='$day'";
       // print $query;
        return $this->query($query);
    }

    function paid($ticket_id) {
        $query = "update set Status = 1 where ticketid = $ticket_id";
        return $this->query($query);
    }

    function num_paid($day) {
        $query = "SELECT COUNT(rid) as number FROM reservation where day ='$day' and Status=1";
        return $this->query($query);
    }

    function num_seats_available($day) {
        $this->num_reservations_per_day($day);
        $res = $this->fetch();

        $num_seats_available = max_seats - $res['number'];
        return $num_seats_available; 
    }
    
    function check_id($ticket_id,$id_number)
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
//////////////	if($obj->add_applicant("dfvd", "lastname", "othernames", "address", "residence", "relationship_to_child", "workplace", 1)){
//////////////		echo "added";
//////////////                print_r($obj->get_insert_id($obj));
//////////////	}
//	if($obj->num_paid("Monday"))
//        {
//            $row= $obj->fetch();
//            print_r($row);
//            
//        }
////	while($row){
////		
////		
////	}
////	$obj->delete_applicant(2);
//?>