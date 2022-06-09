<!DOCTYPE html>
<?php 
session_start();
if(!$_SESSION['mdp']){
    header("Location: espace_admi.php");

}
?>
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
        <title>apc_e_learning</title>
        <style>
          .header{
            background-color: rgb(2, 1,61);
            color: white;
          }
        </style>
        <script src="js/monjs.js"></script>
      </head>
<body>
<?php

require_once ('base_corri.php');


if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM USER_AD WHERE USER_LOGIN='$username' and USER_PASSWORD ='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysqli_connect_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
        $_SESSION['password'] = $password;
        header("Location:administrateur.php");
	}else{
		$message = "La tentative de connexion à échouée !";
	}
   
}
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
            <form class="box " action="" method="post" name="login">
                
                <h1 class="fadeIn box-logo box-title"><a href="index.php">apc_e_learning.com</a></h1>
                <h1 class="fadeIn box-title">Connexion</h1>
                <div class="form-floating text-center">
    <input name="username" type="text" class="form-control text-black border-1 border-primary" placeholder="votre nom"  required>
    
      <label for="floatingInput">Entrez votre nom et prenoms</label>
    </div>
            <div class="form-floating text-center mt-2">
    <input name="password" type="password" class="form-control text-black border-1 border-primary" placeholder="votre mot de passe" minlength="6"  required>
    
      <label for="floatingInput">Entrez votre mot de passe</label>
    </div>
    <button class=" btn btn-primary my-5" type="submit">Valider</button>
            <p>
            <a href="index.php" class="my-5">retour à l'acceuil</a>
            </p>
            </div> 
            </form>
        </div>
    </div> 
</body>
</html>









