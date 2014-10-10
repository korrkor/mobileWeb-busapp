<?php
	include_once("adb.php");
	
	class currentLocationClass extends adb {
		
		function currentLocationClass(){
			adb::adb();
		}
		
		/**
		*query all applicant in the table and store the dataset in $this->result	
		*@return if successful true else false
		*/
		
//		function get_last_location($id){
//			$query="select longitude, latitude from buslocation where id = $id";
//			return $this->query($query);
//		}
                
                function get_last_row()
                {
                   $query = "select * from buslocation order by id desc limit 1";
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
//	$obj = new currentLocationClass();
////	if($obj->add_applicant("dfvd", "lastname", "othernames", "address", "residence", "relationship_to_child", "workplace", 1)){
////		echo "added";
////                print_r($obj->get_insert_id($obj));
//        if($obj->get_last_row())
//        {
//            $row = $obj->fetch();
//            print_r($row);
//        }   
//	}
//	$row =$obj->fetch();
//	while($row){
//		print_r($row);
//		$row= $obj->fetch();
//	}
//	$obj->delete_applicant(2);
?>