<?php
session_start();

/*
|--------------------------------------------------------------------------
| Captura os dados do formulário
|--------------------------------------------------------------------------
*/
$username = trim($_POST["username"] ?? "");
$password = trim($_POST["password"] ?? "");

/*
|--------------------------------------------------------------------------
| Credenciais fixas do admin
|--------------------------------------------------------------------------
| strtolower() deixa tudo minúsculo, então:
| ADMIN, admin, Admin, aDmIn... tudo será aceito.
*/
$admin_user = "admin";
$admin_password = "admin123";

/*
|--------------------------------------------------------------------------
| Validação do login
|--------------------------------------------------------------------------
*/
if (strtolower($username) === $admin_user && $password === $admin_password) {
    $_SESSION["admin_logado"] = true;
    $_SESSION["admin_user"] = "ADMIN";
    $_SESSION["login_sucesso"] = "Login realizado com sucesso! Redirecionando...";
    header("Location: list.php");
    exit;
}

/*
|--------------------------------------------------------------------------
| Se falhar, volta para a tela de login com erro
|--------------------------------------------------------------------------
*/
$_SESSION["erro_login"] = "Usuário ou senha inválidos.";
header("Location: login_admin.php");
exit;