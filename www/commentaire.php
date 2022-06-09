
<?php

    if(isset($_POST['submit_c'])){
        extract($_POST);
        if(!empty($nom) and !empty($niveau) and !empty($message)){
            require_once ('base_corri.php');

           $req=$db->prepare('INSERT INTO commentaires(nom,niveau,message,datepost) VALUES(?,?,?,NOW())');
           $req->execute(array($nom,$niveau,$message));
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
    <section class=" mx-auto ">
        <div>
            
        <form action="" method="POST">
            <div class="row">
                <div class=" col-sm">
                <input class="form-control my-2" type="text" name="nom" placeholder="votre nom" required>
            <input class="form-control" type="text" name="niveau" placeholder="votre niveau d'etude" required>
                </div>
                <div class="col">
                <textarea class="form-control my-2" name="message"  cols="30" rows="2" placeholder="votre message" required></textarea>
                <input type="submit" name="submit_c" value="Envoyer" class="btn btn-success my-2">

                </div>
            </div>
          
        </form>
        <h3>Commentaires postés:</h3>
        <p>
        <?php
        
        require_once ('base_corri.php');
        $req= $db->prepare('SELECT * FROM commentaires');
            $req->execute();
            while($reponse = $req->fetch(PDO::FETCH_OBJ)){
                ?> 
                <span class="fs-5 vert"> <b class="serif"><i>Posté par: </i></b><?php echo $reponse->nom;?><br> <b><i>Le: </i></b><?php echo $reponse->datepost;?></span> 
                <p> <?php echo $reponse->message;?> <br> <br>
                
                <a href="nombre_reponse.php?id=<?php echo $reponse->id;?>">Nombre de réponses:
                 <?php  
                 $nbreponse = $db->prepare('SELECT * FROM reponse WHERE id_parent=?');
                 $nbreponse->execute(array($reponse->id));
                 $nbreponse = $nbreponse->fetchAll();
                 echo count($nbreponse);   
?> 
            </a>
            </p>
                 <?php  
            }
        ?> 
        </p>
        </div>
    </section>
</body>
</html>