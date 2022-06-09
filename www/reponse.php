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
<?php 
    

    if(isset($_POST['submit_a'])){
        extract($_POST);
        if(!empty($nom) and !empty($email) and !empty($message)){

           $req=$db->prepare('INSERT INTO reponse(id_parent,nom,email,message,datepost) VALUES(?,?,?,?,NOW())');
           $req->execute(array($_GET['id'],$nom,$email,$message));
        }
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
        <title>Réponse</title>
        <style>
            span{
                color: rgb(3, 112, 61);
            }
            h2{
                color: grey;
            }
        </style>
      </head>
<body>
    <section class="text-white">
        <div class="container">
            
            <!-- recupperation du ncommentaire -->
            <?php

            $req= $db->prepare('SELECT * FROM commentaires WHERE id=?');
            $req->execute(array($_GET['id']));
            while($reponse = $req->fetch(PDO::FETCH_OBJ)){
                ?> 
                <span class="fs-5 vert"> <b class="serif"><i>Posté par: </i></b><?php echo $reponse->nom;?><br> <b><i>Le: </i></b><?php echo $reponse->datepost;?></span> 
                <p> <?php echo $reponse->message;?></p> <br>
                
                 <?php  
            }
        ?> 
         <?php 
        if(isset($_SESSION['password'])){?> 
        
        <h2>Répondre</h2>
            <form action="" method="POST">
            <div class="row">
                <div class=" col-sm">
                <input class="form-control my-2" type="text" name="nom" placeholder="votre nom" required>
            <input class="form-control" type="email" name="email" placeholder="entrer votre email" required>
                </div>
                <div class="col">
                <textarea class="form-control my-2" name="message"  cols="30" rows="2" placeholder="votre message" required></textarea>
                <input type="submit" name="submit_a" value="envoyer" class="btn btn-success my-2">

                </div>
            </div>
            </form>
            <?php  }?>
            <h2>Réponse</h2>
            <?php
            $req= $db->prepare('SELECT * FROM reponse WHERE id_parent=?');
            $req->execute(array($_GET['id']));
            while($reponse = $req->fetch(PDO::FETCH_OBJ)){
                ?> 
                <span class="fs-5 vert"> <b class="serif"><i>Posté par: </i></b><?php echo $reponse->nom;?><br> <b><i>Le: </i></b><?php echo $reponse->datepost;?></span> 
                <p> <?php echo $reponse->message;?></p> <br> 
                <a href="supprime_reponse.php?id=<?php echo $reponse->id_parent; ?>">
                                <button class=" bg-danger">supprimer</button>
                        
                                </a>
                 <?php  
            }
        ?> 
        </div>
    </section>
</body>
</html>