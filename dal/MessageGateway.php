<?php

	class MessageGateway {
	
		public static function insert($nom,$prenom,$email,$telephone,$message)
		{
			$co = new Connection("test","root","root");
			$query = 'INSERT INTO message VALUES (:id,:nom,:prenom,:email,:telephone,:message)';
			$co->executeQuery($query,array(':id'=>array(NULL,PDO::PARAM_INT),
				':nom'=>array($nom,PDO::PARAM_STR),
				':prenom'=>array($prenom,PDO::PARAM_STR),
				':email'=>array($email,PDO::PARAM_STR),
				':telephone'=>array($telephone,PDO::PARAM_INT),
				':message'=>array($message,PDO::PARAM_STR)));
			return $co->lastInsertId();
		}
	
	}

?>