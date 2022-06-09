
<?php
require_once 'base_corri.php';
session_start();
if (!$_SESSION['username']) {
    header('Location: login.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>abonnement</title>
    <style>


            span{
                color: rgb(3, 112, 61);
            }
            h2{
                color: grey;
            }
        </style>
            <script type="text/javascript" src="js/monjs.js"></script>

  </head>
  <body class="">
  <?php if (isset($_SESSION['username'])) {
      $us = $_SESSION['username'];
      $req = $ddo->prepare("SELECT * FROM user WHERE  username='$us'");
      $req->execute();
      $po = $req->fetch(PDO::FETCH_OBJ);
      $p = $po->id;
      if (isset($_POST['submit'])) {
          extract($_POST);
          if (!empty($number)) {
              $number = $_POST['number'];
              $confi_password = $_POST['number2'];
              //requéte SQL + mot de passe crypté
              if ($confi_password == $number) {
                  $req2 = $ddo->prepare(
                      "UPDATE user SET num_tel = '$number' WHERE id='$p'"
                  );
                  $req2->execute();

                  $query2 = "SELECT * FROM user_abonner WHERE username = '$us'";
                  $res2 = mysqli_query($conn, $query2);
                  if (mysqli_num_rows($res2) > 0) {
                      echo '<div class="container mt-5 pt-5  justify-content-center align-items-center"><h4 class="text-white title-niv-1">Abonnez avec succes. Vous bénéficiez dès à présent de tous les sujets (corrigés, épreuves, tutoriels et fascicules) du site. </h4>
        <h5 class="text-white">Votre réusite est notre priorité.. merci pour la confiance et la confidentialité. Connectez vous <a href="login.php">ici</a> </h5>
        </div>';
                  } else {
                      echo '<div class="container mt-2"><h3 class="text-white">Votre abonnement est en cours de traitement. Veuillez patienter quelques instants merci!!</h3>

          </div>

          <div class="loader">
          <span class="lettre">T</span>
          <span class="lettre">R</span>
          <span class="lettre">A</span>
          <span class="lettre">I</span>
          <span class="lettre">T</span>
          <span class="lettre">E</span>
          <span class="lettre">M</span>
          <span class="lettre">E</span>
          <span class="lettre">N</span>
          <span class="lettre">T</span>
      </div>';
                  }
              } else {
                  echo '<p ><h2 class="text-danger">les deux numéros ne sont pas identiques</h2></p> ';
              }
          }
      } else {
           ?>
    <div>

    </div>
<div class="container  my-2">
  <form method="POST" onsubmit="return valider_number()" name="frm_a">

  <h1 class="title-niv-1 text-white">Abonnement annuel</h1>
  <div class=" bg-white container-fluid">
                                    <p>Pour bénéficier de tous les corrigés et ce de façon permanent, vous devez souscrire à un abonnement annuel de <span><b>1000FCFA</b></span> payable via l'un des numéros ci-dessous: <br> <span class="text-left">Numéro 1(OrangeMoney):</span> <b>691450908</b><br> <span>Numéro 2(MtnMomo):</span> <b>681395456</b> <br> <span><b><i><u>NB:</u></i></b></span> bien vouloir valider le formulaire après avoir  effectué un dépôt!
                                    </div>
    <div class="form-floating text-center ">
    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i>Entrez votre numéro de dépôt</span>
   <div class="input-group">
        <select name="c" id="">
            <option value="+237">+237</option>
        </select>
    <input name="number" type="texte" class="form-control text-black border-1 border-primary number" placeholder="677876543" maxlength="9" minlength="9"  required>
    </div>
    </div><div class="form-floating text-center">
    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i>Confirmez votre numéro de dépôt</span>
    <div class="input-group">
        <select name="c" id="">
            <option value="+237">+237</option>
        </select>
    <input name="number2" type="texte" class="form-control text-black border-1 border-primary number" placeholder="677876543" maxlength="9" minlength="9"  required>


    </div>
    </div>
    <input type="submit" name="submit" value="valider" class="w-100 btn btn-lg btn-primary check" > <br>
    <div></div><br>
    <p class="text-white text-center"> apc_e_learning met à votre disposition une série d'épreuves et corrections. À travers un abonnement vous bénéficiez de multiples avantages  <a href="#">politique d'utiltisation</a></p>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2021–2022</p>
  </form>

</div>
<div class="mc-foot">

</div>

  </body>
  <?php require_once 'footer.php'; ?>
  <?php
      }
  } ?>
</html>
