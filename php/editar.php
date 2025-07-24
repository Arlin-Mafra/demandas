<?php
include 'db.php';
include 'header.php';

$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM demandas WHERE id = ?");
$stmt->execute([$id]);
$d = $stmt->fetch();
?>

<h2 class="mb-4">Editar Demanda</h2>

<form action="atualizar.php" method="POST" class="row g-3">
  <input type="hidden" name="id" value="<?= $d['id'] ?>">

  <div class="col-md-6">
    <label class="form-label">Demanda:</label>
    <input type="text" name="demanda" class="form-control" value="<?= $d['demanda'] ?>" required>
  </div>

  <div class="col-md-12">
    <label class="form-label">Descrição:</label>
    <textarea name="descricao" class="form-control" rows="3"><?= $d['descricao'] ?></textarea>
  </div>

  <div class="col-md-6">
    <label class="form-label">Responsável:</label>
    <input type="text" name="responsavel" class="form-control" value="<?= $d['responsavel'] ?>">
  </div>

  <div class="col-md-6">
    <label class="form-label">Status:</label>
    <select name="status" class="form-select">
      <?php
      $statuses = ['Não iniciado','Em andamento','Programado','Pendente','Concluído'];
      foreach ($statuses as $s) {
        $selected = $s == $d['status'] ? "selected" : "";
        echo "<option $selected>$s</option>";
      }
      ?>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label">Prioridade:</label>
    <select name="prioridade" class="form-select">
      <?php
      $prioridades = ['Alta','Média','Baixa'];
      foreach ($prioridades as $p) {
        $selected = $p == $d['prioridade'] ? "selected" : "";
        echo "<option $selected>$p</option>";
      }
      ?>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label">Previsão:</label>
    <input type="text" name="previsao" class="form-control" value="<?= $d['previsao'] ?>">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="../index.php" class="btn btn-secondary">← Ver demandas</a>
  </div>
</form>

<?php include 'footer.php'; ?>
