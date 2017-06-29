<?php
	class Connection extends PDO
	{
		private $stmt;

		public function __construct($dbname,$username,$pwd)
		{
			$dsn = "mysql:host=localhost;dbname="."$dbname";
			parent::__construct($dsn,$username,$pwd);
			$this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}

		//Getter et Setter pour Stmt

		public function getStmt()
		{
			return $this->stmt;
		}

		public function setStmt($stmt)
		{
			$this->stmt = $stmt;
		}

		public function executeQuery($query, array $parameters = [])
		{
			$this->stmt=parent::prepare($query);
			foreach ($parameters as $name=>$value)
			{
				$this->stmt->bindValue($name,$value[0],$value[1]);
			}
			$this->stmt->execute();
		}

		public function getResult()
		{
			return $result = $this->stmt->fetchAll();
		}
	}
?>