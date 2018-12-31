<?php

session_start();
$user = $_SESSION["user"];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hlavni strana</title>
    <link rel="stylesheet" href="muj_ucet.css" />
</head>
<body>
<div class="contain">
    <header class="header">
        <img id="zluta" src="images/zluta.png" alt="Žlutá"/>
        <img id="pruhy_nahore" src="images/pruhy.png" alt="Pruhy"/>
        <img id="logo" src="images/samonil.svg" alt="Jiří Šamonil"/>
        <img id="telefon" src="images/telefon.svg" alt="Telefon: 602238172"/>

    </header>
    <main class="middle">

        <h1> jste prihlasen jako <?php echo htmlentities($user->username);?></h1>
        <div id="vypis"></div>
        <button class="dalsi">zobrazit dalsi</button>
    </main>
    <footer class="footer">
        <img id="pruhy" src="images/pruhy.png" alt="Pruhy">
    </footer>
</div>
<script src="muj_ucet.js"></script>
</body>
</html>