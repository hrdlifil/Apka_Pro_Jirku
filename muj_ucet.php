<?php

if(isset($_POST["submit"]))
{

    $jmeno = $_POST["jmeno"];
    $prijmeni = $_POST["prijmeni"];
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $login = $_POST["login"];
    $heslo = $_POST["heslo"];

    if(strlen($jmeno) < 2 || strlen($prijmeni) < 2 || strlen($email) < 5 || strlen($telefon) != 9 || strlen($login) < 5 || strlen($heslo) < 6)
    {

    }
    else
    {
        header('Location: index.php');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hlavni strana</title>
    <link rel="stylesheet" href="muj_ucet.css" />
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

            <label for="password" >Heslo</label>
            <input  required type="password" id="password" name="password">

            <input type="submit" name="submit" value="prihlasit se" id="prihlas">
        </form>

        <form id="registracni-formular" method="post" action="muj_ucet.php">
            <label for="jmeno" >Jmeno</label>
            <input required  type="text" id="jmeno" name="jmeno">
            <br>
            <label for="prijmeni" >Prijmeni</label>
            <input  required type="text" id="prijmeni" name="prijmeni">
            <br>
            <label for="email" >E-mail</label>
            <input  required type="email" id="email" name="email">
            <br>
            <label for="phone" >Telefon</label>
            <input  required type="text" id="phone" name="telefon">
            <br>
            <label for="login" >Uzivatelske jmeno</label>
            <input  required type="text" id="login" name="login">
            <br>
            <label for="heslo" >Heslo</label>
            <input  required type="password" id="heslo" name="heslo">
            <br>
            <input type="submit" name="submit" value="prihlasit se" id="submit">

        </form>
    </div>
    <div class="footer">
        <img id="pruhy" src="images/pruhy.png">
    </div>
</div>
</body>
<script src="muj_ucet.js"></script>
</html>