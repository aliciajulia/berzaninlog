


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
                }
                ?>
            </select>
            <input type='submit' value='Välj' name='iv'>
            <input type='hidden' value='ivval'>
        </form>
    </body>
</html>
