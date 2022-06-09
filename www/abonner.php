

 <?php 
    session_start();
    if(!$_SESSION['username']){
        header("Location: login.php");
    }
?>
 

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
        <title>Hello, world!</title>
        <style>
          .header{
            background-color: rgb(2, 1,61);
            color: white;
          }
        </style>
        <script src="js/monjs.js">  
        
    </script>
      </head>
<body>
<?php
  require_once ('base_corri.php');

if (isset($_POST['user_a'])){
	$username = stripslashes($_REQUEST['user_a']);
	$username = mysqli_real_escape_string($conn, $username);
    $query = "SELECT * FROM user_abonner WHERE username='$username'";
	$result = mysqli_query($conn,$query) or die(mysqli_connect_error());
	$rows = mysqli_num_rows($result);

	if($rows==1){
    $_SESSION['user_a']= $username;
	    header("Location:corriges_complets.php");
      return true;
	}else{
		$message = 'Le nom utilisateur ou le mot de passe est incorrect.
        <a href="abonnement.php"> je ne suis pas abonner</a>
     
      ';
	}
    // if($query->num_rows > 0) {
    //     $_SESSION['mdp'] = $username;
    //     return true;
        
    // }
    // return false;
}

?>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            
           
             <?php if (! empty($message)) { ?>
                    <p class="errorMessage"><?php echo $message; ?></p>
                <?php } ?> 
            <form class="box " action="" method="post" name="login">
                
                <h1 class="fadeIn box-logo box-title"><a href="index.php">APC_training.org</a></h1>
                <h1 class="fadeIn box-title">Connexion</h1>
                <div class="form-floating text-center">
    <input name="user_a" type="text" class="form-control text-black border-1 border-primary" placeholder="votre nom"  required>
    
      <label for="floatingInput">Entrez votre nom et prenoms</label>
    </div>
   
    
            <input class=" btn btn-primary my-5" type="submit" value="connexion" name="submit">
             
            </form>
        </div>
        </div>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl){
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
      </script>
</body>
</html>