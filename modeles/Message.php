<?php 

class Message {
	public static function nouveauMessage($nom,$prenom,$mail,$tel,$message)
    {
        MessageGateway::insert($nom,$prenom,$mail,$tel,$message);
    }
}

?>