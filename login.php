<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<form method = 'POST'>
        <p>Användarnamn:</p> <input type = 'text' name = 'anvnam' required>
        <p>Lösenord:</p><input type = 'password' name = 'losord' required><br>
        <input type='checkbox' name='checkbox'> Håll mig inloggad<br>
        <input type = 'submit' value = 'Logga in'>
        </form>";
            echo "<form method='POST'> <input type = 'submit' value = 'Glömt Lösenord?' name='glomt'></form>";
        
        ?>
    </body>
</html>
