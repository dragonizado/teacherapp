<?php 
	/**
	 * Dragonizado 2019
	 */
	class studentModel
	{
		protected $id = null;
		protected $name;
		protected $cc;
		protected $phone;

		function __construct($db)
		{
			try {
				$this->db = $db;
			} catch (Exception $e) {
				exit("no se pudo crear la conexion con la base de datos.");
			}
		}
		public function __SET($attr, $value)
		{
			$this->$attr = $value;
		}

		public function __GET($attr)
		{
			return $this->$attr;
		}

		public function findAll(){
			$sql = "SELECT * FROM tbl_students";
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}

		public function validateDbExits(){
			$sql = "SELECT * FROM tbl_students WHERE cc = :cc";
			$query = $this->db->prepare($sql);
			$params = [
				":cc"=>$this->cc
			];
			$query->execute($params);
			return $query->fetch();
		}

		public function save(){
			$sql = "INSERT INTO tbl_students (`id`,`name`,`cc`,`phone`) VALUES (:_id,:_name,:_cc,:_phone)";
			$query = $this->db->prepare($sql);
			$params = [
				"_id"=>$this->id,
				"_name"=>$this->name,
				"_cc"=>$this->cc,
				"_phone"=>$this->phone
			];
			return $query->execute($params);
		}
	}
 ?>