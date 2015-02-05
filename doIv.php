<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "login");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
$_SESSION["inlog"] = 1;


if (!isset($_POST["action"])) {
    
} else {
    $iv = filter_input(INPUT_POST, 'iv', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "UPDATE `inlog` SET `iv`='$iv' WHERE anvnam='" . $_SESSION["namn"] . "'";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":iv", $iv);
    $stmt->execute();
    $login = $stmt->fetch();
    echo "Du har nu valt" . $iv . "som ditt iv val";
}
?>
