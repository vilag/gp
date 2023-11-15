<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Index
{
	public function __construct()
	{

	}

	public function listar_categorias($fecha)
	{

		$sql="SELECT a.nombre,a.idcategoria,

		(SELECT sum(monto)  FROM movimiento WHERE idcategoria = a.idcategoria AND MONTH(fecha_hora) = MONTH('$fecha') AND YEAR(fecha_hora) = YEAR('$fecha')) as suma
		
		FROM categorias a ORDER BY nombre ASC";
		//return ejecutarConsultaSimpleFila($sql);
		return ejecutarConsulta($sql);			
	}

    public function guardar($categoria,$concepto,$monto,$fecha_hora)
	{

		$sql="INSERT INTO movimiento (idcategoria,movimiento,monto,fecha_hora) VALUES ('$categoria', '$concepto', '$monto', '$fecha_hora')";
		//return ejecutarConsultaSimpleFila($sql);
		return ejecutarConsulta($sql);			
	}

    public function listar_movimientos($fecha)
	{

		$sql="SELECT a.idmovimiento, b.nombre as categoria, a.movimiento, a.monto, a.fecha_hora FROM movimiento a INNER JOIN categorias b ON b.idcategoria = a.idcategoria where MONTH(fecha_hora) = MONTH('$fecha') AND YEAR(fecha_hora) = YEAR('$fecha')  ORDER BY a.fecha_hora DESC";
		//return ejecutarConsultaSimpleFila($sql);
		return ejecutarConsulta($sql);			
	}

	public function listar_movimientos_cat($idcategoria,$fecha)
	{

		$sql="SELECT a.idmovimiento, b.nombre as categoria, a.movimiento, a.monto, a.fecha_hora FROM movimiento a INNER JOIN categorias b ON b.idcategoria = a.idcategoria WHERE a.idcategoria='$idcategoria' AND MONTH(fecha_hora) = MONTH('$fecha') AND YEAR(fecha_hora) = YEAR('$fecha') ORDER BY a.fecha_hora DESC";
		//return ejecutarConsultaSimpleFila($sql);
		return ejecutarConsulta($sql);			
	}

    public function suma_gastos($fecha)
	{

		$sql="SELECT sum(monto) as total FROM movimiento WHERE MONTH(fecha_hora) = MONTH('$fecha') AND YEAR(fecha_hora) = YEAR('$fecha')";
		return ejecutarConsultaSimpleFila($sql);
		//return ejecutarConsulta($sql);			
	}

	public function listar_pagos_rapidos()
	{

		$sql="SELECT * FROM pagos_rapidos ORDER BY nombre DESC";
		//return ejecutarConsultaSimpleFila($sql);
		return ejecutarConsulta($sql);			
	}

}
?>

