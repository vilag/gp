<?php
//session_start(); 
require_once "../modelos/Index.php";

$index=new Index();


switch ($_GET["op"]){
	
		case 'listar_categorias':

			$fecha=$_GET['fecha'];

			$rspta = $index->listar_categorias($fecha);
				
			while ($reg = $rspta->fetch_object())
					{
						echo '
                            <option value="'.$reg->idcategoria.'">'.$reg->nombre.'</option>
						';
						
					}

		break;

		case 'listar_categorias_box':

			$fecha=$_GET['fecha'];

			$rspta = $index->listar_categorias($fecha);
				
			while ($reg = $rspta->fetch_object())
					{
						echo '
						<div onclick="select_cat('.$reg->idcategoria.',\''.$reg->nombre.'\',\''.$reg->suma.'\');" style="cursor: pointer; color: #FFF; width: 45%; background-color: #042E4A;  justify-content: center; align-items: center; float: left; height: 150px; padding: 10px; margin: 5px; box-shadow: 5px 5px 10px rgba(0,0,0,0.2);">
							<div style="width: 100%; float: left;">
								<b>'.$reg->nombre.'</b>
							</div>
							<div style="width: 100%; float: left;">
								<label>$ '.$reg->suma.'</label>
							</div>
						</div>
						';
						
					}

		break;

		case 'guardar':

			$categoria = $_POST['categoria'];
			$concepto = $_POST['concepto'];
			$monto = $_POST['monto'];
			$fecha_hora = $_POST['fecha_hora'];

			$rspta=$index->guardar($categoria,$concepto,$monto,$fecha_hora);
	 		echo json_encode($rspta);
	 		
		break;

		case 'listar_movimientos':

			$fecha=$_GET['fecha'];

			$rspta = $index->listar_movimientos($fecha);
				
			while ($reg = $rspta->fetch_object())
					{
						
						echo '
						<tr>
							<td>'.$reg->idmovimiento.'</td>
							<td>'.$reg->categoria.'</td>
							<td>'.$reg->movimiento.'</td>
							<td>$ '.$reg->monto.'</td>
							<td>'.$reg->fecha_hora.'</td>
						</tr>
						';
						
					}

		break;

		case 'listar_movimientos_cat':

			$idcategoria=$_GET['idcategoria'];
			$fecha=$_GET['fecha'];

			$rspta = $index->listar_movimientos_cat($idcategoria,$fecha);
				
			while ($reg = $rspta->fetch_object())
					{
						
						echo '
						<tr>
							<td>'.$reg->idmovimiento.'</td>
							<td>'.$reg->categoria.'</td>
							<td>'.$reg->movimiento.'</td>
							<td>$ '.$reg->monto.'</td>
							<td>'.$reg->fecha_hora.'</td>
						</tr>
						';
						
					}

		break;

		case 'suma_gastos':

			$fecha = $_POST['fecha'];

			$rspta=$index->suma_gastos($fecha);
	 		echo json_encode($rspta);
	 		
		break;

		case 'listar_pagos_rapidos':

			$rspta = $index->listar_pagos_rapidos();
				
			while ($reg = $rspta->fetch_object())
					{
						
						echo '
						
						';
						
					}

		break;

	
}
?>