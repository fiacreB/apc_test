<?php 
  require_once ('base_corri.php');
  if(!isset($_SESSION['mdp'])){
   
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
        <title>chargement du document</title>
        <style>
          .header{
            background-color: rgb(2, 1,61);
            color: white;
          }
        </style>
      </head>
<body class="banner">
 
<?php 
    

    if(isset($_POST['valider'],$_POST['matiere'], $_POST['description'],$_POST['etablissement'],$_POST['classe'])){
        $pdo= mysqli_connect('localhost','root','','registration');
            // recuperer le nom d'utilisateur et supprimer les antislashes ajoutes par le formulaire
            $username = stripslashes($_POST['matiere']);
            $username = mysqli_real_escape_string($pdo, $username);
            // recuperer la classe et supprimer les antislashes ajoutes par le formulaire
            $userclasse= stripslashes($_POST['classe']);
            $userclasse = mysqli_real_escape_string($pdo, $userclasse); 

             // recuperer le nom du lycee/college et supprimer les antislashes ajoutes par le formulaire
             $useretabli= stripslashes($_POST['etablissement']);
             $useretabli = mysqli_real_escape_string($pdo, $useretabli);
            // recuperer le mot de passe et supprimer les antislashes ajoutes par le formulaire
            $password = stripslashes($_POST['description']);
            $password = mysqli_real_escape_string($pdo, $password);
    
    
            $filename=$_FILES['document']['name'];
            $fileType=$_FILES['document']['type'];
            $filesize=$_FILES['document']['size'];
            $fileTmpname=$_FILES['document']['tmp_name'];
            $Ext = strchr($filename,".");
            $extentionAutoriser = array (".pdf", ".docx");

            if(in_array($Ext,$extentionAutoriser)){
                $file_store= "upload/".$filename;
                $insererArticle="INSERT INTO documentations(nom,matiere,classe,descriptions,etablissement) VALUES ('$filename','$username','$userclasse','$password','$useretabli')";
                $run = mysqli_query($pdo,$insererArticle);
                if($run){
                    move_uploaded_file($fileTmpname,$file_store);
                    echo "<div class='succes my-5 py-5'><p><h2>Ajouter avec succes</h2></p> </div>";
                }else{
                    echo "<div class='echec'> <p>echec de l'ajout </p> </div>";
                }
                
            }else{
                echo '<div class="container py-5">
                        <div class="row my-5">
                       
                        <div class="col">
                            <h3><p class="errorMessage my-5"> le fichier selectionner est invalide!!!!! selectionner un fichier valide (.pdf,.docx) </p></h3>
                        </div>
                        </div>
                </div>';
            }
        }
    ?>
            <?php require_once('header_admi.php');
                
            ?>   
        
        <section class="mc-form py-5 my-5">
            <div class="container">
                <h2 class="serif text-center text-light mb-4 my-5">Veuillez remplir le formulaire de chargement d'une epreuve (pdf ou docx)</h2>
                <form action=""  method="POST"  enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-6 col-sm my-3">
                    <div class="mb-3">
                        <input type="file" name="document" class="form-control" id="fichier" required>
                    </div>                    
    
                    <select name="etablissement" class="form-select border-des my-3" placeholder="nom du lycee / college" required > 
                        <option>College Aloys Tapiemene</option>
                        <option>College Baba Simon de Missole</option>
                        <option>College Chevreuil</option>
                        <option>College Dupond</option>
                        <option>College Evangelique Thomas Noutong</option>
                        <option>College Jean Tabi</option>
                        <option>College la Retraite</option>
                        <option>College Lele</option>
                        <option>College Libermann</option>
                        <option>College Marie Albert</option>
                        <option>College Nathan</option>
                        <option>College Sonara de Limbe</option>
                        <option>College Jeacques de Bernou</option>
                        <option>College la Victoire</option>
                        <option>College Notre Dame de Dschang</option>
                        <option>College Obana Oveng</option>
                        <option>College Polyvalent de l'Unite</option>
                        <option>College Protestant</option>
                        <option>College Saint Joseph</option>
                        <option>College Sainte Therese de Garoua</option>
                        <option>College Saint Paul de Bafang</option>
                        <option>College Saint Thomas Acquin</option>
                        <option>College Vogt</option>
                        <option>Lycee Bilingue d'akono</option>
                        <option>Lycee Bilingue Akonolinga</option>
                        <option>Lycee Bilingue Edea</option>
                        <option>Lycee Bilingue Ebolowa</option>
                        <option>Lycee Bilingue Eseka</option>
                        <option>Lycee Bilingue de Kribi</option>
                        <option>Lycee Bilingue de Bafoussam</option>
                        <option>Lycee Bilingue de Down Town Bamenda</option>
                        <option>Lycee Bilingue de Bagante</option>
                        <option>Lycee Bilingue de Baham</option>
                        <option>Lycee Bilingue de Bangou</option>
                        <option>Lycee Bilingue de Bertoua</option>
                        <option>Lycee Bilingue de Bonaberi</option>
                        <option>Lycee Bilingue de Bayelle-Nken</option>
                        <option>Lycee Bilingue de Molyko</option>
                        <option>Lycee Bilingue de Maroua</option>
                        <option>Lycee Bilingue de Dschang</option>
                        <option>Lycee Bilingue de Mbouda</option>
                        <option>Lycee Bilingue de Nkonsamba</option>
                        <option>Lycee Bilingue de Nylon Brazzaville</option>
                        <option>Lycee Bilingue de Yabassi</option>
                        <option>Lycee Bilingue de Yom</option>        
                        <option>Lycee Bilingue de Yaounde </option>
                        <option>Lycee Bilingue Sultan Ibrahim Njoya</option>
                        <option>Lycee Classique Edea</option>
                        <option>Lycee Classique Eseka</option>
                        <option>Lycee Classique et Moderne de Ngaoundere</option>
                        <option>Lycee Classique de Bafang</option>
                        <option>Lycee Classique et Moderne de Garoua</option>
                        <option>Lycee Classique de Bafoussam</option>
                        <option>Lycee Classique de Bagante</option>
                        <option>Lycee Classique de Dschang</option>
                        <option>Lycee Classique de Foumban</option>
                        <option>Lycee Classique et Moderne Akonolinga</option>
                        <option>Lycee de Manengoumba</option>
                        <option>Lycee Generale Leclerc </option>
                        <option>Lycee Oyack </option>
                        <option>Lycee de Banjoun</option>
                        <option>Lycee de Bonepoupa</option>
                        <option>Lycee de Bikok</option>
                        <option>Lycee de Kekem</option>
                        <option>Lycee de Koutaba</option>
                        <option>Lycee de Ngoumo</option>
                        <option>Lycee Joss</option>
                        <option>College Teerenstra de Bertoua</option>
                        <option>Lycee Scientifique de Bertoua</option>
    
                    </select>
                  
                    
                    
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
                    <select name="matiere" class="form-select my-3 border-des" placeholder="nom du lycee / college" required >
                        <option selected>Mathematique</option> 
                        <option>Physique</option>
                        <option>Chimie </option>
                        <option>SVT</option>              
                        <option>Informatique </option>
                        <option>Allemand</option>
                        <option>Espagnol</option>
                        <option>Anglais</option>
                        
                    </select>
                    
                    <!-- <input type="text" class="fadeIn" name="etablissement" placeholder="nom du lycee / college" required > -->
                    <input type="text" class="form-control" name="description" placeholder="entrer une description du pdf (Exemple: session 2010)" required >
                    <input type="submit" name="valider" value="charger" class="btn btn-success my-5 mt-5 mx-5">
                    </div>
                    
                    </form>
               
                </div>
                

            </div>
        </section>
                
</body>
</html>