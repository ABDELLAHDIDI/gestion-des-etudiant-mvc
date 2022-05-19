<?php
include_once 'C:\xampp\htdocs\mvc\model\connexion.php ' ; 
session_start(); 
$nom= $_POST['nom1'] ; 
$prenom=$_POST['prenom1'] ; 
$cne=$_POST['cne1'] ; 
$adresse=$_POST['adresse1'] ; 
$ville=$_POST['ville1'] ; 
$email=$_POST['email1'] ;
$register=$_POST['register1'] ;
$photo=$_FILES['photo1']['name'] ;   
$photo1=$_FILES['photo1']['tmp_name'] ;
$etat=0;
if(!isexistajouter($cne)){
$cnx=getbdd();
insert_eleve($cnx,$cne,$nom,$prenom,$adresse,$ville,$email,$photo,$etat);
  echo "salamo3alikom".'<br>';
move_uploaded_file($photo1, "../../img/".$photo);

     header("Location:../../vue/home.php");
   $a=1;
}
else {
    echo "l'eleve est existant !!!!!!!!!!!!".'<br>';
    echo "<a href='/mvc/vue/ajouter.html' >revenir </a>";
    $a=0;
}




?>
