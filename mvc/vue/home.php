<?php

session_start() ; 
if(!$_SESSION['a'] ){
  header("Location:../index.html");
} else {
include_once 'C:\xampp\htdocs\mvc\model\connexion.php ' ; 

iserror();
$cnx=getbdd();
aff($cnx);


echo '  <form action="ajouter.html" method="post">
<button class="register"  type="submit" name="register" value="2">ajouter un etudiant</button>
</form>'.'  <form action="modifier1.php" method="post">
<button class="register"  type="submit" name="register" value="2">modifier</button>
</form>
'.' <form action="suprimer1.php" method="post">
<button class="register"  type="submit" name="register" value="2">suprimer un etudiant </button>
</form>'.' <form action="dcnx.php" method="post">
<button class="register"  type="submit" name="register" value="2">deconnexion </button>
</form>'; }
 
?>