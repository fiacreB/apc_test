
   <?php 
     require_once ('base_corri.php');

session_start();
 if(!isset($_SESSION['username'])){
   
     header('Location: login.php');
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
                    <title>download</title>
                    <style>
                        span{
                            color: rgb(3, 112, 61);
                        }
                        h2{
                            color: grey;
                        }
                    </style>
                  </head>
                
            <?php
  if(isset($_SESSION['username'])){
                $us= $_SESSION['username']; 
                $req = $ddo->prepare("SELECT * FROM user WHERE  username='$us'");
                $req->execute();
                $po = $req->fetch(PDO::FETCH_OBJ); 
                  $p=$po->id;
                
            ?>
                <?php 
                
                $req2 = $ddo->prepare("SELECT * FROM user_abonner WHERE  id_parent='$p'");
                $req2->execute();
                $query2 = "SELECT * FROM user_abonner WHERE id_parent='$p'";
                $res2 = mysqli_query($conn, $query2);
                if(mysqli_num_rows($res2) > 0){                 
                   $pu = $req2->fetch(PDO::FETCH_OBJ); 
                     $u=$pu->username;
                      
            
                if (!empty($us==$u)){
                    
                  if(!empty($_GET['document'])){
                    $filename = basename($_GET['document']);
                    $filepatch = "upload/".$filename;
            
                    if(!empty($filename) && file_exists($filepatch)){
                        //define header
                        header("Cache-Control: public");
                        header("Content-Description: File Transfer");
                        header("Content-Disposition: attachement; filename = $filename");
                        header("Content-Type: application/zip");
                        header("Content-Transfer-Encoding: binary");
            
                        readfile($filepatch);
                        exit;
                    }else{
                        echo "file not exit";
                    }
                }  
              }
                        }else{ 
                            echo '<body class="banner my-0 py-0">
                                
                           
                            <div class="modal-dialog text-dark my-0 py-0" position-fixed>
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title " id="exampleModalLabel">apc_e_learning</h5>
                                
                              </div>
                              <div class="modal-body ">
                             
                                    <div class="container  text-align-center>
                                            <div class="col-md-6 mx-5 my-5 py-5">
                                            <div class="container">
                                                <h1 class="title-niv-1"> seuls les abonnés ont le droit de téléchargement des corrections</h1>
            
                                                <p>Pour bénéficier de tous les corrigés et ce de façon permanente, vous devez souscrire à un abonnement annuel de <span><b>1000FCFA</b></span>.  </p>
                                                
                                            </div>
                                            </div>
                                   
                                 
                                 
                              <div class="modal-footer mx-2 serif px-5">
                              <a href="abonnement.php"> <button class="btn btn-outline-primary"> payer mon abonnement</button></a>
                              </div>
                              </div>
                            </div>
                          </div>
                          </body>   ';
                        
                        } 
                     
                
                    }else{ 
                        echo '<body class="banner my-0 py-0">
                                
                           
                        <div class="modal-dialog text-dark my-0 py-0">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">apc_e_learning</h5>
                            
                          </div>
                          <div class="modal-body ">
                         
                                <div class="container  text-align-center>
                                        <div class="col-md-6 mx-5 my-5 py-5">
                                        <div class="container">
                                            <h1 class="title-niv-1"></h1>
                                            <p>connectez vous pour à fin d"avoir un accès aux différents corrigés</p>
                                            <h2>Merci pour la confiance.</h2>
                                            </div>
                                        </div>
                                        </div>
                               
                             
                             
                          <div class="modal-footer mx-2 serif px-5">
                          <a href="c_telechargement.php"> <button class="btn btn-outline-primary "> se connecter</button></a>
                          </div>
                          </div>
                        </div>
                      </div>
                      </body>   ';
                    }
                
                    ?> 
                
                <script src="js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                <script>
                  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl){
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                  })
            </script>
            </body>
            </html>