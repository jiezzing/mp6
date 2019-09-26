<?php
	class Queries
	{
		private $conn;
        private $database="mp6_db ";
        
        // Connect database
		public function __construct($db){
			$this->conn = $db;
		}

		// Get all profile from db to multi-selection
        public function getProfiles()
        {
            $query = "SELECT * FROM profile WHERE prof_status='Active'";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
		}

		// Get all profile from db to multi-selection
        public function getSpecificProfile()
        {
            $query = "SELECT * FROM profile WHERE prof_id=?";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->prof_id);
			$sel->execute();
			return $sel;
		}


		// Insert new profile
		public function insertProfile(){
			$query = "INSERT INTO profile(prof_name, prof_apartment, prof_landlord, prof_address, prof_talents, prof_status) VALUES (?, ?, ?, ?, ?, 'Active')";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->prof_name);
			$sel->bindParam(2, $this->prof_apartment);
			$sel->bindParam(3, $this->prof_landlord);
			$sel->bindParam(4, $this->prof_address);
			$sel->bindParam(5, $this->prof_talents);

			$sel->execute();
			return $sel;
		}

		// Delete profile
		public function deleteProfile(){
			$query = "UPDATE profile SET prof_status='Deleted' WHERE prof_id=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->prof_id);

			if($sel->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			return $sel;
		}

		// Delete profile
		public function updateProfile($name, $apartment, $landlord, $address, $talents){
			$query = "UPDATE profile SET prof_name='".$name."', prof_apartment='".$apartment."', prof_landlord='".$landlord."', prof_address='".$address."', prof_talents='".$talents."' WHERE prof_id=?";
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->bindParam(1, $this->prof_id);

			if($sel->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
			return $sel;
		}
    }
?>