<?php
require __DIR__ . "/connect.php";

/*
|--------------------------------------------------------------------------
| Obtém a conexão PDO pela classe Connect
|--------------------------------------------------------------------------
*/
$pdo = Connect::getInstance();

/*
|--------------------------------------------------------------------------
| Busca os usuários cadastrados
|--------------------------------------------------------------------------
*/
$stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Inscritos</title>

  <!-- CSS principal -->
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="container">

    <!-- TOPO DA PÁGINA -->
    <div class="topbar">
      <div>
        <h1>Usuários Cadastrados</h1>
        <p>Veja abaixo todos os registros enviados pelo formulário.</p>
      </div>

      <div class="nav-actions">
        <!-- Voltar para a tela de cadastro -->
        <a href="index.php" class="btn btn-secondary">Voltar ao Cadastro</a>
      </div>
    </div>

    <!-- CARD DA TABELA -->
    <div class="card">
      <h2 class="form-title">Lista de Inscritos</h2>

      <div class="table-wrapper">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Documento</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>

            <?php if (count($users) > 0): ?>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td><?php echo $user["id"]; ?></td>
                  <td><?php echo htmlspecialchars($user["name"]); ?></td>
                  <td><?php echo htmlspecialchars($user["email"]); ?></td>
                  <td><?php echo htmlspecialchars($user["document"]); ?></td>
                  <td><?php echo $user["created_at"]; ?></td>
                  <td>
                    <div class="actions">
                      <!-- Editar -->
                      <a href="edit.php?id=<?php echo $user["id"]; ?>" class="btn btn-warning">Editar</a>

                      <!-- Excluir -->
                      <a href="delete.php?id=<?php echo $user["id"]; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6">
                  <div class="empty-state">
                    Nenhum usuário cadastrado até o momento.
                  </div>
                </td>
              </tr>
            <?php endif; ?>

          </tbody>
        </table>
      </div>
    </div>

    <p class="footer-note">Área separada apenas para visualização dos cadastrados</p>
  </div>

</body>
</html>