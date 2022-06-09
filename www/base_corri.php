
<?php
// Connexion � la base de donn�es MySQL 
try{
    $db = $ddo= new PDO('mysql:host=localhost;dbname=registration;charset=utf8','root','');
    $db->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->setattribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
    $ddo->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $ddo->setattribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
}catch(PDOException $e){
    echo 'erreur de connexion à la base de donné'.$e->getMessage();

}
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect('localhost', 'root', '', 'registration');
 
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
    if(!$_SESSION['username']){
        header('Location: login.php');
    }
}
// Vérifier la connexion
if($ddo=== false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>   
