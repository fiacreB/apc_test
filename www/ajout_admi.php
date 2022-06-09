<!DOCTYPE html>

<html lang="en">
<head>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap CSS -->
        <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
        <title>ajouter un administrateur</title>
        <style>
          .header{
            background-color: rgb(2, 1,61);
            color: white;
          }
        </style>
      </head>
<body>
<?php
session_start();
if(!$_SESSION['mdp']){
  header("Location: espace_admi.php");

}
if(!$_SESSION['password']){
session_destroy();
header('Location: espace_admi.php');
}
require_once ('base_corri.php');

if (isset($_REQUEST['username'],$_REQUEST['p_username'],$_REQUEST['prof'],$_REQUEST['email'], $_REQUEST['password'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer le niveau et supprimer les antislashes ajoutés par le formulaire
	$p_username = stripslashes($_REQUEST['p_username']);
	$p_username = mysqli_real_escape_string($conn, $p_username); 
    // récupérer le niveau et supprimer les antislashes ajoutés par le formulaire
	$prof = stripslashes($_REQUEST['prof']);
	$prof = mysqli_real_escape_string($conn, $prof); 
    // récupérer le niveau et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email); 
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	//requéte SQL + mot de passe crypté
  $msg_email ="/[_a-z0-9-]*(\.[_a-z0-9-]*)*@[a-z0-9]*(\.[a-z]{2,4})$/";
  if(!preg_match($msg_email,$email)){
    echo "<h4>l'adresse $email est incorrect!!</h4>";
    exit();
  }
    $query = "INSERT into administrateur_s (nom, prenom,prof,adresse, password)
              VALUES ('$username', '$p_username', '$prof','$email','".hash('sha256', $password)."')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Administrateur ajouter navec succes</h3>
             <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
             Valider
             </button>
             <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
               <div class='modal-dialog text-dark'>
                 <div class='modal-content'>
                   <div class='modal-header'>
                     <h5 class='modal-title' id='exampleModalLabel'>souscription</h5>
                     <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' data-bs-toggle='tooltip' data-bs-placement='bottom' title='fermer la fenetre'></button>
                   </div>
                   <div class='modal-body'>
                     <p><h3 class='title-niv-1'>coordonnées sauvegarder</h3> <br>merci pour la securité</p>
                   <div class='modal-footer'>
                     <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>CLOSE</button>
                     <button type='button' class='btn '><a href='administrateur.php' class='bg-success text-white my-3'>OK</a></button>
                   </div>
                 </div>
               </div>
             </div>
             </div>
                             
     
			 </div>";
    }
}else{
?>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            
            <!-- Icon -->
            <div class="fadeIn first">
                <img src="images/user_image2.jpg" id="icon" alt="User Icon" />
            </div>
             <?php if (! empty($message)) { ?>
                    <p class="errorMessage"><?php echo $message; ?></p>
                <?php } ?> 
                <form class="box" action="" method="post">
                    <h1 class=" fadeIn box-logo box-title"><a href="index.php">APC_training.org</a></h1>
                    <h1 class="fadeIn box-title">inscrire un personel</h1>
                    <div class="input-group mb-3  my-5">
                        <input type="text" class=" border-des form-control" name="username" placeholder="Entrer le nom" required />
                        <span class="input-group-text border-des" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="input-group mb-3 my-5">
                        <input type="text" class=" border-des form-control" name="p_username" placeholder="Entrer le prenom" required  />
                        <span class="input-group-text border-des" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="input-group mb-3 my-5">
                        <input type="email" class="form-control border-des" name="email" placeholder="adresse mail" required />
                        <span class="input-group-text border-des" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="input-group mb-3  my-5">
                        <input type="text" class=" border-des form-control" name="prof" placeholder="cours donné par le prof " required />
                        <span class="input-group-text border-des" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="input-group mb-3 my-5">
                        <input type="password" class="form-control border-des " name="password" placeholder="Mot de passe" minlength="6" required />
                        <span class="input-group-text border-des" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    
                        <button class=" btn btn-success my-5" type="submit">Ajouter</button>	
                </form>
        </div>
    </div> 
    <?php }?>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl){
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    </script>
</body>
</html>