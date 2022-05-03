<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Encomiendas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($guia,$nombre_completo,$nombre_re,$carnet,$expedido,$celular,$celular2,$fecha,$fecha_re,$origen,$destino,$precio,$detalle,$chofer)
	{
		$sql="INSERT INTO encomiendas (guia,nombre_completo,nombre_re,carnet,expedido,celular,celular2,fecha,fecha_re,origen,destino,precio,detalle,chofer,condicion)
		VALUES ('$guia','$nombre_completo','$nombre_re','$carnet','$expedido','$celular','$celular2','$fecha','$fecha_re','$origen','$destino','$precio','$detalle','$chofer','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($guia,$nombre_completo,$nombre_re,$carnet,$expedido,$celular,$celular2,$fecha,$fecha_re,$origen,$destino,$precio,$detalle,$chofer)
	{
		$sql="UPDATE encomiendas SET 
		guia='$guia',

		nombre_completo='$nombre_completo',
        nombre_re='$nombre_re',
		carnet='$carnet',
		expedido='$expedido',
		celular='$celular',
        celular='$celular2',
		fecha='$fecha',
        fecha='$fecha_re',
		origen='$origen',
		destino='$destino',
		precio='$precio',
        detalle='$detalle',
		chofer='$chofer',
		 WHERE guia='$guia'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function desactivar($guia)
	{
		$sql="UPDATE encomiendas SET condicion='0' WHERE guia='$guia'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($guia)
	{
		$sql="UPDATE encomiendas SET condicion='1' WHERE guia='$guia'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($guia)
	{
		$sql="SELECT * FROM encomiendas WHERE guia='$guia'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT guia,nombre_completo,nombre_re,carnet,expedido,celular,celular2,fecha,fecha_re,origen,destino,precio,detalle,chofer,condicion FROM encomiendas ";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros activos
	public function listarActivos()
	{
		$sql="SELECT a.id_personal,a.id_escala,c.puesto as categoria,a.nombres,a.ap_paterno,a.ap_materno,a.celular,a.carnet,a.expedido,a.fecha_nacimiento,a.correo,a.domicilio,a.sexo,a.imagen,a.grado_academico,a.carrera,a.institucion,a.anio_salio,a.obs_formacion_academica,a.planilla,a.modalidad,a.direccion,a.unidad,a.cargo,a.salario,a.bono_frontera,a.total_ganado,a.total_descuentos,a.liquido_pagable,a.nro_cite,a.cite_dirigido,a.inmediato_superior,a.fecha_inicio,a.fecha_fin,a.duracion,a.obs_datos_contratacion,a.programa,a.curriculum,a.libreta_militar,a.cert_politicas,a.cert_ley1178,a.cert_incompatibilidad,a.cert_solvencia,a.cert_idioma_nativo,a.cert_nacimiento,a.rejad,a.declaracion_jurada,a.croquis,a.cert_trabajo,a.condicion FROM personal a INNER JOIN escala_salarial c ON a.id_escala=c.id_escala WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}


	public function listarpersonal($guia){
		$sql="SELECT guia,nombre_completo,carnet,expedido,celular,fecha,origen,destino,precio,chofer,condicion FROM encomiendas WHERE guia='$guia'";
		return ejecutarConsulta($sql);
	}


	public function listarpersonalconsultor($id_personal){
		$sql="SELECT a.id_personal,a.id_escala,c.puesto as categoria,a.nombres,a.ap_paterno,a.ap_materno,a.celular,a.carnet,a.expedido,a.fecha_nacimiento,a.correo,a.domicilio,a.sexo,a.imagen,a.grado_academico,a.carrera,a.institucion,a.anio_salio,a.obs_formacion_academica,a.planilla,a.modalidad,a.direccion,a.unidad,a.cargo,a.salario,a.bono_frontera,a.total_ganado,a.total_descuentos,a.liquido_pagable,a.nro_cite,a.cite_dirigido,a.inmediato_superior,a.fecha_inicio,a.fecha_fin,a.duracion,a.obs_datos_contratacion,a.curriculum,a.libreta_militar,a.cert_politicas,a.cert_ley1178,a.cert_incompatibilidad,a.cert_solvencia,a.cert_idioma_nativo,a.cert_nacimiento,a.rejad,a.declaracion_jurada,a.croquis,a.cert_trabajo,a.condicion FROM personal a INNER JOIN escala_salarial c ON a.id_escala=c.id_escala   WHERE a.modalidad='Consultor'";
		return ejecutarConsulta($sql);
	}

	public function personalconsultortiempocompletocontrato($id_personal){
		$sql="SELECT a.id_personal,a.id_escala,c.puesto as categoria,c.literal_sueldo as literal_su,c.literal_bono as literal_bono_f, a.nombres,a.ap_paterno,a.ap_materno,a.celular,a.carnet,a.expedido,a.fecha_nacimiento,a.correo,a.domicilio,a.sexo,a.imagen,a.grado_academico,a.carrera,a.institucion,a.anio_salio,a.obs_formacion_academica,a.planilla,a.modalidad,a.direccion,a.unidad,a.cargo,a.salario,a.bono_frontera,a.total_ganado,a.total_descuentos,a.liquido_pagable,a.nro_cite,a.cite_dirigido,a.inmediato_superior,a.fecha_inicio,a.fecha_fin,a.duracion,a.obs_datos_contratacion,m.nombre_programa as programa_xd,a.curriculum,a.libreta_militar,a.cert_politicas,a.cert_ley1178,a.cert_incompatibilidad,a.cert_solvencia,a.cert_idioma_nativo,a.cert_nacimiento,a.rejad,a.declaracion_jurada,a.croquis,a.cert_trabajo,a.condicion FROM personal a INNER JOIN escala_salarial c ON a.id_escala=c.id_escala INNER JOIN programa_smdh m ON a.programa=m.id_programa_smdh WHERE a.id_personal='$id_personal'";
		return ejecutarConsulta($sql);
	}


/* 	//Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
	public function listarActivosVenta()
	{
		$sql="SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,(SELECT precio_venta FROM detalle_ingreso WHERE idarticulo=a.idarticulo order by iddetalle_ingreso desc limit 0,1) as precio_venta,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	} */
}

?>