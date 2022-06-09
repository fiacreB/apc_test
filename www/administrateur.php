
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
        <title>espace administrateur</title>
        <style>
          .header{
            background-color: rgb(2, 1,61);
            color: white;
          }
        </style>
      </head>
<body>

          <?php
              require_once('header_admi.php');
              ?>
        <section class="text-white py-5 my-5">
          <div class="container-fluid py-5 my-5 ">
           <div class="row py-5">
             <div class="col-md-5"></div>
               <div class="col-md-5 py-5"> 
                   <div id="admi_acceuil" class="py-5">
                   <div class="row row-des "><a href="membres.php" class="border-des text-white bg-primary my-2 ">Afficher tous les  membres</a></div>
                   <div class="row row-des "><a href="ajout_admi.php" class="border-des text-white bg-primary my-2 ">creer un administrateur second</a></div>
                        <div class="row"> <a href="afficheadmi.php" class="border-des text-white bg-primary my-2">Afficher les administrateur second </a></div>
                        <div class="row row-des "><a href="affiche_doc_admi.php" class="border-des my-2 text-white bg-primary ">tout les documents publiés par les administrateurs </a></div>
                        <div class="row row-des  "><a href="affiche_correction.php" class="border-des text-white bg-primary my-2 ">tout les corrigés des différentes épreuve</a></div>
                        <div class="row row-des  "><a href="affiche_boords.php" class="border-des text-white bg-primary my-2 ">tout les boords</a></div>
                        <div class="row row-des  "><a href="affiche_td.php" class="border-des text-white bg-primary my-2 ">tout les td et corrigés</a></div>
                        <div class="row row-des  "><a href="affiche_tuto.php" class="border-des text-white bg-primary my-2 ">tout les tutoriels</a></div>
                        <div class="row row-des  ">
                          
                          
                        <a href="affiche_commentaire.php" class="border-des text-white bg-primary my-2 ">Repondre à un commentaire</a></div>
                    </div>
                </div>
           </div>
           
          </div>
          <script src="js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl){
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    </script>
 </section>
</body>
</html>