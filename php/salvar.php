<?php
include 'db.php';

$stmt = $db->prepare("INSERT INTO demandas (demanda, descricao, responsavel, status, prioridade, previsao) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([
    $_POST['demanda'],
    $_POST['descricao'],
    $_POST['responsavel'],
    $_POST['status'],
    $_POST['prioridade'],
    $_POST['previsao']
]);

header("Location: ../index.php");
exit;
?>