        
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
<body>
    <section class="text-white">
        <div class="container">
            
   
            <?php
  require_once ('base_corri.php');
  $req= $db->prepare('SELECT * FROM corriges WHERE id_parent=?');
            $req->execute(array($_GET['id']));
            if($reponse = $req->fetch(PDO::FETCH_OBJ)){
              ?> 
                <body class="banner my-0 py-0">
                    
               
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
                                    <p>Pour bénéficier de tous les corrigés et ce de façon permanente, vous devez souscrire à un abonnement annuel de <span><b>1000FCFA</b></span> payable via l'un des numéros ci-dessous: <br> <span>Numéro 1(OrangeMoney):</span> <b>691450908</b><br> <span>Numéro 2(MtnMomo):</span> <b>681395456</b> <br> <span><b><i><u>NB:</u></i></b></span> les documents (corrections) sous format PDF, seront mis à votre disposition après abonnement.  </p>
                                    <h2>Merci pour la confiance.</h2><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    contacts
                                    </button>
                                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog text-dark">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">nos contacts</h5>
                 
              </div>
              <div class="modal-body ">
              <p>contacts Téléphoniques:</p> 
              <div class="container-fluid">
                <p><b>-  </b>696655790</p>
                <p><b>-  </b>676087273</p>
                <p><b>-  </b>695856172</p>
                <p><b>-  </b>675859702</p>

                <div >
                <a href="https://chat.whatsapp.com/G8zxTpckUUKCJObXa2P16N">
                <img src="images/whats.jpeg"  width="60">
                </a>
                <a href="mailto:apc_e_learning:@gmail.com">
                <img src="images/google.PNG"  width="100">
                </a>
                <a href="https://www.facebook.com/groups/1119881152171824/">
                <img src="images/face.png"  width="50">
                </a>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
              </div>
            </div>
            
        </div>
        </div >
                                    </div>
                                </div>
                                </div>
                       
                     
                     
                  <div class="modal-footer mx- serif px-5">
                  <a href="download_c.php?document=<?php echo $reponse->nom; ?>"> <button class="btn btn-outline-primary"> Poursuivre mon téléchargement</button></a>
                  <a href="abonnement.php"><button class="btn btn-outline-success">S'abonner</button></a>
                  </div>
                  </div>
                </div>
              </div>
              </body>   
                 <?php  
            }
        
            else{
                echo '<div class="modal-dialog text-dark">
                <div class="modal-content">
                 
                  <div class="modal-body ">
                 
                        <div class="container  text-align-center>
                                <div class="col-md-6 mx-5 my-5 py-5">
                                <div class="container">
                                    <h1 class="title-niv-1">apc_e_learning</h1>
                                    <p>Le corrigé de cette épreuve est indisponible pour le moment. Vous avez la possibilité de nous contacter pour tout autres services via nos <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    contacts
                                    </button> <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog text-dark">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title " id="exampleModalLabel">nos contacts</h5>
                                           
                                        </div>
                                        <div class="modal-body ">
                                        <p>contacts Téléphoniques:</p> 
                                        <div class="container-fluid">
                                          <p><b>-  </b>696655790</p>
                                          <p><b>-  </b>676087273</p>
                                          <p><b>-  </b>695856172</p>
                                          <p><b>-  </b>675859702</p>
                          
                                        </div>
                          
                                        
                                        <a href="https://chat.whatsapp.com/G8zxTpckUUKCJObXa2P16N">
                                        <img src="images/whats.jpeg"  width="60">
                                        </a>
                                        <a href="mailto:apc_e_learning:@gmail.com">
                                        <img src="images/google.PNG"  width="100">
                                        </a>
                                        <a href="https://www.facebook.com/groups/1119881152171824/">
                                        <img src="images/face.png"  width="50">
                                        </a>
                                      
                          
                                           </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                                        </div>
                                      </div>
                                      
                                  </div>
                                  </div ></p>
                                    <h2>Merci pour la confiance.</h2>
                                    </div>
                                </div>
                                </div>
                       
                     
                     
                  
                  </div>
                </div>
              </div>
                ';
                
            }
       
            ?> 
        </div>
    </section>
    <script src="js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl){
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
</script>
</body>
</html>















