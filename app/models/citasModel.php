<?php 
	/**
	 * Dragonizado 2019
	 */
	class citasModel
	{
		private $id = NULL;
		private $user_id;
		private $student_id;
		private $date;
		private $state;



		function __construct($db)
		{
			try {
				$this->db = $db;
			} catch (Exception $e) {
				exit("no se pudo crear la conexion con la base de datos.");
			}
		}

		public function findAll(){
			$sql = "SELECT * FROM tbl_citas";
			$query = $this->db->prepare($sql);
			return $query->fetchAll();
		}

		public function getDatesOfDay(){
			$sql = "SELECT citas.id AS 'citaId' ,
			citas.date AS 'citaDate', 
			citas.state AS 'citaState', 
			users.id AS 'userId', 
			users.name AS 'userName' , 
			users.email AS 'userEmail', 
			students.name AS 'studentName', 
			students.cc AS 'studentCC', 
			students.phone AS 'studentPhone', 
			class.description AS 'classDescription'
			FROM tbl_citas AS citas 
			JOIN tbl_users AS users ON citas.user_id = users.id 
			JOIN tbl_students AS students ON citas.student_id = students.id 
			JOIN tbl_class AS class ON citas.class_id = class.id 
			WHERE date >= CURDATE() AND date <= DATE_ADD(CURDATE(), INTERVAL 1 DAY) AND state = 'Pendiente'";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}
	}
 ?>