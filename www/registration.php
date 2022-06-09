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
        <script type="text/javascript" src="js/monjs.js"></script>
      </head>
<body>
<?php
  require_once ('base_corri.php');
  if (isset($_REQUEST['username'],$_REQUEST['niveau'], $_REQUEST['password'],$_REQUEST['confi_password'],$_REQUEST['adresse'])){
    $recup_mail = htmlspecialchars($_POST['adresse']);
    filter_var($recup_mail,FILTER_VALIDATE_EMAIL);

	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer le niveau et supprimer les antislashes ajoutés par le formulaire
	$niveau = stripslashes($_REQUEST['niveau']);
	$niveau = mysqli_real_escape_string($conn, $niveau); 
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);

    $confi_password = stripslashes($_REQUEST['confi_password']);
	$confi_password = mysqli_real_escape_string($conn, $confi_password);
	//requéte SQL + mot de passe crypté
    if($confi_password == $password){
    $query2 = "SELECT * FROM user WHERE username = '$username'";
    $res2 = mysqli_query($conn, $query2);
    if(mysqli_num_rows($res2) > 0){
        $message = "un utilisateur potant ce nom existe déjà";
    } else {
    $query = "INSERT into user (username, niveau, password,adresse_re)
              VALUES ('$username', '$niveau', '".hash('sha256', $password)."','$recup_mail')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query); 
    if($res){
       header('Location:valide.php');
    }
}
}else{
    $message = "les deux mots de passe ne sont pas identiques";
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
                <form class="box" action="" method="post" onsubmit="return valider()" name="frm">
                    <h1 class=" fadeIn box-logo box-title"><a href="index.php">apc_e_learning.com</a></h1>
                    <h1 class="fadeIn box-title">S'inscrire</h1>
                    <div class="form-floating text-center">
    <input name="username" type="text" class="form-control text-black border-1 border-primary" placeholder="Nom et prénom" minlength="5" maxlength="30"  required>
    
      <label for="floatingInput">Entrez votre nom et prénoms</label>
    </div>
                    <div class="form-floating text-center mt-2">
    <input name="niveau" type="text" class="form-control text-black border-1 border-primary" placeholder="niveau d'étude" maxlength="10" minlength="3"  required>
    
      <label for="floatingInput">Entrez votre niveau d'étude</label>
    </div>
                    <div class="form-floating text-center mt-2" >
    <input name="password" type="password" class="form-control text-black border-1 border-primary" placeholder="Entrez votre password"  minlength="6"  required>
    
      <label for="floatingInput">Entrez votre mot de passe</label>
      <span id='message'></span>
    </div>
    <div class="form-floating text-center mt-2">
    <input name="confi_password" type="password" class="form-control text-black border-1 border-primary" placeholder="connfirmez votre password"  minlength="6"  required>
    
      <label for="floatingInput" id="message">Confirmez votre nouveau mot de passe</label>
    </div>
    <div class="form-floating text-center mt-2">
    <input name="adresse" type="mail" class="form-control text-black border-1 border-primary" placeholder="adresse de recuperation de mot de passe"  required>
    
      <label for="floatingInput">Entrez une adresse de recuperation de mot de passe</label>
    </div>
                    
                        <input class=" btn btn-primary my-5" type="submit" name="submit" value="S'Inscrire" >
                        
                   
                    <p class="fadeIn box-register serif"> J'ai déja un compte<a href="login.PHP"> Connectez-vous ici</a></p>	
                </form>
        </div>
    </div> 
</body>
</html>