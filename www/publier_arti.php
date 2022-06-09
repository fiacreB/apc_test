<?php 
session_start();
require_once ('base_corri.php');
if(!isset($_SESSION['mdp'])){
   
     header('Location: espace_admi.php');
 }
?>

<!DOCTYPE html>
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
    
        <title>publication des articles</title>
        <style>
          .header{
            background-color: rgb(2, 1,61);
            color: white;
          }
          .admi_h_color{
           color: #8f8d8c;
          }
        </style>
      </head>
<body>
        <?php require_once('header_admi.php');
                ?>  
                   <div class="py-5">
                    <?php require_once('charger_pdf.php');

                ?> 
                       </div>
</body>
</html>