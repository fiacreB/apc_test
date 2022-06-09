
<div class="container-fluid f-color">
  <footer class="row  ">
    <div class="col">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      </a>
      <p class="text-black">apc_e_learning 2022 &copy </p>
    </div>
    <div class="col">
      <h5 class="text-black"> <i>À propos</i> </h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2 mx-3"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Contacts
        </button>
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog text-dark">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel"> Nos Contacts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="bottom" title="fermer la fenetre"></button>
              </div>
              <div class="modal-body ">
              <p>contacts Téléphoniques:</p> 
              <div class="container-fluid">
                <p><b>-  </b>696655790</p>
                <p><b>-  </b>676087273</p>
                <p><b>-  </b>695856172</p>
                <p><b>-  </b>675859702</p>

              </div>
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
                 </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>
      </li>
         
        <li class="nav-item mb-2">
        <?php
        if(isset($_SESSION['username'])){
          require_once ('base_corri.php');

              $us= $_SESSION['username']; 
              $req = $ddo->prepare("SELECT * FROM user WHERE  username='$us'");
              $req->execute();
              $po = $req->fetch(PDO::FETCH_OBJ); 
                $p=$po->id;
         
              $req2 = $ddo->prepare("SELECT * FROM user_abonner WHERE  id_parent='$p'");
              $req2->execute();
              $query2 = "SELECT * FROM user_abonner WHERE id_parent='$p'";
              $res2 = mysqli_query($conn, $query2);
              if(mysqli_num_rows($res2) > 0){                 
                 $pu = $req2->fetch(PDO::FETCH_OBJ); 
                   $u=$pu->username;
                    
          
              if (!empty($us==$u)){
                  echo '<p class="vert mx-4">User_VIP</p>';
        }

        

      
    }
  }
        ?>
        </li>
        <li class="nav-item mb-2">
        <?php
        if(isset($_SESSION['username'])){
          echo "<a href='fogot.php'>Modifier mon mot de passe</a>";
        }else{

        }
        ?>
        </li>
      </ul>
     
    </div>


    
    <div class="col">
      <h5> <i>Section</i> </h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2 mx-3"><a href="index.php" class="nav-link p-0 text-black">Home</a></li>
        <li class="nav-item mb-2 mx-3"><a href="espace_admi.php" class="nav-link p-0 text-black">Administrateur</a></li>
      </ul>
    </div>
    <div class="col mt-5">
    <ul class="nav  justify-content-end list-unstyled inline-flex">
      <li class="ms-3  mt-2"><a href="mailto:apcelearning2022@gmail.com">apcElearning2022@gmail.com</a></li>
      
    </ul>
    </div>
  </footer>
</div>

    </section>
