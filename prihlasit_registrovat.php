<?php

if(isset($_POST["submit"])) {

    $jmeno = $_POST["jmeno"];
    $prijmeni = $_POST["prijmeni"];
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $login = $_POST["login"];
    $heslo = $_POST["heslo"];

    $jmeno_ok = false;
    $prijmeni_ok = false;
    $email_ok = false;
    $telefon_ok = false;

    if (strlen($jmeno) > 1)
    {
        $jmeno_ok = true;
    }

    if (strlen($prijmeni) > 1)
    {
        $prijmeni_ok = true;
    }
    if (strlen($telefon) === 9)
    {
        $telefon_ok = true;
    }
    if(strlen($email) > 4 and strpos($email, '@') !== false and strpos($email, '.') !== false)
    {
        $email_ok = true;
    }

    if ($jmeno_ok and $prijmeni_ok and $telefon_ok and $email_ok)
    {
        header("Location: muj_ucet.php");
        exit;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hlavni strana</title>
    <link rel="stylesheet" href="prihlasit_registrovat.css" />
</head>
<body>
<div class="contain">
    <div class="header">
        <img id="zluta" src="images/zluta.png"/>
        <img id="pruhy_nahore" src="images/pruhy.png"/>
        <img id="logo" src="images/samonil.svg"/>
        <img id="telefon" src="images/telefon.svg"/>

    </div>
    <div class="middle">
        <div>
            <input class="prihlasit" type="button" value="prihlasit se">
            <input class="registrovat" type="button" value="registrovat se">
        </div>
        <form id="prihlasovaci-formular" method="post" action="muj_ucet.php">
            <label for="username" >Uzivatelske jmeno</label>
            <input required  type="text" id="username" name="username">
            <br>
            <label for="password" >Heslo</label>
            <input  required type="password" id="password" name="password">
            <br>
            <input type="submit" name="submit" value="prihlasit se" id="prihlas">
        </form>

        <form id="registracni-formular" method="post" action="muj_ucet.php">
            <label for="jmeno" >Jmeno</label>
            <input required  type="text" id="jmeno" name="jmeno">
            <span id="jmeno-spatne" class="spatne">Jméno je příliš krátké</span>
            <br>
            <label for="prijmeni" >Prijmeni</label>
            <input  required type="text" id="prijmeni" name="prijmeni">
            <span id="prijmeni-spatne" class="spatne">Příjmení je příliš krátké</span>
            <br>
            <label for="email" >E-mail</label>
            <input  required type="email" id="email" name="email">
            <span id="email-spatne" class="spatne">Zadaný e-mail je neplatný</span>
            <br>
            <label for="telefon-cislo" >Telefon</label>
            <input  required type="text" id="telefon-cislo" name="telefon">
            <span id="telefon-spatne" class="spatne">Telefon nemá správný formát (9 čísel)</span>
            <br>
            <label for="login" >Uzivatelske jmeno</label>
            <input  required type="text" id="login" name="login">
            <span id="login-spatne" class="spatne">Uživatelské jméno je příliš krátké</span>
            <br>
            <label for="heslo" >Heslo</label>
            <input  required type="password" id="heslo" name="heslo">
            <span id="heslo-spatne" class="spatne">Heslo je příliš krátké</span>
            <br>
            <input type="submit" name="submit" value="Registrovat se" id="submit">

        </form>
    </div>
    <div class="footer">
        <img id="pruhy" src="images/pruhy.png">
    </div>
</div>
</body>
<script src="prihlasit_registrovat.js"></script>
</html>