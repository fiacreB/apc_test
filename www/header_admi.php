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
      </head>
<body>
<?php 
        require_once('logout_admi.php');
        require_once ('base_corri.php');
        ?>
       <nav class="mc-navbar navbar navbar-expand-l position-fixed navbar-dark  w-100 ">
        <div class="container-fluid">
            <h1 class="admi_h_color"> BIENVENU A VOUS ADMINISTRATEUR -<?php echo $_SESSION['mdp'];?> </h1>
            <a href="index_admin.php" class="active text-white " aria-current="page"> Acceuil</a>
            <form class="d-flex"  method="post">
                 <input type="search" class="form-control my-2 me-2" placeholder="recherche" aria-label="recherche" name="search">
                  <button class="btn btn-outline-success my-2" type="submit">recherche</button>
          </form>
            <form method="POST">
                <button name="déconnexion" class="btn btn-success my-2">Déconnexion</button>
            </form>
        </div>
       </nav>
</body>
</html>