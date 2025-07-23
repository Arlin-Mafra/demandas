<?php include 'php/db.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<head>
  <meta charset="UTF-8">
  <title>Demandas FLUIG</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container">
    <h1>📋 Demandas FLUIG</h1>
    <a href="php/cadastrar.php" class="btn">+ Nova Demanda</a>
    
    <table>
      <thead>
        <tr>
          <th>Demanda</th>
          <th>Descrição</th>
          <th>Responsável</th>
          <th>Status</th>
          <th>Prioridade</th>
          <th>Previsão</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $stmt = $db->query("SELECT * FROM demandas ORDER BY prioridade DESC, status");
        foreach ($stmt as $row) {
          echo "<tr>
            <td>{$row['demanda']}</td>
            <td>{$row['descricao']}</td>
            <td>{$row['responsavel']}</td>
            <td>" . htmlspecialchars($row['status']) . "</td>
            <td>{$row['prioridade']}</td>
            <td>{$row['previsao']}</td>
            <td>
              <a href='php/editar.php?id={$row['id']}' class='btn-sm'>✏️</a>
              <a href='php/deletar.php?id={$row['id']}' class='btn-sm red' onclick='return confirm(\"Deseja excluir esta demanda?\")'>🗑️</a>
            </td>
          </tr>";
        }
      ?>
      </tbody>
    </table>
  </div>
</body>
</html>
