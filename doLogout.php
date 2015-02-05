<?php
if (isset($_POST['logout'])) {
    $_SESSION["inlog"] = 0;
    setcookie("always_online", "", time() - 3600);
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

