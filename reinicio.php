<?php
$servername = 'srv366.hstgr.io';
$username = 'u690371019_gp';
$password = "@m?02Db3";
$dbname = "u690371019_gp";

date_default_timezone_set('America/Mexico_City');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$dia = date('j');
$dia_full = date("Y-m-d");
$hora = date('H:i:s');
$hora_number = date('H');
echo $dia_full." ".$hora;
$dia_completo = $dia_full." ".$hora;

if ($dia==4 AND $hora_number==00) {
    $sql_calculos = "UPDATE pagos_rapidos SET estatus=0";
    $result_calculos = $conn->query($sql_calculos);

    $sql_calculos2 = "INSERT INTO reg_reinicio(fecha_hora) VALUES('$dia_completo')";
    $result_calculos2 = $conn->query($sql_calculos2);
}

// $sql_pd1 = "
// SELECT pd.idpg_detped as id1,
// (SELECT estatus FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido) as estatus_de_pedido,
// (SELECT no_control FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido) as no_control
// FROM pg_detped pd 
// WHERE (pd.estatus='Produccion' AND 
// 			(SELECT estatus FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido)<>'ENTREGADO' AND 
// 			(SELECT estatus FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido)<>'CANCELADO') OR 
// 			(pd.estatus='Fabricado' AND 
// 			(SELECT estatus FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido)<>'ENTREGADO' AND 
// 			(SELECT estatus FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido)<>'CANCELADO') 
// ORDER BY (SELECT fecha_pedido FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido) ASC LIMIT 1
// ";
// $result_pd1 = mysqli_query($conn, $sql_pd1);
// $row = mysqli_fetch_assoc($result_pd1);
// $id1 = $row['id1'];


// $sql_pd2 = "
// SELECT pd.idpg_detped as id2,
// (SELECT estatus FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido) as estatus_de_pedido,
// (SELECT no_control FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido) as no_control
// FROM pg_detped pd 
// WHERE (pd.estatus='Produccion' AND 
// 			(SELECT estatus FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido)<>'ENTREGADO' AND 
// 			(SELECT estatus FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido)<>'CANCELADO') OR 
// 			(pd.estatus='Fabricado' AND 
// 			(SELECT estatus FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido)<>'ENTREGADO' AND 
// 			(SELECT estatus FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido)<>'CANCELADO') 
// ORDER BY (SELECT fecha_pedido FROM pg_pedidos WHERE idpg_pedidos=pd.idpedido) DESC LIMIT 1
// ";
// $result_pd2 = mysqli_query($conn, $sql_pd2);
// $row = mysqli_fetch_assoc($result_pd2);
// $id2 = $row['id2'];


// //$id_ini_base = $row['id_ini'];
// echo $id1."<br>";
// echo $id2."<br>";
// $conteo_produccion=0;
// $conteo_fabricado=0;

// $sql_calculos = "INSERT INTO calculos (tipo,fecha) VALUES ('Calculo de fabricados',NOW())";
// $result_calculos = $conn->query($sql_calculos);
	

// echo $conteo_produccion.' producción';
// echo $conteo_fabricado.' fabricados';

$conn->close();
?>