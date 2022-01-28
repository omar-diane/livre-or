<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
    <link rel="stylesheet" href="livreor.css">
</head>
<body>
    <header class="main-head">
        <nav>
            <h1 id="logo">LOREM</h1>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php include "header.php"; ?>
            </ul>
        </nav>
    </header>

    <?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'livreor');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

// On commence par compter le nombre totale des commentaires  
$query = mysqli_query($conn,('SELECT COUNT(*) FROM commentaires'));  
$d = mysqli_fetch_array($query);  
$totalDesMessages = $d['COUNT(*)'];  
  
/*  On calcule le nombre de pages à créer , ce qu'on veut,  
c'est afficher 10 commentaires dans chaque page
La fonction ceil permet d'arrondir un nombre jusqu'au nombre entier suivant */  
$nombreDePages  = ceil($totalDesMessages / 10);  
  
//  on fait une boucle pour écrire les liens  des pages  
echo"Page : ";  
for ($i = 1 ; $i <= $nombreDePages ; $i++)  
{    echo '<a class="link" href="livre-or.php?page=' . $i . '">' . $i . '</a> ';  
}  
  
//J'utilise un tableau pour afficher cette etiquette.  
echo'<table id="livreor" width=100%>  
<tr>  
<th width=10% bgcolor=black> Login </th>  
<th width=90% bgcolor=black> Commentaires </th>  
</tr>  
</table>';  
  
if (isset($_GET['page']))  
{  
// On récupère le numéro de la page indiqué  dans l'adresse (ex: livre-or.php?page=1)  
    $page = $_GET['page'];   
}  
else // si la variable n'existe pas alors c'est la première fois qu'on charge la page.  
{  
// alors on va afficher la page 1 qui va contenir les derniers messages.  
 $page = 1;   
}  
  
// maintenant calcule le numéro du premier message .  
$premierMessageAafficher = ($page - 1) * 10;  
  
$reponse = mysqli_query($conn,('SELECT * FROM utilisateurs, commentaires ORDER BY date DESC LIMIT ' .   
$premierMessageAafficher . ', ' . 10));  
  
while ($d= mysqli_fetch_array($reponse))  
{  
?>  
<table>  
<tr>  
<td width=900px bgcolor=#6495ED>  
<?php  echo '<b>'.$d['login'].' </b><br/> '.$d['date'].''; ?>  
</td>  
<td width=90% bgcolor=#cccccc>  
<?php  echo $d['commentaire'] ; ?>  
</td>  
  
</table>  
      
<?php        
}  
  
mysqli_close($conn); // on ferme la connexion à MySQL  
?>     
    <main>
<?php

if(isset($_SESSION["connected"])){
      echo "<a class='link' href='commentaire.php'> Laisse ton commentaire en cliquant ici ! </a>";
} else {
    echo "Tu veux laisser ton commentaire ? <a class='link' href='connexion.php'> Connecte toi </a>";
}
?>
    </main>
</body>
</html>