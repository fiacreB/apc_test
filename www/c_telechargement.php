<?php 
  require_once ('base_corri.php');
  session_start();
                if(!$_SESSION["username"]){
                    header("location:login.php");
                }
            ?>