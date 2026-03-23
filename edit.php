<?php
require __DIR__ . "/connect.php";

// Valida o ID
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id) {
    die("ID inválido.");
}

// Usa sua classe Connect (mantido igual)
$pdo = Connect::getInstance();

// Busca o usuário
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
$stmt->execute([":id" => $id]);

$user = $stmt->fetch();

if (!$user) {
    die("Aluno não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar aluno</title>

    <!-- NOVO: CSS -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <!-- TOPO -->
    <div class="topbar">
        <div>
            <h1>Editar aluno</h1>
            <p>Atualize as informações do cadastro</p>
        </div>

        <div class="nav-actions">
            <a href="list.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <!-- CARD -->
    <div class="card">
        <h2 class="form-title">Formulário de edição</h2>

        <form action="update.php" method="post">

            <!-- ID oculto (NÃO MEXER) -->
            <input type="hidden" name="id" value="<?= $user["id"] ?>">

            <!-- NOME -->
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" value="<?= htmlspecialchars($user["name"]) ?>" required>
            </div>

            <!-- EMAIL -->
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="email" value="<?= htmlspecialchars($user["email"]) ?>" required>
            </div>

            <!-- DOCUMENTO -->
            <div class="form-group">
                <label>Curso</label>
                <input type="text" name="document" value="<?= htmlspecialchars($user["document"]) ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
    </div>

</div>

</body>
</html>