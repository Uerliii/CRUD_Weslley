<?php
session_start();

// Se já estiver logado, manda direto para a lista
if (isset($_SESSION["admin_logado"]) && $_SESSION["admin_logado"] === true) {
    header("Location: list.php");
    exit;
}

// Mensagem de erro, se existir
$erro = $_SESSION["erro_login"] ?? null;
unset($_SESSION["erro_login"]);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="topbar">
        <div>
            <h1>Área Administrativa</h1>
            <p>Faça login para visualizar os usuários cadastrados.</p>
        </div>

        <div class="nav-actions">
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <div class="card">
        <h2 class="form-title">Login do Administrador</h2>

        <?php if ($erro): ?>
            <p style="color: #dc2626; margin-bottom: 15px; font-weight: bold;">
                <?= htmlspecialchars($erro) ?>
            </p>
        <?php endif; ?>

        <form action="admin_auth.php" method="POST">
            <div class="form-group">
                <label for="username">Usuário</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Digite o usuário"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Digite a senha"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</div>

</body>
</html>