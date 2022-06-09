<?php 
session_start();
require_once ('base_corri.php');
if(!isset($_SESSION['mdp'])){
   
     header('Location: espace_admi.php');
 }
 
?>
<?php require_once('header_admi.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap CSS -->
        <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
        <title>publication des articles</title>
</head>
<body >
                
                
                <?php 
                    if(isset($_POST['valider'],$_POST['matiere'], $_POST['description'],$_POST['classe'],$_FILES['video'])){
                          // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
            $username = stripslashes($_POST['matiere']);
            $username = mysqli_real_escape_string($conn, $username);
            // récupérer la classe et supprimer les antislashes ajoutés par le formulaire
            $userclasse= stripslashes($_POST['classe']);
            $userclasse = mysqli_real_escape_string($conn, $userclasse); 
            $password = stripslashes($_POST['description']);
            $password = mysqli_real_escape_string($conn, $password);
    
                        $video_name = $_FILES['video']['name'];
                        $tmp_name = $_FILES['video']['tmp_name'];
                        $error = $_FILES['video']['error'];
                         if($error === 0){
                             $video_ex=pathinfo($video_name,PATHINFO_EXTENSION);
                             $video_ex_lc = strtolower($video_ex);
                             $allowed_exs= array ("mp4",'webm','avi','flv');
                             if(in_array($video_ex_lc,$allowed_exs)){
                                $new_video_name=uniqid("video",true). '.'.$video_ex_lc;                                 $video_upload= "upload/".$new_video_name;
                                move_uploaded_file($tmp_name,$video_upload);

                                // insertion des elements dans la bd
                                $sql = "INSERT INTO tutoriels(videos,matiere,classe,descriptions) VALUES('$new_video_name','$username','$userclasse','$password')";
                                $run=mysqli_query($conn,$sql);
                                if($run){
                                echo "<div class='succes my-5 py-5'><p><h2>Ajouter avec succes</h2></p> </div>";
                            }else{
                                echo "<div class='echec my-5 py-5'> <p>echec de l'ajout </p> </div>";
                            }
                             }else{
                                echo '<div class="container py-5">
                                <div class="row my-5">
                               
                                <div class="col">
                                    <h3><p class="errorMessage my-5"> le fichier selectionner est invalide!!!!! selectionner un fichier valide (mp4,webm,avi,flv) </p></h3>
                                </div>
                                </div>
                        </div>';
                             }
                         }

                    }
                ?>
                <section class="mc-form py-5 my-5">
               

            <div class="container">
                <h2 class="serif text-center text-light mb-4 my-5">Veuillez remplir le formulaire de chargement d'un tutoriel (video)</h2>
                <?php if(isset($_GET['error'])){ ?> 
                    <p class="text-danger"><?= $_GET['error'] ?> </p>
                    <?php } ?> 
                <form method="POST"  enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-6 col-sm my-3">
                    <div class="mb-3">
                        <input type="file" name="video" class="form-control" id="fichier" required>
                    </div>                    
    
                    <!-- <select name="reference" class="form-select border-des my-3"  > 
                        <option>tuto</option>
                    
    
                    </select> -->
                    
                    <select name="classe" class="form-select border-des my-3" placeholder="classe" required >
                        <option selected>Troisieme</option> 
                        <option>Premiere D</option> 
                        <option>Premiere C</option>
                        <option>Premiere A</option>
                        <option>Premiere TI</option>              
                        <option>Terminale D </option>
                        <option>Terminale C</option>
                        <option>Terminale A</option>
                        <option>Terminale TI</option>
                        
                    </select>
                    </div>
                    <div class="col"> 
                    <select name="matiere" class="form-select my-3 border-des" placeholder="nom du lycée / college" required >
                        <option selected>Mathématique</option> 
                        <option>Physique</option>
                        <option>Chimie </option>
                        <option>SVT</option>              
                        <option>Informatique </option>
                        <option>Allemand</option>
                        <option>Espagnol</option>
                        <option>Anglais</option>
                        
                    </select>
                    
                    <!-- <input type="text" class="fadeIn" name="etablissement" placeholder="nom du lycée / college" required > -->
                    <input type="text" class="form-control" name="description" placeholder="entrer une description du pdf (Exemple: session 2010)" required >
                    <input type="submit" name="valider" value="charger" class="btn btn-success my-5 mt-5 mx-5">
                    </div>
                    
                    </form>
               
                </div>
                

            </div>
        </section>
</body>
</html>