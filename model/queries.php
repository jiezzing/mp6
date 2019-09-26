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
            $query = "SELECT * FROM profile";
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
			$sel = $this->conn->prepare($query);

			$sel->execute();
			return $sel;
		}

		// Insert new profile
		public function insertProfile(){
			$query = "INSERT INTO profile(prof_name, prof_apartment, prof_landlord, prof_address, prof_talents) VALUES (?, ?, ?, ?, ?)";
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
    }
?>