<?php
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
//    var_dump($login);
    if (!empty($login)) {

        $_SESSION["inlog"] = 1;
        $_SESSION["namn"] = $login["anvnam"];
        $_SESSION["id"] = $login["id"];
//        var_dump($_SESSION);
    }
}
?>
