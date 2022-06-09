
<?php 
session_start();
if(!$_SESSION['mdp']){
    header("Location: espace_admi.php");

}
if(!$_SESSION['password']){
  session_destroy();
  header('Location: espace_admi.php');
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
        <title>utilisateurs</title>
        <style>
          .header{
            background-color: rgb(2, 1,61);
            color: white;
          }
        </style>
      </head>
<body>
<?php require_once('header_admi.php'); ?>     
  
   
        <!-- afficher les membres -->
        <div class="row py-5 ">

        </div>
        <div class="py-4"></div>
            <?php 
                $recupUsers=$ddo->query('SELECT * FROM administrateur_s');
                while($user =$recupUsers->fetch()){
                    ?>
                
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col ">
                                    <div id="affiche_utilisateur">
                                        <P>
                                            <div class="affiche_nam">
                                                <p><i> NOM et PRENOM: </i><?=$user['nom'];?> <?=$user['prenom'];?></p>
                                                <p><i> FILIERE: </i><?=$user['prof'];?></p>
                                                <p><i>  ADRESSE EMAIL: </i><?=$user['adresse'];?></p>
                                            </div>
                                            <div class="password user row">
                                                <div class="col">
                                                    <a href="baniradmi.php?id=<?= $user['id']; ?>" ><button class="btn btn-danger"> Banir l'administrateur</button></a>
                                                </div>
                                            </div>
                                        </P>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </section>
                   
                    
                    <?php 
                }
             
                // mysqli_fetch($query)
                
            ?>
</body>
</html>