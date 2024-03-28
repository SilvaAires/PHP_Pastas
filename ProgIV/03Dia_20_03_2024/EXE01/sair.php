<?php
session_start();

unset($_SESSION["usuario_sessao"]);

header("Location: login.php");
exit();
?>