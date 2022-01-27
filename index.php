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
                <li><a href="#">Accueil</a></li>
                <?php include "header.php"; ?>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h2>Welcome To China</h2>
            <h3>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error esse quod commodi nemo sequi! Praesentium quae velit unde itaque dolorem iure! Aperiam fugiat dignissimos reprehenderit sunt provident perspiciatis autem ducimus!</h3>
        </section>

        <section class="articles">
            <div class="article">
            <div class="left">
                <img src="images/china2.jpg" alt="">
            </div>
            <div class="right">
                <p class="description">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis laboriosam, deleniti at voluptatem accusamus aliquam quam numquam repudiandae iure iste voluptatum quis culpa molestias autem, error reiciendis minima. Odit, omnis?
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis laboriosam, deleniti at voluptatem accusamus aliquam quam numquam repudiandae iure iste voluptatum quis culpa molestias autem, error reiciendis minima. Odit, omnis?
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis laboriosam, deleniti at voluptatem accusamus aliquam quam numquam repudiandae iure iste voluptatum quis culpa molestias autem, error reiciendis minima. Odit, omnis?
                </p>
            </div>
            <div class="left">
                <img src="images/chine.jpg" alt="">
            </div>
            <div class="right">
                <p class="description">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis laboriosam, deleniti at voluptatem accusamus aliquam quam numquam repudiandae iure iste voluptatum quis culpa molestias autem, error reiciendis minima. Odit, omnis?
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis laboriosam, deleniti at voluptatem accusamus aliquam quam numquam repudiandae iure iste voluptatum quis culpa molestias autem, error reiciendis minima. Odit, omnis?
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis laboriosam, deleniti at voluptatem accusamus aliquam quam numquam repudiandae iure iste voluptatum quis culpa molestias autem, error reiciendis minima. Odit, omnis?
                </p>
            </div>
            </div>
        </section>
    </main>
    <footer>
        <a href="https://github.com/omar-diane/livre-or">Github</a>
        <table>
            <tr>
                <td><a href="index.php">ACCUEIL</a></td>
                <td><a href="connexion.php">CONNEXION</a></td>
                <td><a href="inscription.php">INSCRIPTION</a></td>
            </tr>
        </table>
    </footer>
</body>
</html>