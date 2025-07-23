<?php
include 'db.php';
$id = $_GET['id'];
$db->prepare("DELETE FROM demandas WHERE id = ?")->execute([$id]);
header("Location: ../index.php");
exit;
