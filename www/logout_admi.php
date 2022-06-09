<meta charset=UTF-8>
<?php
	
if(isset($_POST['déconnexion']))
{	// Détruire la session
    session_destroy();
	// Redirection vers la page de connexion
	header('Location: espace_admi.php');
}
	
	
?>