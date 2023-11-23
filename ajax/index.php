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

		case 'listar_pagos_rapidos_3':

			$rspta = $index->listar_pagos_rapidos_3();
				
			while ($reg = $rspta->fetch_object())
					{
						if ($reg->idpago_rel>0) {
							$borde_3 = "border: #4DF732 5px solid;";
						}else{
							$borde_3 = "";
						}
						
						echo '
							<div style="width: 100%; width: 80px; height: 80px; float: left; margin-left: 10px; text-align: center; padding: 12px;">
								<div onclick="select_pago_rapido('.$reg->idpago.',\''.$reg->nombre.'\',\''.$reg->idcategoria.'\',\''.$reg->monto.'\',\''.$reg->idpago_rel.'\',\''.$reg->estatus.'\');" style="box-shadow: 5px 5px 10px rgba(0,0,0,0.2); float: left;  width: 100%; height: 100%; border-radius: 50%; background-image: url('.$reg->imagen.'); background-repeat: no-repeat; background-size: cover; '.$borde_3.'""></div>
								<b>$'.$reg->monto.'</b>
							</div>
							
						';
						
					}

		break;

		case 'listar_pagos_rapidos_1':

			$rspta = $index->listar_pagos_rapidos_1();
				
			while ($reg = $rspta->fetch_object())
					{
						if ($reg->idpago_rel>0) {
							$borde_1 = "border: #4DF732 5px solid;";
						}else{
							$borde_1 = "";
						}
						
						echo '
							<div style="width: 100%; width: 80px; height: 80px; float: left; margin-left: 10px; text-align: center; padding: 12px;">
								<div onclick="select_pago_rapido('.$reg->idpago.',\''.$reg->nombre.'\',\''.$reg->idcategoria.'\',\''.$reg->monto.'\',\''.$reg->idpago_rel.'\',\''.$reg->estatus.'\');" style="box-shadow: 5px 5px 10px rgba(0,0,0,0.2); float: left;  width: 100%; height: 100%; border-radius: 50%; background-image: url('.$reg->imagen.'); background-repeat: no-repeat; background-size: cover; '.$borde_1.'""></div>
								<b>$'.$reg->monto.'</b>
							</div>
							
						';
						
					}

		break;

		case 'listar_pagos_rapidos_2':

			$rspta = $index->listar_pagos_rapidos_2();
				
			while ($reg = $rspta->fetch_object())
					{
						if ($reg->idpago_rel>0) {
							$borde_2 = "border: #4DF732 5px solid;";
						}else{
							$borde_2 = "";
						}
						
						echo '
							<div style="width: 100%; width: 80px; height: 80px; float: left; margin-left: 10px; text-align: center; padding: 12px;">
								<div onclick="select_pago_rapido('.$reg->idpago.',\''.$reg->nombre.'\',\''.$reg->idcategoria.'\',\''.$reg->monto.'\',\''.$reg->idpago_rel.'\',\''.$reg->estatus.'\');" style="box-shadow: 5px 5px 10px rgba(0,0,0,0.2); float: left;  width: 100%; height: 100%; border-radius: 50%; background-image: url('.$reg->imagen.'); background-repeat: no-repeat; background-size: cover; '.$borde_2.'""></div>
								<b>$'.$reg->monto.'</b>
							</div>
							
						';
						
					}

		break;

	
}
?>