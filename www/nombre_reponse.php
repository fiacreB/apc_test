
        

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
  require_once ('base_corri.php');
  session_start();

            $req= $db->prepare('SELECT * FROM commentaires WHERE id=?');
            $req->execute(array($_GET['id']));
            while($reponse = $req->fetch(PDO::FETCH_OBJ)){
                ?> 
                <span class="fs-5 vert"> <b class="serif"><i>Posté par: </i></b><?php echo $reponse->nom;?><br> <b><i>Le: </i></b><?php echo $reponse->datepost;?></span> 
                <p> <?php echo $reponse->message;?></p>
                 <?php  
            }
        ?> 
       
           
            <h2>Réponse</h2>
            <?php
            $req= $db->prepare('SELECT * FROM reponse WHERE id_parent=?');
            $req->execute(array($_GET['id']));
            while($reponse = $req->fetch(PDO::FETCH_OBJ)){
                ?> 
                <span class="fs-5 vert"> <b class="serif"><i>Postée par: </i></b><?php echo $reponse->nom;?><br> <b><i>Le: </i></b><?php echo $reponse->datepost;?></span> 
                <p> <?php echo $reponse->message;?> <br> </p>
                 <?php  
            }
        ?> 
        </div>
    </section>
</body>
</html>