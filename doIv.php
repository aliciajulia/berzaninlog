<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "berzanapp");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
session_start();


// if (isset($_POST["iv"])) {

        $iv = filter_input(INPUT_POST, 'iv', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "UPDATE `users` SET `iv`='$iv' WHERE anvnamn='" . $_SESSION["anvnamn"] . "'";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":iv", $iv);
        $stmt->execute();
        $login = $stmt->fetch();
//        echo "Du har nu valt" . $iv . "som ditt iv val";
//    }

header ('Location: index.php');