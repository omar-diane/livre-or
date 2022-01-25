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

// On commence par compter le nombre totale des messages  
$query = mysqli_query($conn,('SELECT COUNT(*) FROM commentaires'));  
$d = mysqli_fetch_array($query);  
$totalDesMessages = $d['COUNT(*)'];  
  
/*  On calcule le nombre de pages à créer , ce qu'on veut,  
c'est afficher 20 messages dans chaque page */  
$nombreDePages  = ceil($totalDesMessages / 20);  
  
//  on fait une boucle pour écrire les liens  des pages  
echo"page : ";  
for ($i = 1 ; $i <= $nombreDePages ; $i++)  
{    echo '<a href="livre-or.php?page=' . $i . '">' . $i . '</a> ';  
}  
  
//Nous avons decidé d'utiliser un tableau pour afficher cette etiquette.  
echo'<table width=100%>  
<tr>  
<th width=10% bgcolor=green> Login</th>  
<th width=90% bgcolor=green>Commentaires</font></th>  
</tr>  
</table>';  
  
if (isset($_GET['page']))  
{  
// On récupère le numéro de la page indiqué  dans l'adresse (ex: guestbook.php?page=4)  
    $page = $_GET['page'];   
}  
else // si la variable n'existe pas alors c'est la première fois qu'on charge la page.  
{  
// alors on va afficher la page 1 qui va contenir les dernier messages.  
 $page = 1;   
}  
  
// maintenant calcule le numéro du premier message .  
$premierMessageAafficher = ($page - 1) * 20;  
  
$reponse = mysqli_query($conn,('SELECT * FROM commentaires ORDER BY id DESC LIMIT ' .   
$premierMessageAafficher . ', ' . 20));  
  
while ($d= mysqli_fetch_array($reponse))  
{  
?>  
<table>  
<tr>  
<td width=900px bgcolor=#6495ED>  
<?php  echo '<b>'.$d[''].' </b><br/> '.$d['date'].''; ?>  
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

    </main>
</body>
</html>