<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "berzanapp");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
session_start();

//if (isset($_POST["anvnamn"])) {
    $anvnamn = filter_input(INPUT_POST, 'anvnamn', FILTER_SANITIZE_SPECIAL_CHARS);
    $losord = filter_input(INPUT_POST, 'losord', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM `users` WHERE anvnamn='$anvnamn' AND losenord='$losord'";
//    echo $sql;
    $stmt = $dbh->prepare($sql);
//    $stmt->bindParam(":anvnamn", $anvnamn);
//    $stmt->bindParam(":losord", $losord);
    $stmt->execute();
    $login = $stmt->fetch();
//    var_dump($login);
    if (!empty($login)) {

//        $_SESSION["inlog"] = 1;
        $_SESSION["anvnamn"] = $login["anvnamn"];
//        $_SESSION["id"] = $login["id"];
//        var_dump($_SESSION);
    }
//}
header('Location: index.php');