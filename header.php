<?php

$utilcheck=0;

if($utilcheck === 2){
   $_SESSION['connected']=$res[2];
}

   if(isset($_SESSION["connected"])){
      echo "<a href='commentaire.php'> Commentaire </a>";
      echo "<a href='livre-or.php'> Livre d'or </a>";
      echo "<a href='profil.php'> Mon Profil </a>";
      echo "<a href='logout.php'> Déconnexion </a>";
   } else {
      echo"<a href='connexion.php'> Connexion </a>";
      echo"<a href='inscription.php'> Inscription </a>";
      echo"<a href='livre-or.php'> Livre d'or </a>"; 
   }

   if(isset($_GET['logout'])){
   session_destroy();
   header("Location:connexion.php");
   }

?>