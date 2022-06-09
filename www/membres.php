<?php 
session_start();

    require_once('logout_admi.php');
    if(!$_SESSION['mdp']){
        header("Location: espace_admi.php");

    }
    if(!$_SESSION['password']){
      session_destroy();
      header('Location: espace_admi.php');
  }
  require_once ('base_corri.php');

 if(!isset($_SESSION['mdp'])){
   
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
if (isset($_POST['search']) && !empty($_POST['search'])) {
//on vérifie si l'utilisateur a entré des termes à rechercher, et on traite sa requête

//connexion à la base de données
    require_once 'recherche.php';

    $query = preg_replace("#[^a-zA-Z ? 0-9]#i", "", $_POST['search']);
    $query = stripslashes($_POST['search']);
    $query = $_POST["search"];
    $query = trim($query);
    $query = strip_tags($query);

//Requête de sélection MySQL

    $req = $db->prepare('SELECT * FROM user WHERE num_tel LIKE ? or username LIKE ?  ORDER BY id DESC');
    $req->execute(array( "%" . $query . "%", "%" . $query . "%"));
//On compte les résultats
    $count = $req->rowCount();
    ?>
<?php
if ($count >= 1) {
        echo "<div class='text-success '> $count </div><div class='text-white '> résultats trouvés pour:  <strong class='text-dark'> $query </strong> \n </div>";
        while ($reponse = $req->fetch(PDO::FETCH_OBJ)) {
            ?>

<section class="py-5 my-5">
                        <div class="container py-5 my-5">
                            <div class="row ">
                                <div class="col ">
                                    <div id="affiche_utilisateur">
                                        <P>
                                            <div class="affiche_name">
                                                <p><i> NOM et PRENOM = </i><?php echo $reponse->username;?></p>
                                                <p><i> niveau scolaire = </i><?php echo $reponse->niveau ;?></p>
                                                
                                                <p class="vert"><i> le numéro de téléphone pour activation= </i><?php echo $reponse->num_tel;?></p>

                                            </div>
                                            <div class="password users row">
                                                <div class="col">
                                                    <a href="banir.php?id=<?php $reponse->id;?>" ><button class="btn btn-danger"> Banir le membre</button></a>
                                                </div>
                                                <div class="col"></div>
                                                <div class="col">
                                                <form action="" method="POST">
                                                    <button class="btn-primary" name="submit"> <a href="activer-u.php?id=<?php $reponse->id;?> " class="text-white text-decoration-none"> activer</a></button>
                                                    <button class="mt-2  btn-danger" name="submit"> <a href="desactiver.php?id=<?php $reponse->id;?> " class="text-white text-decoration-none "> Désactiver </a></button>
                                                    </form>
                                         </div>
                                            </div>
                                        </P>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </section>
                   
 <?php }
    } else {
        echo "\n <hr /> <div class='text-white'> Aucun résultat trouvé pour:    <strong class='text-danger'> $query </strong> <div>\n";
    }
    ?>
<?php } else {

            
                $recupUsers=$ddo->query('SELECT * FROM user');
                while($user =$recupUsers->fetch()){
                    ?>
                
                    <section>
                        <div class="container">
                            <div class="row ">
                                <div class="col ">
                                    <div id="affiche_utilisateur">
                                        <P>
                                            <div class="affiche_name">
                                                <p><i> NOM et PRENOM = </i><?=$user['username'];?></p>
                                                <p><i> niveau scolaire = </i><?=$user['niveau'];?></p>
                                                <p class="vert"><i> le numéro de téléphone pour activation= </i><?=$user['num_tel'];?></p>

                                            </div>
                                            <div class="password users row">
                                                <div class="col">
                                                    <a href="banir.php?id=<?= $user['id']; ?>" ><button class="btn btn-danger"> Banir le membre</button></a>
                                                </div>
                                                <div class="col"></div>
                                                <div class="col">
                                                <form action="" method="POST">
                                                    <button class="btn-primary" name="submit"> <a href="activer-u.php?id=<?=$user['id'];?> " class="text-white text-decoration-none"> activer</a></button>
                                                    <button class="btn-danger" name="submit"> <a href="desactiver.php?id=<?=$user['id'];?> " class="text-white text-decoration-none"> Desactivé </a></button>
                                                    </form>
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
            }
                // mysqli_fetch($query)
                
            ?>
</body>
</html>