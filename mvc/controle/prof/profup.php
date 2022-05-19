<?php
include_once ('C:\xampp\htdocs\mvc\model\connexion.php ') ; 
$nom= $_POST['nom1'] ; 
$motdepasse=$_POST['motdepasse1'] ; 
$motdepasse1=$_POST['motdepasse11'] ; 
if($motdepasse!=$motdepasse1 ){ echo 'le mot de passe est incorrecte !!!!!!!!!!!!!!'.'<br>'; 
       echo "<a href='/mvc/vue/profup.html' >ressayer</a> ".'<br>'; }
       else {
        
        inesrt_prof($nom,$motdepasse) ;
        
       }
    


?>