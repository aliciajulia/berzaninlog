<?php 
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "inlog");
//$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
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
            <select name="id">
                <?php
                $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $sql = "SELECT * FROM iv";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $leksak = $stmt->fetchAll();
                foreach ($leksak as $namn) {
                    echo "<option value=" . $namn["id"] . ">" . $namn["kurs"] . "</option>";
                    echo "<br>";
                }
                ?>
            </select>
            <input class="knapp" type="submit" value="Välj" name="iv">
            <input type="hidden" value="ivval">
        </form>
    </body>
</html>
