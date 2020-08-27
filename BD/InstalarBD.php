<?php

require_once "ConexaoBDPDO.php";

$conn = new ConexaoBDPDO();
$conn->criarConexao();
$sql = file_get_contents("sql.sql");
$conn->getConexao()->exec($sql);

echo "<b>Banco de dados criado com sucesso!</b>";

$conn -> fecharConexao();
?>