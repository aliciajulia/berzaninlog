<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "berzanapp");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
session_start();
//if (isset($_POST["mail"])) {
//    $_SESSION["anvnamn"] != NULL;
    
//    echo "<form method='POST'>"
//    . "<input type='text' name='mail'>"
//    . "<input type='submit' value='Välj' name='valj'>"
//    . "</form>";

    
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "UPDATE `users` SET `mail`='$mail' WHERE anvnamn='" . $_SESSION["anvnamn"] . "'";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":mail", $mail);
        $stmt->execute();
        $login = $stmt->fetchAll();
    

header ('Location: index.php');


