<?php
if (isset($_POST["glomt"])) {
    echo "Ditt lösernord kommer skickas på mail. <br>Ange din mail som du har kopplat till ditt inlog <form method='POST'><input type='text' name='glomtmail'>"
    . "<input type='submit' value='Skicka' name='skicka'></form>";
    if (isset($_POST["skicka"])) {
        $glomtmail = filter_input(INPUT_POST, 'glomtmail', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "SELECT `losord` FROM `inlog` WHERE `mail`='$glomtmail'";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":glomtmail", $glomtmail);
        $stmt->execute();
        $glomt = $stmt->fetch();

        //skicka mailet, gör det sist!!!
    }
}
