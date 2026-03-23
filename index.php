<?php

/**
 * Inclui o arquivo de conexão com o banco de dados.
 *
 * __DIR__ retorna o diretório atual do arquivo,
 * o que evita problemas de caminho relativo.
 */
require __DIR__ . "/connect.php";

/**
 * Obtém a instância da conexão com o banco.
 * Esse método foi definido na classe Connect.
 */
$pdo = Connect::getInstance();

/**
 * Executa uma consulta SQL para buscar todos os usuários
 * da tabela "users", ordenando pelo campo "id" em ordem crescente.
 *
 * query() é usado quando não há parâmetros dinâmicos.
 */
$stmt = $pdo->query("SELECT * FROM users ORDER BY id ASC");

/**
 * fetchAll() busca todos os registros retornados pela consulta
 * e os armazena em um array.
 */
$users = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Usuários</title>

  <!-- CSS principal do projeto -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="container">

    <!-- TOPO DA PÁGINA -->
    <div class="topbar">
      <div>
        <h1>Formulário para missões de voluntariado</h1>
        <p>Preencha o formulário abaixo para registrar seu interesse em fazer missões voluntárias.</p>
      </div>

      <div class="nav-actions">
        <!-- Botão para ir para a nova página da tabela -->
        <a href="login_admin.php" class="btn btn-secondary">Ver Inscritos</a>
      </div>
    </div>

    <!-- CARD DO FORMULÁRIO -->
    <div class="card">
      <h2 class="form-title">Preencha os campos abaixo:</h2>

      <!--
        IMPORTANTE:
        Mantivemos o action para store.php
        e o método POST da estrutura base
      -->
      <form action="store.php" method="POST">

        <!-- CAMPO NOME -->
        <div class="form-group">
          <label for="name">Nome completo</label>
          <input 
            type="text" 
            id="name" 
            name="name" 
            placeholder="Digite o seu nome completo"
            required
          >
        </div>

        <!-- CAMPO E-MAIL -->
        <div class="form-group">
          <label for="email">E-mail</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            placeholder="Digite o seu e-mail"
            required
          >
        </div>

        <!-- CAMPO DOCUMENTO -->
        <div class="form-group">
          <label for="document">Curso e Período</label>
          <input 
            type="text" 
            id="document" 
            name="document" 
            placeholder="Digite o seu curso e período"
            required
          >
        </div>

        <!-- BOTÃO DE CADASTRO -->
        <button type="submit" class="btn btn-primary">Cadastrar Usuário</button>

        <p class="helper-text">
          Assim que enviar aguarde que iremos contata-lo.
        </p>
      </form>
    </div>

    <p class="footer-note">Cadastro para saber quantos interessados em fazer missões voluntárias</p>
  </div>

</body>
</html>