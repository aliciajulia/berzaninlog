<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "login");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
session_start();

//$_SESSION["inlog"] = 0;


if (isset($_POST['logout'])) {
    $_SESSION["inlog"] = 0;
}


if (isset($_POST["anvnam"])) {
    $anvnam = filter_input(INPUT_POST, 'anvnam', FILTER_SANITIZE_SPECIAL_CHARS);
    $losord = filter_input(INPUT_POST, 'losord', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM `inlog` WHERE anvnam='$anvnam' AND losord='$losord'";
//    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":anvnam", $anvnam);
    $stmt->bindParam(":losord", $losord);
    $stmt->execute();
    $login = $stmt->fetch();
}

//byt lösenord
if (isset($_POST["sparalos"])) {
    $nylos = filter_input(INPUT_POST, 'nylos', FILTER_SANITIZE_SPECIAL_CHARS);
    $anvnam = $_SESSION["namn"];
    $sql = "UPDATE `inlog` SET `losord`='$nylos' WHERE `anvnam`='$anvnam'";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":nylos", $nylos);
    $stmt->bindParam(":anvnam", $anvnam);
    $stmt->execute();
    $login = $stmt->fetch();
}
//välj IV
if (isset($_POST["redIV"])) {
//    include 'IV.php';
    echo "<form method='POST'>"
    . "<select name='iv'>";
// $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
    $sql = "SELECT * FROM iv";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $ivval = $stmt->fetchAll();

    foreach ($ivval as $iv) {
        echo "<option value=" . $iv["kurs"] . ">" . $iv["kurs"] . "</option>";
        echo "<br>";
//                    $stmt = $dbh->prepare($sql);
//                    $stmt->execute();
    }
    echo " </select>"
    . "<input type='submit' value='V�lj' name='ivv'>"
    . "<input type='hidden' value='ivval'>"
    . "</form>";

    if (isset($_POST["iv"])) {

        $iv = filter_input(INPUT_POST, 'iv', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "UPDATE `inlog` SET `iv`='$iv' WHERE anvnam='" . $_SESSION["namn"] . "'";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":iv", $iv);
        $stmt->execute();
        $login = $stmt->fetch();
        echo "Du har nu valt" . $iv . "som ditt iv val";
    }
}


//mailhantering
if (isset($_POST["mail"])) {
    $_SESSION["inlog"] = 1;
    echo "<form method='POST'>"
    . "<input type='text' name='mail'>"
    . "<input type='submit' value='Välj' name='valj'>"
    . "</form>";

    if (isset($_POST["valj"])) {
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "UPDATE `inlog` SET `mail`='$mail' WHERE anvnam='" . $_SESSION["namn"] . "'";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":mail", $mail);
        $stmt->execute();
        $login = $stmt->fetch();
    }
}
//l�gg till klass
if (isset($_POST["klass"])) {
    $_SESSION["inlog"] = 1;
    echo "<form method='POST'>"
    . "<input type='text' name='klass'>"
    . "<input type='submit' value='Välj' name='valjk'>"
    . "</form>";

    if (isset($_POST["valjk"])) {
        $klass = filter_input(INPUT_POST, 'klass', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "UPDATE `inlog` SET `klass`='$klass' WHERE anvnam='" . $_SESSION["namn"] . "'";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":klass", $klass);
        $stmt->execute();
        $login = $stmt->fetch();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Välkommen, logga in.</title>
    </head>
    <body>

        <?php
        if (!empty($login)) {
            $_SESSION["inlog"] = 1;
            $_SESSION["namn"] = $anvnam;
            echo '<p>Välkommen, du är nu inloggad!</p>';
        } else {
            echo 'Vänligen logga in med ett registrerat användarnamn';
        }

        if ($_SESSION["inlog"] == 1) {
            echo "<p>Du är nu inloggad som " . $_SESSION["namn"] . "!</p>";
            echo "<form method='POST'><input type = 'submit' value = 'Logga ut' name='logout'></form>";

            echo "<form method='POST'><input type='submit' value='Byt lösenord' name='bytlos'></form>";
            echo "<form method='POST'>"
            . "<input type = 'submit' value = 'Mejlhantering' name='mail'>"
            . "<input type = 'submit' value = 'Klasshantering' name='klass'>"
            . "</form>";
            if (isset($_POST["bytlos"])) {
                echo "Ange nytt lösenord <form method='POST'><input type='text' name='nylos'>"
                . "<input type='submit' value='Spara' name='sparalos'></form>";
            }
            echo "<form method='POST'><input type='submit' value='Välj IV' name='redIV'></form>";
        }
        if ($_SESSION["inlog"] == 0) {
            echo "<form method = 'POST'>
        <p>Användarnamn:</p> <input type = 'text' name = 'anvnam' required>
        <p>Lösenord:</p><input type = 'password' name = 'losord' required>
        <input type = 'submit' value = 'Logga in'>
        </form>";
            echo "<form method='POST'> <input type = 'submit' value = 'Gl�mt L�senord?' name='glomt'></form>";
        }
        ?>


    </body>
</html>