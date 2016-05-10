<?php
include_once('class/class_annonce.php');
include_once('class/class_user.php');
include_once('class/class_MessageContact.php');
include_once('class/class_UsersManager.php');
include_once('class/class_AnnoncesManager.php');
session_start();

include_once('function.php');
$oPDO = connectDB();
$oAnnoncesManager = new AnnoncesManager($oPDO);
$oUsersManager = new UsersManager($oPDO);

include_once('traitement.php');
include_once('data.php');
logIP();
?>




<!DOCTYPE html>
<!--
N'oubliez pas de vérifier la syntaxe de votre code HTML : http://validator.w3.org
N'oubliez pas de vérifier la syntaxe de votre code CSS : http://jigsaw.w3.org/css-validator
-->
<html>
    <head>
        <title>Page au format HTML/CSS - Version float</title>

        <!-- On précise l'encodage de notre fichier HTML -->
        <meta charset="UTF-8" />

        <!-- On défini quelques balises META -->
        <meta name="description" content="Site d'annonce pour particulier" />
        <meta name="keywords" content="annonce, particulier, achat, vente" />

        <!-- On lie notre fichier HTML à notre fichier CSS -->
        <link rel="stylesheet" type="text/css" href="global.css" />

        <script type="text/javascript" src="lib/jquery.min.js"></script>
    </head>
    <body>

        <!-- On utilise la nouvelle balise HTML5 "header" pour indiquer le HEADER de notre site (partie en haut du site et identique sur toutes nos pages ou presque) -->
        <?php include('header.php'); ?>

        <div id="mainView">
            <?php
            //print_r($_GET);
            $page = NULL;
            if (isset($_GET['page'])) {
                $page = 'views/' . $_GET['page'] . '.php';
            }
            if (!file_exists($page)) {
                $page = 'views/home.php';
            }

            include($page);
            ?>
        </div>


        <!-- On utilise la nouvelle balise HTML5 "footer" pour indiquer le FOOTER de notre site (partie en bas du site et identique sur toutes nos pages ou presque) -->
        <?php include('footer.php'); ?>
    </body>
</html>