<?php
include_once ('C:\xampp\htdocs\mvc\model\connexion.php ') ;  
$name = $_POST['nomEtulisateur'] ; 
$password = $_POST['motDePasse'] ; 
$a=$_POST['entrer'];
session_start() ; 
$_SESSION['a'] = $a; 
isentrer($a);
$v=isexist($name , $password);
if(!$v)   {
  echo "vous n'avez pas un compte !!!!".'<br>';
  echo '<a href="/mvc/vue/profup.html">sign-up</a>'.'<br>';
  exit();
}else {

       header("Location: /mvc/vue/home.php");

  exit(); 
  
  } 

  

?>