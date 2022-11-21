<?php

include("config.php");

$login_cookie =$_COOKIE['idCliente'];
if(isset($login_cookie)){

    header("location: cliente.php");
}

?>
