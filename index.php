<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "login");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
session_start();

$_SESSION["inlog"] = 0;


if (isset($_POST['logout'])) {
    $_SESSION["inlog"] = 0;
}


if (isset($_POST["anvnam"])) {
    $anvnam = filter_input(INPUT_POST, 'anvnam', FILTER_SANITIZE_SPECIAL_CHARS);
    $losord = filter_input(INPUT_POST, 'losord', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM `login` WHERE anvnam='$anvnam' AND losord='$losord'";
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
    $sql = "UPDATE `login` SET `losord`='$nylos' WHERE `anvnam`='$anvnam'";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":nylos", $nylos);
    $stmt->bindParam(":anvnam", $anvnam);
    $stmt->execute();
    $login = $stmt->fetch();
}
//välj IV
if (isset($_POST["redIV"])) {
    include 'IV.php';
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
            if (isset($_POST["bytlos"])) {
                echo "Ange nytt lösenord <form method='POST'><input type='text' name='nylos'>"
                . "<input type='submit' value='Spara' name='sparalos'></form>";
            }
            echo "<form method='POST'><input type='submit' value='Välj IV' name='redIV'></form>";
        }
        if ($_SESSION["inlog"] == 0) {
            echo "<form method = 'POST'>
        <p>Användarnamn:</p> <input type = 'text' name = 'anvnam' required>
        <p>Lösenord:</p><input type = 'text' name = 'losord' required>
        <input type = 'submit' value = 'Logga in'>
        </form>";
        }
        ?>
    </body>
</html>