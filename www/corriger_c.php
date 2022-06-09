
      <?php 
    session_start();
    require_once ('base_corri.php');

    if(isset($_POST['valider'],$_POST['matiere'], $_POST['description'],$_POST['etablissement'],$_POST['classe'])){
            // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
            $username = stripslashes($_POST['matiere']);
            $username = mysqli_real_escape_string($pdo, $username);
            // récupérer la classe et supprimer les antislashes ajoutés par le formulaire
            $userclasse= stripslashes($_POST['classe']);
            $userclasse = mysqli_real_escape_string($pdo, $userclasse); 
             // récupérer le nom du lycée/collège et supprimer les antislashes ajoutés par le formulaire
             $useretabli= stripslashes($_POST['etablissement']);
             $useretabli = mysqli_real_escape_string($pdo, $useretabli);
            // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
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
                $insererArticle="INSERT INTO corriges_c (nom,matiere,classe,descriptions,etablissement) VALUES ('$filename','$username','$userclasse','$password','$useretabli')";
                 
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
    <section>
        <div class="container">
        <h2 class="serif text-center text-light mb-4 my-5">Veuillez remplir le formulaire de chargement d'une épreuve (pdf ou docx)</h2>
            <!-- recupperation du ncommentaire -->
            
                 
                 

         <section class=" py-5 my-5">
            <div class="container">
               
                <form action=""  method="POST"  enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-6 col-sm mt-3">
                    <div class="mb-3">
                        <input type="file" name="document" class="form-control" id="fichier" required>
                    </div>                    
                    <select name="etablissement" class="form-select border-des my-3" placeholder="nom du lycée / collège" required > 
                        <option>Collège Aloys Tapiemene</option>
                        <option>Collège Baba Simon de Missolè</option>
                        <option>Collège Chevreuil</option>
                        <option>Collège Dupond</option>
                        <option>Collège Evangelique Thomas Noutong</option>
                        <option>Collège Jean Tabi</option>
                        <option>Collège la Retraite</option>
                        <option>Collège Lélé</option>
                        <option>Collège Libermann</option>
                        <option>Collège Marie Albert</option>
                        <option>Collège Nathan</option>
                        <option>Collège Sonara de Limbé</option>
                        <option>Collège Jeacques de Bernou</option>
                        <option>Collège la Victoire</option>
                        <option>Collège Notre Dame de Dschang</option>
                        <option>Collège Obana Oveng</option>
                        <option>Collège Polyvalent de l'Unité</option>
                        <option>Collège Protestant</option>
                        <option>Collège Saint Joseph</option>
                        <option>Collège Sainte Thérèse de Garoua</option>
                        <option>Collège Saint Paul de Bafang</option>
                        <option>Collège Saint Thomas Acquin</option>
                        <option>Collège Vogt</option>
                        <option>Lycée Bilingue d'akono</option>
                        <option>Lycée Bilingue Akonolinga</option>
                        <option>Lycée Bilingue Edéa</option>
                        <option>Lycée Bilingue Ebolowa</option>
                        <option>Lycée Bilingue Eséka</option>
                        <option>Lycée Bilingue de Kribi</option>
                        <option>Lycée Bilingue de Bafoussam</option>
                        <option>Lycée Bilingue de Down Town Bamenda</option>
                        <option>Lycée Bilingue de Baganté</option>
                        <option>Lycée Bilingue de Baham</option>
                        <option>Lycée Bilingue de Bangou</option>
                        <option>Lycée Bilingue de Bertoua</option>
                        <option>Lycée Bilingue de Bonabéri</option>
                        <option>Lycée Bilingue de Bayelle-Nken</option>
                        <option>Lycée Bilingue de Molyko</option>
                        <option>Lycée Bilingue de Maroua</option>
                        <option>Lycée Bilingue de Dschang</option>
                        <option>Lycée Bilingue de Mbouda</option>
                        <option>Lycée Bilingue de Nkonsamba</option>
                        <option>Lycée Bilingue de Nylon Brazzaville</option>
                        <option>Lycée Bilingue de Yabassi</option>
                        <option>Lycée Bilingue de Yom</option>        
                        <option>Lycée Bilingue de Yaoundé </option>
                        <option>Lycée Bilingue Sultan Ibrahim Njoya</option>
                        <option>Lycée Classique Edéa</option>
                        <option>Lycée Classique Eséka</option>
                        <option>Lycée Classique et Moderne de Ngaoundéré</option>
                        <option>Lycée Classique de Bafang</option>
                        <option>Lycée Classique et Moderne de Garoua</option>
                        <option>Lycée Classique de Bafoussam</option>
                        <option>Lycée Classique de Baganté</option>
                        <option>Lycée Classique de Dschang</option>
                        <option>Lycée Classique de Foumban</option>
                        <option>Lycée Classique et Moderne Akonolinga</option>
                        <option>Lycée de Manengoumba</option>
                        <option>Lycée Générale Leclerc </option>
                        <option>Lycée Oyack </option>
                        <option>Lycée de Banjoun</option>
                        <option>Lycée de Bonepoupa</option>
                        <option>Lycée de Bikok</option>
                        <option>Lycée de Kekem</option>
                        <option>Lycée de Koutaba</option>
                        <option>Lycée de Ngoumo</option>
                        <option>Lycée Joss</option>
                        <option>Collège Teerenstra de Bertoua</option>
                        <option>Lycée Scientifique de Bertoua</option>
    
                    </select>
                     
                    
                    
                    <select name="classe" class="form-select border-des my-3" placeholder="classe" required >
                        <option selected>Troisième</option> 
                        <option>Première D</option> 
                        <option>Première C</option>
                        <option>Première A</option>
                        <option>Première TI</option>              
                        <option>Terminale D </option>
                        <option>Terminale C</option>
                        <option>Terminale A</option>
                        <option>Terminale TI</option>
                        
                    </select>
                    </div>
                    <div class="col-md-6 col-sm">
                    <select name="matiere" class="form-select my-3 border-des" placeholder="nom du lycée / collège" required >
                        <option selected>Mathématique</option> 
                        <option>Physique</option>
                        <option>Chimie </option>
                        <option>SVT</option>              
                        <option>Informatique </option>
                        <option>Allemand</option>
                        <option>Espagnol</option>
                        <option>Anglais</option>
                        
                    </select>
                    
                    <!-- <input type="text" class="fadeIn" name="etablissement" placeholder="nom du lycée / collège" required > -->
                    <input type="text" class="form-control" name="description" placeholder="entrer une description du pdf (Exemple: session 2010)" required >
                    <input type="submit" name="valider" value="charger" class="btn btn-success my-5">
                    <button class="btn btn-primary"><a href="index_admin.php" class="text-white">Acceuil</a></button>
                    </div>
                    
                    </form>
               
                </div>
                

            </div>
        </section>
        </div>
    </section>
</body>
</html>