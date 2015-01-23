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


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Välj IV</title>
    </head>
    <body>
        <!--Välj iv val-->
        <form method="POST">
            <select name="iv">
                <?php
                $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
                $sql = "SELECT * FROM iv";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $ivval = $stmt->fetchAll();

                foreach ($ivval as $iv) {
                    echo "<option value=" . $iv["id"] . ">" . $iv["kurs"] . "</option>";
                    echo "<br>";
//                    $stmt = $dbh->prepare($sql);
//                    $stmt->execute();
                }
//                if (isset($_POST["iv"])) {
//
// }
//
//                $sql = "UPDATE `inlog` SET `IV`=" . $_POST["iv"] . " WHERE ID=" . $iv["id"] . " ";
//                echo 'du har nu valt ' . $_POST["iv"] . ' som ditt IV-val.';
//               
                ?>
            </select>
            <input type='submit' value='Välj' name='iv'>
            <input type='hidden' value='ivval'>
        </form>
    </body>
</html>
