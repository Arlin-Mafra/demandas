<?php
include 'db.php';
$stmt = $db->prepare("UPDATE demandas SET demanda=?, descricao=?, responsavel=?, status=?, prioridade=?, previsao=? WHERE id=?");
$stmt->execute([
  $_POST['demanda'],
  $_POST['descricao'],
  $_POST['responsavel'],
  $_POST['status'],
  $_POST['prioridade'],
  $_POST['previsao'],
  $_POST['id']
]);
header("Location: ../index.php");
exit;
