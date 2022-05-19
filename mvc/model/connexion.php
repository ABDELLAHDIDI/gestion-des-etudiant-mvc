<?php
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=dbensat', 'root',
            '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}
function iserror(){
    try {
        $cnx=getbdd();
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        $cnx=null;
    }
}
function isentrer( $a){
    if(!$a){
        header("Location: /mvc/index.html");
      }
      else{
      iserror();
        }    
}
function num_rows($cnx,$table){
    $res = $cnx->prepare("SELECT COUNT(*) FROM $table");
    $res->execute();
    $num_rows = $res->fetchColumn();
    return   $num_rows;
}
 function isexist($name, $password){
    $v=0;
    $cnx=getbdd();
    $sql = "SELECT * FROM comptes";
    $result = $cnx->query($sql);
    if (num_rows($cnx,'comptes') > 0) {
      while($row = $result->fetch(PDO::FETCH_ASSOC)) 
  if($name==$row['user'] && $password==$row['passwd']) {$v=1;break;}}
  $cnx = null;
  return $v;
}

function isexistajouter($cne){
  $v=0;
  $cnx=getbdd();
  $sql = "SELECT CNE  FROM eleves";
  $result = $cnx->query($sql);
  if (num_rows($cnx,'eleves') > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) 
if($cne==$row['CNE']) {$v=1;break;}}
$cnx = null;
return $v;
}

function inesrt_prof($nom,$motdepasse)
{
   if(!isexist($nom,$motdepasse)){
        $cnx=getbdd();
        $sql ="INSERT INTO  comptes (  user,passwd)
        VALUES ('$nom','$motdepasse');";
       $result = $cnx->query ($sql) ; 
       echo 'vous avez reussit le sign-up .'.'<br>';
       echo 'prière de <a href="/mvc/index.html">sign-in</a>'.'<br>';
   }
   else {
    echo  'le nom ou le mot de passe existant !!!!!!!!!!!!!!!!!!!!!!!! .'.'<br>';
    echo  'ressayer <a href="/mvc/vue/profup.html">sign-up</a>'.'<br>';


   }
}
function aff($cnx){
    $sql = "SELECT * FROM eleves";
$result = $cnx->query ($sql) ;


if (num_rows($cnx,'eleves') > 0) {
$sql = "SELECT * FROM eleves";
$result =$cnx->query ($sql) ;
  echo '<table border="10">
  <tr>
  <td> ID </td> 
  <td> CNE </td>
  <td> NOM </td>
  <td> PRENOM </td>
  <td> ADRESSE </td>
  <td> VILLE </td>
  <td> E-MAIL </td>
  <td> PHOTO </td>
  <td> ETAT</td>
  </tr>';
    while($row = $result->fetch(PDO::FETCH_ASSOC)) { // $row=mysqli_fetch_row($result) 
     
    echo  '<tr>'
    .'<td>'. $row['ID_eleve']        .'</td>'
    .'<td>'. $row['CNE']       .'</td>'
    .'<td>'. $row['Nom']       .'</td>'
    .'<td>'. $row['Prenom']    .'</td>'
    .'<td>'. $row['Adresse']   .'</td>'
    .'<td>'. $row['Ville']     .'</td>'
    .'<td>'. $row['email']     .'</td>'
    .'<td>'. '<img src="/mvc/img/'.$row['Photo'].'" />' .'</td>'
    .'<td>'. $row['etat']     .'</td>'
    .'</tr>';
    }
  } else {
    echo "vous n'avez pas un compte !!!!".'<br>';
  echo '<a href="index1.html">sign-up</a>'.'<br>';
  exit;
   
  }
  echo '</table>'.'<br>';
  
$cnx=null; }
function insert_eleve($cnx,$cne,$nom,$prenom,$adresse,$ville,$email,$photo,$etat){

  $sql ="INSERT INTO  eleves  (  CNE, Nom, Prenom, Adresse, Ville, email, Photo, etat)
  VALUES ('$cne','$nom','$prenom','$adresse','$ville','$email','$photo','$etat');";
 $result = $cnx->query ($sql) ; 
}

?>