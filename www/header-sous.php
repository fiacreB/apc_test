
<?php 
session_start();
require('base_corri.php');

    $alldocument = $ddo->query('SELECT * FROM documentations ORDER BY id DESC');
    if(isset($_GET['motCle']) AND !empty($_GET['motCle'])){
        $recherche= htmlspecialchars ($_GET['motCle']);
        $alldocument = $ddo->query('SELECT * FROM documentations WHERE matiere LIKE "%'.$recherche.'%" ORDER BY  id DESC');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form method="POST">
<nav class="mc-navbar navbar navbar-expand-lg position-fixed navbar-dark pe-3 w-100">
      <div class="container-fluid">
        <a href="#" class="navbar-brand  mx-3 py-3 fw-bolder">apc_e_learning</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbar">
        
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
         
            
              <form class="d-flex" method="post">
              <li class="nav-item pe-3"> 
                 <input type="search" class="form-control me-2" placeholder="Recherche" aria-label="recherche" name="search">
                 </li>
                 <li class="nav-item pe-3"> 
                  <button class="btn btn-success" type="submit">Recherche</button>
                  <li class="nav-item pe-3"> 
            </li>

            </form>     
            <li class="nav-item pe-3"><a href="index.php" class="nav-link active " aria-current="page"> Accueil</a>
            </li>
            
            <li class="nav-item pe-2  fs-10 dropdown"><button class="btn text-white" name="Troisieme">Troisième</button> 
            </li>
            <li class="nav-item dropdown"><a href="#" class="nav-link active dropdown-toggle" id="navbardropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Première</a>
                <ul class="dropdown-menu" aria-labelledby="navbardropdown">
                    <li><button class="btn dropdown-item" name="Premiere_C">Première C</button></li>
                    <li><button class="btn dropdown-item" name="Premiere_D">Première D</button></li>
                    <li><button class="btn dropdown-item" name="Premiere_TI">Première TI</button></li>
                    <li><button class="btn dropdown-item" name="Premiere_A">Première A</button></li>
                </ul>
            </li>
            <li class="nav-item pe-2 fs-10 dropdown"><a href="#" class="nav-link active dropdown-toggle" id="navbardropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Terminale</a>
                <ul class="dropdown-menu" aria-labelledby="navbardropdown">
                <li><button class="btn dropdown-item" name="Terminale_C">Terminale C</button></li>
                <li><button class="btn dropdown-item" name="Terminale_D">Terminale D</button></li>
                <li><button class="btn dropdown-item" name="Terminale_TI">Terminale TI</button></li>
                <li><button class="btn dropdown-item" name="Terminale_A">Terminale A</button></li>              
                </ul>
                </li> 
                </form>    
           
                
            
                <li class="nav-item pe-2 fs-10 ">
                <?php 
          if(isset($_POST["connect"])){
          $_SESSION["username"] = 1;
  
}


?>
          <?php 

                if(isset($_SESSION['username'])){
                  echo '
                  <a href="download_corri_c.php" class="nav-link active " id="navbardropdown" role="button"  aria-expanded="false">Tous les corrigés complets</a>
                ';
                }
          ?>
              </li>   
          <li class="nav-item me-2">
                 
    <?php 
                  require_once('logout_u.php');

                if(isset($_SESSION['username'])){
                  echo '
                  <form method="POST">
                  <input type="submit" value="Déconnexion" name="déconnexion" class="btn btn-success">
              </form>';
                }else{
                  echo '              <a href="login.php" class="nav-link" >
                  <input class="btn btn-success" type="button" name="connect" value="Connexion/Inscription"></a>
                  ';
                }
                ?>
              
              </a>
            </li>

        </ul>
  

        </div>
      </div>
      
    </nav>
        

     

    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl){
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
</script>
  </body>
</html>