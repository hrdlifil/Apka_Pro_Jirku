<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 31. 12. 2018
 * Time: 0:18
 */

$max = $_REQUEST["max"];

$dsn = "mysql:host=localhost;dbname=apka_pro_jirku_db";
$pdo = new PDO($dsn, "root", "mP4oxnt11");
$stmt = $pdo->prepare("select * from uzivatele where id <=:id");
$stmt->execute(["id" => $max]);
$user = $stmt->fetchAll();

foreach ($user as $kokot)
{

    $pole_jmen[] = htmlentities($kokot[1]);
}

$json = json_encode($pole_jmen);

echo $json;