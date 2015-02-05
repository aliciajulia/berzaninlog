<?php
  if (isset($_POST["valj"])) {
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = "UPDATE `inlog` SET `mail`='$mail' WHERE anvnam='" . $_SESSION["namn"] . "'";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":mail", $mail);
        $stmt->execute();
        $login = $stmt->fetch();
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

