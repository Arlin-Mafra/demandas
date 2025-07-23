<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Cadastrar Demanda</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
      <h2>Nova Demanda</h2>
      <form action="salvar.php" method="POST">
        <label>Demanda:</label><br>
        <input type="text" name="demanda" required><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <label>Responsável:</label><br>
        <input type="text" name="responsavel"><br><br>

        <label>Status:</label><br>
        <select name="status">
          <option>Não iniciado</option>
          <option>Em andamento</option>
          <option>Programado</option>
          <option>Pendente</option>
          <option>Concluído</option>
        </select><br><br>

        <label>Prioridade:</label><br>
        <select name="prioridade">
          <option>Alta</option>
          <option>Média</option>
          <option>Baixa</option>
        </select><br><br>

        <label>Previsão:</label><br>
        <input type="text" name="previsao" placeholder="Ex: Agosto"><br><br>

        <button type="submit">Salvar</button>
      </form>

      <p class="backLink"><a href="../index.php">← Ver demandas</a></p>
    </div>
</body>
</html>
