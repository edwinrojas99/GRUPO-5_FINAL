<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
if (!isset($_SESSION["nombre"]))
{
  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
}
else
{
//Validamos el acceso solo al usuario logueado y autorizado.
	
require_once "../modelos/Almacen.php";

$encomiendas=new Encomiendas();


$guia=isset($_POST["guia"])? limpiarCadena($_POST["guia"]):"";
$nombre_completo=isset($_POST["nombre_completo"])? limpiarCadena($_POST["nombre_completo"]):"";
    $nombre_re=isset($_POST["nombre_re"])? limpiarCadena($_POST["nombre_re"]):"";
$carnet=isset($_POST["carnet"])? limpiarCadena($_POST["carnet"]):"";
$expedido=isset($_POST["expedido"])? limpiarCadena($_POST["expedido"]):"";
$celular=isset($_POST["celular"])? limpiarCadena($_POST["celular"]):"";
    $celular2=isset($_POST["celular2"])? limpiarCadena($_POST["celular2"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$origen=isset($_POST["origen"])? limpiarCadena($_POST["origen"]):"";
$destino=isset($_POST["destino"])? limpiarCadena($_POST["destino"]):"";
$precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";
    $detalle=isset($_POST["detalle"])? limpiarCadena($_POST["detalle"]):"";
$chofer=isset($_POST["chofer"])? limpiarCadena($_POST["chofer"]):"";




switch ($_GET["op"]){
	case 'guardaryeditar':

	
		if (empty($guia)){
			$rspta=$encomiendas->insertar($guia,$nombre_completo,$nombre_re,$carnet,$expedido,$celular,$celular2,$fecha,$origen,$destino,$precio,$detalle,$chofer);
			echo $rspta ? " registrado" : "no se pudo registrar";
		}
		else {
			$rspta=$encomiendas->editar($guia,$nombre_completo,$nombre_re,$carnet,$expedido,$celular,$celular2,$fecha,$origen,$destino,$precio,$detalle,$chofer);
			echo $rspta ? " actualizado" : " no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$encomiendas->desactivar($guia);
 		echo $rspta ? " Entregado" : " no se puede Entregar";
	break;

	case 'activar':
		$rspta=$encomiendas->activar($guia);
 		echo $rspta ? " Enviado" : " no se puede Enviar";
	break;

	case 'mostrar':
		$rspta=$encomiendas->mostrar($guia);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$encomiendas->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				
			

					 "0"=>$reg->guia.'0000',
					 "1"=>$reg->nombre_completo,
                "2"=>$reg->nombre_re,
                
					 "3"=>$reg->carnet,
					 "4"=>$reg->fecha,
					 "5"=>$reg->origen,
                 "6"=>$reg->destino,
					
                "7"=>$reg->detalle,
                  "8"=>$reg->precio.'<p> Bs.</p>',
                
               
                "9"=>($reg->condicion)?''.
 				
                		'<button class="btn btn-danger bg-blue" onclick="desactivar('.$reg->guia.')"><i class=""></i>Entregar</button>':
 				''.
 				'<button class="btn btn-primary bg-green" onclick="activar('.$reg->guia.')"><i class="fa fa-check"></i>Entregado</button>'
                
					
                
               
                
                
					 );
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
/* 
	case "selectEscala_salarial":
		require_once "../modelos/Escala_salarial.php";
		$escala_salarial = new Escala_salarial();

		$rspta = $escala_salarial->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->id_escala . '>' . $reg->puesto . '</option>';
				}
	break;  */
}
//Fin de las validaciones de acceso
}


ob_end_flush();
?>