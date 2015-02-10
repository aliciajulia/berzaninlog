<?php

$_SESSION["anvnamn"] = NULL;
setcookie("always_online", "", time() - 3600);
setcookie("anvnamn", "", time() - 3600);

header ('Location: index.php');


