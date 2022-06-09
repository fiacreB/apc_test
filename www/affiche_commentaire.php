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
    <title>commentaires</title>
    <style>
        span{
            color: rgb(3, 112, 61);
        }
        body{
            background-color: rgba(177, 177, 179, 0.733);
        }
    </style>
  </head>
<body>
<nav class="mc-navbar navbar navbar-expand-lg position-fixed navbar-dark pe-3 w-100">
      <div class="container-fluid">
        <a href="#" class="navbar-brand text-uppercase mx-3 py-3 fw-bolder">Apc_training</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">   
            <li class="nav-item pe-3"><a href="administrateur.php" class="nav-link active " aria-current="page"> Acceuil</a>
            </li>
                <li>
                <form method="POST">
                <button name="déconnexion" class="btn btn-success mx-2">Déconnexion</button>
            </form>
                </li>
        </ul>
    
        

        </div>
      </div>
      
    </nav>
<section class=" mx-auto container  py-5 ">
    <div>
    <h3 class="title-niv-1 py-5">Commentaires postés:</h3>
    <p>
    <?php
    
        $req= $db->prepare('SELECT * FROM commentaires');
        $req->execute();
        while($reponse = $req->fetch(PDO::FETCH_OBJ)){
            ?> 
            <span class="fs-5 vert"> <b class="serif"><i>Posté par: </i></b><?php echo $reponse->nom;?><br> <b><i>Le: </i></b><?php echo $reponse->datepost;?></span> 
            <p> <?php echo $reponse->message;?></p> <br> 
            <a href="reponse.php?id=<?php echo $reponse->id;?>">Répondre </a> <br>
               
            
            <a href="reponse.php?id=<?php echo $reponse->id;?>">Nombre de réponses:
             <?php  
             $nbreponse = $db->prepare('SELECT * FROM reponse WHERE id_parent=?');
             $nbreponse->execute(array($reponse->id));
             $nbreponse = $nbreponse->fetchAll();
             echo count($nbreponse);   
?>  
        </a> <br><a href="supprime_commentaire.php?id=<?php echo $reponse->id; ?>">
                                <button class=" bg-danger">supprimer</button>
                        
                                </a>
       
        </p>

             <?php  
        }
    ?> <br>

    </p>
    </div>
</section>
</body>
</html>