<?php
session_start();

unset($_SESSION["usuario_sessao"]);

header("Location: index.php");
exit();
?>