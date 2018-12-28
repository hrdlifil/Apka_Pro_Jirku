<?php
$username_uz_existuje = false;
$neprihlasen = false;
$login_ok = true;
$password_ok = true;

function zaregistruj($jmeno, $prijmeni, $telefon, $email, $username, $heslo)
{
    $heslo_na_hashovani = $username.$heslo;
    $zahashovane_heslo = password_hash($heslo_na_hashovani, PASSWORD_DEFAULT);
    $dsn = "mysql:host=localhost;dbname=apka_pro_jirku_db";
    $pdo = new PDO($dsn, "root", "mP4oxnt11");
    $stmt = $pdo->prepare("insert into uzivatele(jmeno,prijmeni,telefon,email,username,heslo) values(:jmeno,:prijmeni,:telefon,:email,:username,:heslo)");
    $stmt->execute(["jmeno" => $jmeno, "prijmeni" => $prijmeni,"telefon"=> $telefon ,"email" => $email, "username" => $username, "heslo" => $zahashovane_heslo]);
}

if(isset($_POST["submit-prihlaseni"]))
{
    $login_ok = false;
    $password_ok = false;
    $login = $_POST["username"];
    $heslo = $_POST["password"];
    $heslo_k_zahashovani = $login.$heslo;

    if (strlen($login) > 4)
    {
        $login_ok = true;
    }
    if (strlen($heslo) > 4)
    {
        $password_ok = true;
    }

    if($login_ok == true and $password_ok == true)
    {
        $dsn = "mysql:host=localhost;dbname=apka_pro_jirku_db";
        $pdo = new PDO($dsn, "root", "mP4oxnt11");
        $stmt = $pdo->prepare("select * from uzivatele where username=:login");

        $hashed = password_hash($heslo_k_zahashovani, PASSWORD_DEFAULT);

        $stmt->execute(["login" => $login]);

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if($user != null and password_verify($heslo_k_zahashovani, $user->heslo))
        {
            $neprihlasen = false;
            session_start();
            $_SESSION["user"] = $user;
            header("Location: muj_ucet.php");
            exit;
        }
        else
        {
            $neprihlasen = true;
        }

    }
}

if(isset($_POST["submit"]))
{
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
    $username_ok = false;
    $heslo_ok = false;

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
    if (strlen($heslo)> 4)
    {
        $heslo_ok = true;
    }

    $dsn = "mysql:host=localhost;dbname=apka_pro_jirku_db";
    $pdo = new PDO($dsn, "root", "mP4oxnt11");
    $stmt = $pdo->prepare("select * from uzivatele where username=:login");
    $stmt->execute(["login" => $login]);

    $user = $stmt->fetch();

    if ($user == null)
    {
        $username_ok = true;
    }

    if ($jmeno_ok and $prijmeni_ok and $telefon_ok and $email_ok and $heslo_ok and $username_ok)
    {
        zaregistruj($jmeno, $prijmeni, $telefon, $email, $login, $heslo);
        $username_uz_existuje = false;
        header("Location: muj_ucet.php");
        exit;
    }else
        {
            $username_uz_existuje = true;

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
        <form id="prihlasovaci-formular" method="post" action="prihlasit_registrovat.php">
            <label for="username" >Uzivatelske jmeno</label>
            <input required  type="text" id="username" name="username">
            <span id="login-spatne-prihlaseni" class="spatne">Uživatelské jméno je příliš krátké</span>
            <?Php if($login_ok == false)
            {
                echo "<span>Uživatelské jméno je příliš krátké</span>";
            } ?>
            <br>
            <label for="password" >Heslo</label>
            <input  required type="password" id="password" name="password">
            <span id="heslo-spatne-prihlaseni" class="spatne">Heslo je příliš krátké</span>
            <?Php if($password_ok == false)
            {
                echo " <span>Heslo je příliš krátké</span>";
            } ?>
            <br>
            <input type="submit" name="submit-prihlaseni" value="prihlasit se" id="prihlas">
        </form>

        <form id="registracni-formular" method="post" action="prihlasit_registrovat.php">
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
        <div class="msg-username-existuje">
            <?php
            if ($username_uz_existuje)
            {
                echo "Uzivatelske jmeno jiz existuje, zadejte prosim jine";
            }
            if($neprihlasen and isset($_POST["submit-prihlaseni"]))
            {
                echo "Přihlášení se nezdařilo";
            }
            ?>
        </div>

    </div>
    <div class="footer">
        <img id="pruhy" src="images/pruhy.png">
    </div>
</div>
</body>
<script src="prihlasit_registrovat.js"></script>
</html>