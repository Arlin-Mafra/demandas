<?php 
include 'php/db.php'; 
include 'php/header.php'; 

// Ativar exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Coleta os filtros
$f_responsavel = $_GET['responsavel'] ?? '';
$f_status = $_GET['status'] ?? '';
$f_prioridade = $_GET['prioridade'] ?? '';

// Monta a SQL com filtros
$sql = "SELECT * FROM demandas WHERE 1=1";
$params = [];

if ($f_responsavel) {
  $sql .= " AND responsavel LIKE ?";
  $params[] = "%$f_responsavel%";
}
if ($f_status) {
  $sql .= " AND status = ?";
  $params[] = $f_status;
}
if ($f_prioridade) {
  $sql .= " AND prioridade = ?";
  $params[] = $f_prioridade;
}

$sql .= " ORDER BY prioridade DESC, status";
$stmt = $db->prepare($sql);
$stmt->execute($params);
?>

<h1 class="mb-4">📋 Demandas FLUIG</h1>

<a href="php/exportar_planilha.php" class="btn btn-outline-primary mb-3" target="_blank">📄 Exportar para Excel</a>
<a href="php/cadastrar.php" class="btn btn-primary mb-3">+ Nova Demanda</a>

<!-- Filtros -->
<form method="GET" class="row g-2 mb-4">
  <div class="col-md-3">
    <input type="text" name="responsavel" class="form-control" placeholder="Responsável" value="<?= htmlspecialchars($f_responsavel) ?>">
  </div>
  <div class="col-md-3">
    <select name="status" class="form-select">
      <option value="">Todos os Status</option>
      <?php
      $statuses = ['Não iniciado', 'Em andamento', 'Programado', 'Pendente', 'Concluído'];
      foreach ($statuses as $s) {
        $selected = ($s == $f_status) ? 'selected' : '';
        echo "<option value=\"$s\" $selected>$s</option>";
      }
      ?>
    </select>
  </div>
  <div class="col-md-3">
    <select name="prioridade" class="form-select">
      <option value="">Todas as Prioridades</option>
      <?php
      $prioridades = ['Alta', 'Média', 'Baixa'];
      foreach ($prioridades as $p) {
        $selected = ($p == $f_prioridade) ? 'selected' : '';
        echo "<option value=\"$p\" $selected>$p</option>";
      }
      ?>
    </select>
  </div>
  <div class="col-md-3">
    <button type="submit" class="btn btn-secondary w-100">🔍 Filtrar</button>
  </div>
</form>

<!-- Tabela -->
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
      <?php foreach ($stmt as $row): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['demanda'] ?></td>
          <td><?= $row['descricao'] ?></td>
          <td><?= $row['responsavel'] ?></td>
          <td><?= htmlspecialchars($row['status']) ?></td>
          <td><?= $row['prioridade'] ?></td>
          <td><?= $row['previsao'] ?></td>
          <td>
            <a href="php/editar.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">✏️</a>
            <a href="php/deletar.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir esta demanda?')">🗑️</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include 'php/footer.php'; ?>
