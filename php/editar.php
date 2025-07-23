<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM demandas WHERE id = ?");
$stmt->execute([$id]);
$d = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Editar Demanda</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Editar Demanda</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?= $d['id'] ?>">
            <label>Demanda:</label><br>
            <input type="text" name="demanda" value="<?= $d['demanda'] ?>" required><br><br>

            <label>Descrição:</label><br>
            <textarea name="descricao"><?= $d['descricao'] ?></textarea><br><br>

            <label>Responsável:</label><br>
            <input type="text" name="responsavel" value="<?= $d['responsavel'] ?>"><br><br>

            <label>Status:</label><br>
            <select name="status">
            <?php
            $statuses = ['Não iniciado','Em andamento','Programado','Pendente','Concluído'];
            foreach ($statuses as $s) {
                $selected = $s == $d['status'] ? "selected" : "";
                echo "<option $selected>$s</option>";
            }
            ?>
            </select><br><br>

            <label>Prioridade:</label><br>
            <select name="prioridade">
            <?php
            $prioridades = ['Alta','Média','Baixa'];
            foreach ($prioridades as $p) {
                $selected = $p == $d['prioridade'] ? "selected" : "";
                echo "<option $selected>$p</option>";
            }
            ?>
            </select><br><br>

            <label>Previsão:</label><br>
            <input type="text" name="previsao" value="<?= $d['previsao'] ?>"><br><br>

            <button type="submit">Atualizar</button>
        </form>
        
        <p class="backLink"><a href="../index.php">← Ver demandas</a></p>
    </div>
</body>
</html>
