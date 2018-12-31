<?php
session_start();
$_SESSION["odeslano_poprve_registrace"] = true;
$_SESSION["odeslano_poprve_prihlaseni"] = true;
$username_uz_existuje = false;
$neprihlasen = false;
$login_ok = true;
$password_ok = true;
$username = "";
$password = "";
$jmeno = "";
$prijmeni = "";
$email = "";
$telefon = "";
$login = "";
$heslo = "";
function zaregistruj($jmeno, $prijmeni, $telefon, $email, $username, $heslo)
{
    $heslo_na_hashovani = $username.$heslo;
    $zahashovane_heslo = password_hash($heslo_na_hashovani, PASSWORD_DEFAULT);
    $dsn = "mysql:host=localhost;dbname=apka_pro_jirku_db";
    $pdo = new PDO($dsn, "root", "mP4oxnt11");
    $stmt = $pdo->prepare("insert into uzivatele(jmeno,prijmeni,telefon,email,username,heslo) values(:jmeno,:prijmeni,:telefon,:email,:username,:heslo)");
    $stmt->execute(["jmeno" => $jmeno, "prijmeni" => $prijmeni,"telefon"=> $telefon ,"email" => $email, "username" => $username, "heslo" => $zahashovane_heslo]);
}
function prihlas($username, $heslo_k_zahashovani)
{
    $dsn = "mysql:host=localhost;dbname=apka_pro_jirku_db";
    $pdo = new PDO($dsn, "root", "mP4oxnt11");
    $stmt = $pdo->prepare("select * from uzivatele where username=:login");
    $stmt->execute(["login" => $username]);
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if($user != null and password_verify($heslo_k_zahashovani, $user->heslo))
    {
        $neprihlasen = false;
        $_SESSION["user"] = $user;
        return true;
    }

    return false;
}

if(isset($_POST["submit-prihlaseni"]))
{
    $login_ok = false;
    $password_ok = false;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $heslo_k_zahashovani = $username.$password;
    if (strlen($username) > 4)
    {
        $login_ok = true;
    }
    if (strlen($password) > 4)
    {
        $password_ok = true;
    }
    if($login_ok == true and $password_ok == true and $_SESSION["odeslano_poprve_prihlaseni"])
    {
        $prihlaseni_v_pohode = prihlas($username, $heslo_k_zahashovani);

        if($prihlaseni_v_pohode)
        {
            $_SESSION["odeslano_poprve_prihlaseni"] = false;
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
    if (strlen($jmeno) < 1)
    {
        $jmeno = "nevyplneno";
    }
    if (strlen($jmeno) >= 1)
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
    if ($jmeno_ok and $prijmeni_ok and $telefon_ok and $email_ok and $heslo_ok and $username_ok and $_SESSION["odeslano_poprve_registrace"])
    {
        try
        {
            zaregistruj($jmeno, $prijmeni, $telefon, $email, $login, $heslo);
        }catch (Exception $exception)
        {
            die("neco se posralo");
        }

        $username_uz_existuje = false;

        $_SESSION["odeslano_poprve_registrace"] = false;

        $dsn = "mysql:host=localhost;dbname=apka_pro_jirku_db";
        $pdo = new PDO($dsn, "root", "mP4oxnt11");
        $stmt = $pdo->prepare("select * from uzivatele where username=:login");
        $stmt->execute(["login" => $login]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $_SESSION["user"] = $user;



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
    <title>Prihlaseni a registrace</title>
    <link rel="stylesheet" href="prihlasit_registrovat.css" />
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
        <div>
            <input class="prihlasit" type="button" value="prihlasit se">
            <input class="registrovat" type="button" value="registrovat se">
        </div>
        <form id="prihlasovaci-formular" method="post" action="prihlasit_registrovat.php">
            <label for="username" >Uzivatelske jmeno</label>
            <input required  pattern=".{4,}" type="text" id="username" name="username" value="<?php echo $username ?>">
            <span id="login-spatne-prihlaseni" class="spatne">Uživatelské jméno je příliš krátké</span>
            <?php if($login_ok == false)
            {
                echo "<span>Uživatelské jméno je příliš krátké</span>";
            } ?>
            <br>
            <label for="password" >Heslo</label>
            <input  required pattern=".{5,}" type="password" id="password" name="password">
            <span id="heslo-spatne-prihlaseni" class="spatne">Heslo je příliš krátké</span>
            <?php if($password_ok == false)
            {
                echo " <span>Heslo je příliš krátké</span>";
            } ?>
            <br>
            <input type="submit" name="submit-prihlaseni" value="prihlasit se" id="prihlas">
        </form>

        <form id="registracni-formular" method="post" action="prihlasit_registrovat.php">
            <label for="jmeno" >Jmeno (nepovine)</label>
            <input type="text" id="jmeno" name="jmeno"  value="<?php echo $jmeno ?>">
            <span id="jmeno-spatne" class="spatne">Jméno je příliš krátké</span>
            <br>
            <label for="prijmeni" >Prijmeni</label>
            <input  required pattern=".{2,}" type="text" id="prijmeni" name="prijmeni" value="<?php echo $prijmeni ?>">
            <span id="prijmeni-spatne" class="spatne">Příjmení je příliš krátké</span>
            <br>
            <label for="email" >E-mail</label>
            <input  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" id="email" name="email" value="<?php echo $email ?>">
            <span id="email-spatne" class="spatne">Zadaný e-mail je neplatný</span>
            <br>
            <label for="telefon-cislo" >Telefon</label>
            <input  required pattern="[0-9]+" type="text" id="telefon-cislo" name="telefon" value="<?php echo $telefon ?>">
            <span id="telefon-spatne" class="spatne">Telefon nemá správný formát (9 čísel)</span>
            <br>
            <label for="login" >Uzivatelske jmeno</label>
            <input  required pattern=".{4,}" type="text" id="login" name="login" value="<?php echo $login ?>">
            <span id="login-spatne" class="spatne">Uživatelské jméno je příliš krátké</span>
            <br>
            <label for="heslo" >Heslo</label>
            <input  required pattern=".{5,}" type="password" id="heslo" name="heslo">
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

    </main>
    <footer class="footer">
        <img id="pruhy" src="images/pruhy.png" alt="Pruhy">
    </footer>
</div>
<script src="prihlasit_registrovat.js"></script>
</body>
</html>