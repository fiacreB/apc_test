<!DOCTYPE html>

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
<body class="banner ">
<nav class="mc-navbar navbar navbar-expand-lg position-fixed navbar-dark pe-3 w-100">
      <div class="container-fluid">
        <a href="#" class="navbar-brand text-uppercase mx-3 py-3 fw-bolder">Apc_training</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form method="POST">
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">   
            <li class="nav-item pe-3"><a href="administrateur.php" class="nav-link active " aria-current="page"> Acceuil</a>
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
                

            <li class="nav-item my-1 ">
            <form class="d-flex"  method="post">
                 <input type="search" class="form-control me-2" placeholder="recherche" aria-label="recherche" name="search">
                  <button class="btn btn-outline-success" type="submit">recherche</button>
          </form>
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
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl){
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
      </script>
    <section class="banner d-flex  align-items-center pt-">
      <div class="container-fluid my-5 py-5">
      <h1 class="title-niv-1 text-white">les différents corrigés du site :</h1>

        <div class="row">
          <div class="col">
            <div class="container-fluid">
                <article id="doc">
                <?php
if (isset($_POST['Troisieme'])) {
  extract($_POST);
  $req= $db->prepare('SELECT * FROM corriges WHERE classe="Troisième"  ORDER BY etablissement ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
       <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
  </div>
       <?php  
  }
}
elseif (isset($_POST['Premiere_C'])) {
  extract($_POST);
  $req= $db->prepare('SELECT * FROM corriges WHERE  classe="Première C"  ORDER BY etablissement ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
           <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
           
       </div>
       
  </div>
       <?php  
  }
}elseif (isset($_POST['Premiere_D'])) {
  extract($_POST);
  $req= $db->prepare('SELECT * FROM corriges WHERE  classe="Première D"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
       <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Premiere_TI'])) {
  extract($_POST);
  $req= $db->prepare('SELECT * FROM corriges WHERE classe="Première TI"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
       <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Premiere_A'])) {
  extract($_POST);
  $req= $db->prepare('SELECT * FROM corriges WHERE  classe="Première A"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
       <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Terminale_C'])) {
  extract($_POST);
  $req= $db->prepare('SELECT * FROM corriges WHERE  classe="Terminale C"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
       <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Terminale_D'])) {
  extract($_POST);
  $req= $db->prepare('SELECT * FROM corriges WHERE  classe="Terminale D"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
       <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Terminale_TI'])) {
  extract($_POST);
  $req= $db->prepare('SELECT * FROM corriges WHERE  classe="Terminale TI"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
       <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Terminale_A'])) {
  extract($_POST);
  $req= $db->prepare('SELECT * FROM corriges WHERE  classe="Terminale A"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
       <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
  </div>
       <?php  
  }
}

elseif (isset($_POST['search']) && !empty ($_POST['search'])) {
//on vérifie si l'utilisateur a entré des termes à rechercher, et on traite sa requête

$query = preg_replace("#[^a-zA-Z ? 0-9]#i", "", $_POST['search']);
$query= stripslashes($_POST['search']);
$query = $_POST["search"];
 $query = trim($query); 
 $query = strip_tags($query);
 


//Requête de sélection MySQL


$req = $db->prepare('SELECT * FROM corriges WHERE classe LIKE ? or etablissement LIKE ? or matiere LIKE ? or descriptions LIKE ?  ORDER BY classe DESC');
$req->execute(array("%".$query."%","%".$query."%","%".$query."%","%".$query."%"));
//On compte les résultats
$count = $req->rowCount();
?>
<?php 
if($count >= 1) {
  echo"<div class='text-success '> $count </div><div class='text-white '> résultats trouvés pour:  <strong class='text-dark'> $query </strong> \n </div>";
  while ($reponse = $req->fetch(PDO::FETCH_OBJ)) {
    ?>

<div id="download" class="bg-white my-2">
                 

                 <div id="image_epreuve">
                     <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
                
                 </div>
                 <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
                 <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
            </div>
 <?php }   
} else {
  echo "\n <hr /> <div class='text-white'> Aucun résultat trouvé pour:    <strong class='text-danger'> $query </strong> <div>\n";
}
?> 
<?php } 
else {


  

          $req= $db->prepare('SELECT * FROM corriges  ORDER BY classe ');
        $req->execute();
        while($reponse = $req->fetch(PDO::FETCH_OBJ)){
            ?> 
             <div id="download" class="bg-white my-2">
             

             <div id="image_epreuve">
                 <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
            
             </div>
             <div  class="serif mx-2 py-0 my-0">
                 <b><p><?php echo $reponse->matiere;?></p></b>
                 <b><p><?php echo $reponse->classe;?></p></b>
                <i><p><?php echo $reponse->descriptions;?></p></i>
                <b><u><p class="vert"><?php echo $reponse->etablissement;?></p></u></b>
                     
                 </div>
             <div id="download_epreuve">
                                <a href="supprime_corri.php?id=<?php echo $reponse->id; ?>">
                                <button class="btn btn-danger">supprimer</button>
                        
                                </a>
                            </div>
        </div>
             <?php  
        }
    }
    ?>  


      
                   
                </article>
       
            </div>
        </div>
       </div>
       </div>
    
    </section> 
    <?php require_once ('footer.php'); ?> 

</body>

</html>