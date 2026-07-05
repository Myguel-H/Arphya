<?php
session_start();

session_unset(); // remove todas as variaveis

session_destroy(); // destroi a sessão no servidor

header("Location: /");
exit();
?>aeeamp