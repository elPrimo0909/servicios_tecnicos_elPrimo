<?php 
require('conex.php');
$con = Conectar();
$SQL = 'SELECT id, descripcion, precio_compra FROM lista7';
$stmt = $con->prepare($SQL);
$result = $stmt->execute();
$rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
echo(json_encode($rows));
?>