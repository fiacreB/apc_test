
<?php 
    session_start();
    if(!$_SESSION['niveau']){
        header("Location: fogot.php");
    }
?>

<!doctype html>
<html lang="en">
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
            span{
                color: rgb(3, 112, 61);
            }
            h2{
                color: grey;
            }
        </style>
            <script type="text/javascript" src="js/monjs.js"></script>

  </head>
  <body class="text-">
  <?php 
    require_once ('base_corri.php');

    if(isset($_SESSION['niveau'])){
        $p = $_SESSION['niveau'];
    
    
      if(isset($_POST['password'],$_POST['confi_password'])){
        if(isset($_POST['submit'])){
            $password = $_POST['password'];
            $confi_password = $_POST['confi_password'];
            if($confi_password == $password){
                $req2=$ddo->prepare("UPDATE user SET password = '".hash('sha256', $password)."'  WHERE niveau='$p'");
           $req2->execute();
           echo "<div class='sucess'>
           <h3>Votre mot de passe à été réinitialisé avec succès</h3>
           <p>connectez vous maintenant avec votre nouveau mot de passe <a href='login.php'> se connecter</a></p>
    
     </div>";     
     session_destroy();      
          }else{
            $message = "les deux mots de passe ne sont pas identiques";
          }
        }   
   
    }else{


 
?>
    <div>

    </div>
<div class="container  my-2">
<?php if (! empty($message)) { ?>
                    <p class="errorMessage"><?php echo $message; ?></p>
                <?php } ?> 
  <form method="POST" onsubmit="return valider()">

  <h1 class="title-niv-1 text-white">réinitialisation du mot de passe</h1>
  
    <div class="form-floating text-center">
    <input name="password" type="password" class="form-control text-black border-1 border-primary" placeholder="password"  minlength="6"  required>
    
      <label for="floatingInput">Entrez votre nouveau mot de passe</label>
    </div>
    <div class="form-floating text-center">
    <input name="confi_password" type="password" class="form-control text-black border-1 border-primary" placeholder="connfirmez votre password" minlength="6"  required>
    
      <label for="floatingInput">Confirmez votre nouveau mot de passe</label>
    </div>
    
    <input type="submit" name="submit" value="Valider" class="w-100 btn btn-lg btn-primary"> 
    
    <br>
    <div></div><br>
    
  </form>
  
</div>
<div class="mc-foot">

</div>


  </body>
  <?php require_once ('footer.php'); ?>
  <?php } } ?>
</html>
