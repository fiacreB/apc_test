
<?php 
    session_start();
    if(!$_SESSION['mdp']){
        header("Location: espace_admi.php");
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
          <div class="container-fluid py-5 my-5">
           <div class="row py-5">
               <div class="col-md-5 py-5 "> 
                   <div id="admi_acceuil" class="py-5 px-2">
                      
                        <div class="row"> <a href="publier_arti.php" class="border-des my-4">publier une épreuve </a></div>
                        <div class="row"><a href="corriger.php" class="border-des my-2">publier le  corriger d'une épreuve</a></div>
                        <div class="row"><a href="ajout_boords.php" class="border-des my-2">publier un boord </a></div>
                        <div class="row"><a href="ajout_tuto.php" class="border-des my-2">publier un tutoriel </a></div>
                        <div class="row"><a href="ajout_td.php" class="border-des my-2">publier un Td et sont corrigé </a></div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Autres Actions
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog text-dark">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">souscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="bottom" title="fermer la fenetre"></button>
              </div>
              <div class="modal-body">
                <p><h3 class="title-niv-1">cet espace est un espace privé</h3> <br> vous devez avoir un droit d'acces à cette page!!!!!!</p>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">non j'ai pas</button>
                <button type="button" class="btn "><a href="connexion_admi.php" class="bg-success text-white my-3">oui j'ai un</a></button>
              </div>
            </div>
          </div>
        </div>
        </div>
                        
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