
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
        <title>Hello, world!</title>
        <style>
          .header{
            background-color: rgb(2, 1,61);
            color: white;
          }
        </style>
        <script src="js/monjs.js"></script>
      </head>
<body class="container">
    <div class="sucess">
        <h1 class="vert">Voulez vous vraiment activer cette utilisateur ?</h1>
        <h4 class="text-danger">verifiez si les informations sont correct</h4>

  
<?php
            $req= $db->prepare('SELECT * FROM user WHERE id=?');
            $req->execute(array($_GET['id']));
            while($reponse = $req->fetch(PDO::FETCH_OBJ)){
                ?> 
                <span class="fs-5 text-white"> <b class="serif"><i>le nom est: </i></b><?php echo $username=$reponse->username;?><br> <b><i>le numéro de dépot est : <?php echo $reponse->num_tel;?></i></b></span> 
                <?php  $password=$reponse->password;?>
                <?php  $niveau=$reponse->niveau;?>

                 <?php  
            }
        ?> 
         <?php 
                 
                $id = stripslashes($_GET['id']);
                    if(isset($_POST['submit'])){

                        $query2 = "SELECT * FROM user_abonner WHERE username = '$username'";
                        $res2 = mysqli_query($conn, $query2);
                        if(mysqli_num_rows($res2) > 0){
                        
                
                            echo '<br> <div class="mt-2 "><p><i><u> <h5 class="text-danger">cet utilisateur est déjà activé</h5> </u></i></p></div>' ;
                        }else{
                        $req2 = $db->prepare("INSERT into user_abonner (username, id_parent, password)
                        VALUES ('$username', '$id', ' $password')");
                        $req2->execute(array($username,$id,$password));

                        header("Location:membres.php");

                    }
                    

                    }
                    if(isset($_POST['danger'])){
                        header("Location:membres.php");
                    }
                   
                 ?>

  
           
                   

                   <form action="" method="POST">
                    
                    
                        <input class=" btn btn-primary my-5" type="submit" value="oui je veux l'activer" name="submit">
                        <input type="submit" class="btn btn-danger" value="Annuler" name="danger">
                        

                        
                   	
                </form>
        </div>
    </div> 
    </div>
</body>
</html>