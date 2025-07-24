<?php
require 'db.php';

// Define o nome do arquivo
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=demandas_" . date("Y-m-d") . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

// Seleciona os dados
$stmt = $db->query("SELECT * FROM demandas ORDER BY prioridade DESC, status");

// Início da tabela
echo "<table border='1'>";
echo "<tr>
        <th>Demanda</th>
        <th>Descrição</th>
        <th>Responsável</th>
        <th>Status</th>
        <th>Prioridade</th>
        <th>Previsão</th>
      </tr>";

// Preenche as linhas com os dados
foreach ($stmt as $row) {
    echo "<tr>
            <td>{$row['demanda']}</td>
            <td>{$row['descricao']}</td>
            <td>{$row['responsavel']}</td>
            <td>{$row['status']}</td>
            <td>{$row['prioridade']}</td>
            <td>{$row['previsao']}</td>
          </tr>";
}

echo "</table>";
exit;
