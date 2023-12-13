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

    public function guardar($idcategoria,$concepto,$monto,$fecha_hora,$idpago_rapido,$monto_capt)
	{
		if ($idpago_rapido>0 AND $monto_capt>=$monto) {
			$sql_1="UPDATE pagos_rapidos SET estatus = 1 WHERE idpago='$idpago_rapido'";
			ejecutarConsulta($sql_1);

			$sql_2="UPDATE pagos_rapidos SET estatus = 1 WHERE idpago_rel='$idpago_rapido'";
			ejecutarConsulta($sql_2);
			//return ejecutarConsultaSimpleFila($sql);
		}

		$sql="INSERT INTO movimiento (idcategoria,movimiento,monto,fecha_hora,idpago_rapido) VALUES ('$idcategoria', '$concepto', '$monto', '$fecha_hora', '$idpago_rapido')";
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

		$sql="SELECT sum(monto) as total,

		(SELECT sum(monto) FROM pagos_rapidos WHERE prioridad = 1) as pagos1,
		(SELECT sum(monto) FROM pagos_rapidos WHERE prioridad = 2) as pagos2,
		(SELECT sum(monto) FROM pagos_rapidos WHERE prioridad = 3) as pagos3 
		
		FROM movimiento WHERE MONTH(fecha_hora) = MONTH('$fecha') AND YEAR(fecha_hora) = YEAR('$fecha')";
		return ejecutarConsultaSimpleFila($sql);
		//return ejecutarConsulta($sql);			
	}

	public function listar_pagos_rapidos_3()
	{

		$sql="SELECT * FROM pagos_rapidos WHERE prioridad = 3";
		//return ejecutarConsultaSimpleFila($sql);
		return ejecutarConsulta($sql);			
	}

	public function listar_pagos_rapidos_1()
	{

		$sql="SELECT * FROM pagos_rapidos WHERE prioridad = 1";
		//return ejecutarConsultaSimpleFila($sql);
		return ejecutarConsulta($sql);			
	}

	public function listar_pagos_rapidos_2()
	{

		$sql="SELECT * FROM pagos_rapidos WHERE prioridad = 2";
		//return ejecutarConsultaSimpleFila($sql);
		return ejecutarConsulta($sql);			
	}

}
?>

