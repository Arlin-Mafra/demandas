<?php
include 'db.php';
include 'header.php';
?>

<h2 class="mb-4">Nova Demanda</h2>

<form action="salvar.php" method="POST" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Demanda:</label>
    <input type="text" name="demanda" class="form-control" required>
  </div>

  <div class="col-md-12">
    <label class="form-label">Descrição:</label>
    <textarea name="descricao" class="form-control" rows="3"></textarea>
  </div>

  <div class="col-md-6">
    <label class="form-label">Responsável:</label>
    <input type="text" name="responsavel" class="form-control">
  </div>

  <div class="col-md-6">
    <label class="form-label">Status:</label>
    <select name="status" class="form-select">
      <option>Não iniciado</option>
      <option>Em andamento</option>
      <option>Programado</option>
      <option>Pendente</option>
      <option>Concluído</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label">Prioridade:</label>
    <select name="prioridade" class="form-select">
      <option>Alta</option>
      <option>Média</option>
      <option>Baixa</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label">Previsão:</label>
    <input type="text" name="previsao" class="form-control" placeholder="Ex: Agosto">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="../index.php" class="btn btn-secondary">← Ver demandas</a>
  </div>
</form>

<?php include 'footer.php'; ?>
