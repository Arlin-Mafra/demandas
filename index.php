<?php include 'php/db.php'; 
include 'php/header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

    <h1 class="mb-4">📋 Demandas FLUIG</h1>
    <a href="php/exportar_planilha.php" class="btn btn-outline-primary mb-3" target="_blank">📄 Exportar para Excel</a>


    <a href="php/cadastrar.php" class="btn btn-primary mb-3">+ Nova Demanda</a>

    <div class="table-responsive">
      <table class="table table-bordered table-hover table-sm align-middle">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Demanda</th>
            <th>Descrição</th>
            <th>Responsável</th>
            <th>Status</th>
            <th>Prioridade</th>
            <th>Previsão</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $stmt = $db->query("SELECT * FROM demandas ORDER BY prioridade DESC, status");
          foreach ($stmt as $row) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['demanda']}</td>
              <td>{$row['descricao']}</td>
              <td>{$row['responsavel']}</td>
              <td>" . htmlspecialchars($row['status']) . "</td>
              <td>{$row['prioridade']}</td>
              <td>{$row['previsao']}</td>
              <td>
                <a href='php/editar.php?id={$row['id']}' class='btn btn-sm btn-warning'>✏️</a>
                <a href='php/deletar.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Deseja excluir esta demanda?\")'>🗑️</a>
              </td>
            </tr>";
          }
        ?>
        </tbody>
      </table>
    </div>
<?php include 'php/footer.php'; ?>
