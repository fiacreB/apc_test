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
        <title>apc_e_learning</title>
        <style>
          .header{
            background-color: rgb(2, 1,61);
            color: white;
          }
        </style>
      </head>
<body>
<?php

require_once ('base_corri.php');
session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM administrateur_s WHERE nom='$username' AND password='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysqli_connect_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['mdp'] = $username;
        header("Location: index_admin.php");
        return true;
	}else{
		$message = "La tentative de connexion à échouée !";
	}
}
?>
    <div class="wrapper fadeInDown">
        <div id="formContent">
        <div>
               
        </div>
            <!-- Icon -->
            <div class="fadeIn first">
                <img src="images/user_image2.jpg" id="icon" alt="User Icon" />
            </div>
            <?php if (! empty($message)) { ?>
                    <p class="errorMessage"><?php echo $message; ?></p>
                <?php } ?> 
        <!-- formulaire -->
        <form class="box" action="espace_admi.php" method="post" name="login">
            <h1 class="fadeIn box-logo box-title"><a href="index.php">apc_e_learning</a></h1>
            <h1 class="fadeIn box-title">ESPACE ADMINISTRATEUR</h1>
            <div class="input-group mb-3 my-5">
                <input type="text" class="form-control border-des" name="username" placeholder="votre nom d'administrateur" required>
                <span class="input-group-text border-des" id="basic-addon1"><i class="fas fa-look"></i></span>
            </div>
            <div class="input-group mb-3 my-5">
                <input type="password" class="form-control border-des" name="password" placeholder="votre mot de passe" required>
                <span class="input-group-text border-des" id="basic-addon1"><i class="fas fa-look"></i></span>
            </div>
            <button class=" btn btn-success my-5" type="submit">Valider</button>
            <p>
            <a href="index.php" class="my-5">retour à l'acceuil</a>
            </p>
        </form>
        </div>
    </div>
</body>
</html>