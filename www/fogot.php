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
        <title>apc_e__learning</title>
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
  session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
    $niv = stripslashes($_REQUEST['niveau']);
	$niv = mysqli_real_escape_string($conn, $niv);
    $query = "SELECT * FROM user WHERE username='$username' and niveau='$niv' ";
	$result = mysqli_query($conn,$query) or die(mysqli_connect_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
      
                $_SESSION['niveau'] = $niv;
                header("Location: reni_password.php");
           
	    
	}else{
		$message = "Les informations que vous avez entrés sont incorrectes";
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
                
                <h1 class="fadeIn box-logo box-title"><a href="index.php">apc_e_learning</a></h1>
                <h1 class="fadeIn box-title">Réinitialisation du mot de passe</h1>
                <div class="form-floating text-center">
    <input name="username" type="text" class="form-control text-black border-1 border-primary" placeholder="votre nom" maxlength="30" minlength="5" required>
    
      <label for="floatingInput">Entrez votre nom et prénoms</label>
    </div>
    <div class="form-floating text-center mt-2">
    <input name="niveau" type="text" class="form-control text-black border-1 border-primary" placeholder="votre niveau scolaire" minlength="3" maxlength="9" required>
    
      <label for="floatingInput">Entrez votre niveau scolaire</label>
    </div>
           
            
            <button class=" btn btn-primary my-5" type="submit">valider</button>
            </div> 
            </form>
        </div>
    </div> 
</body>
</html>