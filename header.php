<?php 

$utilcheck=0;

if($utilcheck === 2){
   $_SESSION['connected']=$res[2];
} else {

}

   if(isset($_SESSION["connected"])){
      echo "<p><a href='profil.php'> Modifier mon profil </a></p>";
      echo "<p><a href='logout.php'> Déconnexion </a></p>";
      echo "<p><a href='commentaire.php'> Commentaire </a></p>";
      echo "<p><a href='livre-or.php'> Avis </a></p>";
   } else {
      echo"<p><a href='connexion.php'> Connexion </a></p>";
      echo"<p><a href='inscription.php'> Inscription </a></p>";
   }

   if(isset($_POST['logout'])){
   session_destroy();
   header("Location:connexion.php");
   }

?>