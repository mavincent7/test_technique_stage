<?php

class Controleur {
	public function __construct() {
	
	try {
		if(isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
        }
        else {
            $action = null;
        }
		
		switch($action) {
			case null:
				$this->accueil();
				break;
			case 'envoyer_message':
				$this->envoyerMessage();
				break;
			default:
				echo $_REQUEST['action'];
                echo"Erreur d'appel PHP CtrlUtilisateur";
                break;
		}
	}
	catch (PDOException $ePDO)
        {
            echo "Erreur de BDD\n";
			echo $ePDO->getMessage();
        }
        catch (Exception $e) {
            echo "Erreur innatendue\n";
        }
	}
	
		
	function envoyerMessage() {
			
		if (!empty($_REQUEST['nom']) && !empty($_REQUEST['prenom']) && !empty($_REQUEST['mail']) && !empty($_REQUEST['tel'] && !empty($_REQUEST['message'])))
		{
			if(strlen($_REQUEST['nom']) <= 25 && strlen($_REQUEST['prenom'])<=25 && strlen($_REQUEST['mail'])<=60 && strlen($_REQUEST['message'] <= 300)){
				$nom = $_REQUEST['nom'];
				$prenom = $_REQUEST['prenom'];
				$mail = $_REQUEST['mail'];
				$tel = $_REQUEST['tel'];
				$message = $_REQUEST['message'];
				Message::nouveauMessage($nom,$prenom,$mail,$tel,$message);
			}
			else {
				echo "Le nom et prénom doit avoir moins de 25 caractères, le mail moins de 60, le téléphone doit en contenir 10 et le message en contient 300 au maximum";
			}
			
			
			$this->accueil();
		}
		else {
			echo "Erreur";
		}

			
	}
		
	function accueil() {
		require (__DIR__.'/../vues/formulaire.html');
	}
}

?>