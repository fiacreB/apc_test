
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap CSS -->
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
<body class="banner">
    <?php require_once ('header-sous.php'); ?>
    
    <section class="banne d-flex  align-items-center">
      <div class="container-fluid mt-5 mb-2 pt-5">
        <div class="row">
          <div class="col">
            <div class="container-fluid">
            <article id="doc" class="mx-auto">
            <?php
if (isset($_POST['Troisieme'])) {
  extract($_POST);
  
  $req= $db->prepare('SELECT * FROM documentations WHERE etablissement="Collège Jeacques de Bernou" and classe="Troisième"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-1 py-0 my-0">
          <p><?php echo $reponse->matiere;?><br>
           <?php echo $reponse->classe;?><br>
           <span><?php echo $reponse->descriptions;?></span></p>
           
           
       </div>
       <div id="download_epreuve">
                   <a href="download.php?document=<?php echo $reponse->nom; ?>">
                      
                      <button class=" btn-success my-1">telecharger</button>
              
                      </a> <br> 
   <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
  
   </div>
  </div>
       <?php  
  }
}
elseif (isset($_POST['Premiere_C'])) {
  extract($_POST);
  
  $req= $db->prepare('SELECT * FROM documentations WHERE etablissement="Collège Jeacques de Bernou" and classe="Première C"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-1 py-0 my-0">
          <p><?php echo $reponse->matiere;?><br>
           <?php echo $reponse->classe;?><br>
           <span><?php echo $reponse->descriptions;?></span></p>
           
           
       </div>
       <div id="download_epreuve">
                   <a href="download.php?document=<?php echo $reponse->nom; ?>">
                      
                      <button class=" btn-success my-1">telecharger</button>
              
                      </a> <br> 
   <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
  
   </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Premiere_D'])) {
  extract($_POST);
  
  $req= $db->prepare('SELECT * FROM documentations WHERE etablissement="Collège Jeacques de Bernou" and classe="Première D"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-1 py-0 my-0">
          <p><?php echo $reponse->matiere;?><br>
           <?php echo $reponse->classe;?><br>
           <span><?php echo $reponse->descriptions;?></span></p>
           
           
       </div>
       <div id="download_epreuve">
                   <a href="download.php?document=<?php echo $reponse->nom; ?>">
                      
                      <button class=" btn-success my-1">telecharger</button>
              
                      </a> <br> 
   <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
  
   </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Premiere_TI'])) {
  extract($_POST);
  
  $req= $db->prepare('SELECT * FROM documentations WHERE etablissement="Collège Jeacques de Bernou" and classe="Première TI"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-1 py-0 my-0">
          <p><?php echo $reponse->matiere;?><br>
           <?php echo $reponse->classe;?><br>
           <span><?php echo $reponse->descriptions;?></span></p>
           
           
       </div>
       <div id="download_epreuve">
                   <a href="download.php?document=<?php echo $reponse->nom; ?>">
                      
                      <button class=" btn-success my-1">telecharger</button>
              
                      </a> <br> 
   <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
  
   </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Premiere_A'])) {
  extract($_POST);
  
  $req= $db->prepare('SELECT * FROM documentations WHERE etablissement="Collège Jeacques de Bernou" and classe="Première A"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-1 py-0 my-0">
          <p><?php echo $reponse->matiere;?><br>
           <?php echo $reponse->classe;?><br>
           <span><?php echo $reponse->descriptions;?></span></p>
           
           
       </div>
       <div id="download_epreuve">
                   <a href="download.php?document=<?php echo $reponse->nom; ?>">
                      
                      <button class=" btn-success my-1">telecharger</button>
              
                      </a> <br> 
   <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
  
   </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Terminale_C'])) {
  extract($_POST);
  
  $req= $db->prepare('SELECT * FROM documentations WHERE etablissement="Collège Jeacques de Bernou" and classe="Terminale C"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-1 py-0 my-0">
          <p><?php echo $reponse->matiere;?><br>
           <?php echo $reponse->classe;?><br>
           <span><?php echo $reponse->descriptions;?></span></p>
           
           
       </div>
       <div id="download_epreuve">
                   <a href="download.php?document=<?php echo $reponse->nom; ?>">
                      
                      <button class=" btn-success my-1">telecharger</button>
              
                      </a> <br> 
   <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
  
   </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Terminale_D'])) {
  extract($_POST);
  
  $req= $db->prepare('SELECT * FROM documentations WHERE etablissement="Collège Jeacques de Bernou" and classe="Terminale D"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-1 py-0 my-0">
          <p><?php echo $reponse->matiere;?><br>
           <?php echo $reponse->classe;?><br>
           <span><?php echo $reponse->descriptions;?></span></p>
           
           
       </div>
       <div id="download_epreuve">
                   <a href="download.php?document=<?php echo $reponse->nom; ?>">
                      
                      <button class=" btn-success my-1">telecharger</button>
              
                      </a> <br> 
   <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
  
   </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Terminale_TI'])) {
  extract($_POST);
  
  $req= $db->prepare('SELECT * FROM documentations WHERE etablissement="Collège Jeacques de Bernou" and classe="Terminale TI"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-1 py-0 my-0">
          <p><?php echo $reponse->matiere;?><br>
           <?php echo $reponse->classe;?><br>
           <span><?php echo $reponse->descriptions;?></span></p>
           
           
       </div>
       <div id="download_epreuve">
                   <a href="download.php?document=<?php echo $reponse->nom; ?>">
                      
                      <button class=" btn-success my-1">telecharger</button>
              
                      </a> <br> 
   <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
  
   </div>
  </div>
       <?php  
  }
}elseif (isset($_POST['Terminale_A'])) {
  extract($_POST);
  
  $req= $db->prepare('SELECT * FROM documentations WHERE etablissement="Collège Jeacques de Bernou" and classe="Terminale A"  ORDER BY matiere ');
  $req->execute();
  while($reponse = $req->fetch(PDO::FETCH_OBJ)){
      ?> 
       <div id="download" class="bg-white my-2">
       

       <div id="image_epreuve">
           <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
      
       </div>
       <div  class="serif mx-1 py-0 my-0">
          <p><?php echo $reponse->matiere;?><br>
           <?php echo $reponse->classe;?><br>
           <span><?php echo $reponse->descriptions;?></span></p>
           
           
       </div>
       <div id="download_epreuve">
                   <a href="download.php?document=<?php echo $reponse->nom; ?>">
                      
                      <button class=" btn-success my-1">telecharger</button>
              
                      </a> <br> 
   <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
  
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


$req = $db->prepare('SELECT * FROM documentations WHERE classe LIKE ? or etablissement LIKE ? or matiere LIKE ? or descriptions LIKE ?  ORDER BY classe DESC');
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
                    <p><?php echo $reponse->matiere;?><br>
                     <?php echo $reponse->classe;?><br>
                     <span><?php echo $reponse->descriptions;?></span></p>
                     
                     
                 </div>
                 <div id="download_epreuve">
                             <a href="download.php?document=<?php echo $reponse->nom; ?>">
                                
                                <button class="mx-1 btn-success my-1">telecharger</button>
                        
                                </a> <br> 
             <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
            
             </div>
            </div>
 <?php }   
} else {
  echo "\n <hr /> <div class='text-white'> Aucun résultat trouvé pour:    <strong class='text-danger'> $query </strong> <div>\n";
}
?> 
<?php } 
else {


  

    
        $req= $db->prepare('SELECT * FROM documentations WHERE etablissement="Collège Jeacques de Bernou" ORDER BY classe ');
        $req->execute();
        while($reponse = $req->fetch(PDO::FETCH_OBJ)){
            ?> 
             <div id="download" class="bg-white my-2">
             

             <div id="image_epreuve">
                 <img src="images/icon pdf.png" class="d-block img-fluid" alt="epreuve" >
            
             </div>
             <div  class="serif mx-1 py-0 my-0">
                <p><?php echo $reponse->matiere;?><br>
                 <?php echo $reponse->classe;?><br>
                 <span><?php echo $reponse->descriptions;?></span></p>
                 
                 
             </div>
             <div id="download_epreuve">
                         <a href="download.php?document=<?php echo $reponse->nom; ?>">
                            
                            <button class=" btn-success my-1">telecharger</button>
                    
                            </a> <br> 
         <a href="download_corri.php?id=<?php echo $reponse->id;?>"> <button class=" btn-primary">corrigé de l'épreuve</button> </a>  
        
         </div>
        </div>
             <?php  
        }
    }
    ?>  



                </article>
       
            </div>
        </div>
        <?php require_once ('aside.php'); ?>
       </div>
       </div>
    
    </section>
    <?php require_once ('footer.php'); ?>


</body>

</html>