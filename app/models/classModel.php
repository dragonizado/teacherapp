<?php 
	/**
	 * Dragonizado 2019
	 */
	class classModel
	{
		
		private $id = NULL;
		private $description;
		private $student_id;
		private $user_id;

		function __construct($db)
		{
			try {
				$this->db = $db;
			} catch (Exception $e) {
				exit("no se pudo crear la conexion con la base de datos.");
			}
		}

		public function __SET($attr,$value){
			$this->$attr = $value;
		}

		public function __GET($attr){
			return $this->$attr;
		}

		public function findAll(){
			$sql = "SELECT class.*, students.*  FROM tbl_class AS class JOIN tbl_students AS students ON class.student_id = students.id;";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}

		public function save(){
			$sql = "INSERT INTO `tbl_class` (`id`,`description`,`student_id`,`user_id`) VALUES (:id,:_description,:student_id,:_user_id);";
			$query = $this->db->prepare($sql);
			$params = [
				":id"=>$this->id,
				":_description"=>$this->description,
				":student_id"=>$this->student_id,
				":_user_id"=>$this->user_id,
			];
			return $query->execute($params);
		}

	}
 ?>