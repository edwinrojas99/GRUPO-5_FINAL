var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	
	});
 	$('#mRegistro').addClass("treeview active");
    $('#lPersonal').addClass("active");
 	$('#lEscala').addClass("active");
	$('#lResponsables').addClass("active"); 

	$("#imagenmuestra").hide();

}

//Función limpiar
function limpiar()
{
	
	$("#nombre_completo").val("");
	$("#carnet").val("");
	$("#expedido").val("");
	$("#celular").val("");
    $("#celular2").val("");
	$("#fecha").val("");
    $("#fecha_re").val("");
	$("#origen").val("");

	$("#destino").val("");
	$("#precio").val("");
    $("#detalle").val("");
	$("#chofer").val("");
	

}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
 
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();

	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
	    buttons: [		          
		           
		        ],
		"ajax":
				{
					url: '../ajax/encomiendas.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
            "copyTitle": "Tabla Copiada",
            "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/encomiendas.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(guia)
{
	$.post("../ajax/encomiendas.php?op=mostrar",{guia : guia}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#guia").val(data.guia);
	
		$("#nombre_completo").val(data.nombre_completo);
		$("#carnet").val(data.carnet);
		$("#expedido").val(data.expedido);
		$("#celular").val(data.celular);
        $("#celular2").val(data.celular2);
		$("#fecha").val(data.fecha);
        $("#fecha_re").val(data.fecha_re);
		$("#origen").val(data.origen);
		$("#destino").val(data.destino);
		$("#precio").val(data.precio);
        $("#detalle").val(data.detalle);
		$("#chofer").val(data.chofer);
		


 	})
}

//Función para desactivar registros
function desactivar(guia)
{
	bootbox.confirm("¿Está Seguro Enviar ?", function(result){
		if(result)
        {
        	$.post("../ajax/encomiendas.php?op=desactivar", {guia : guia}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(guia)
{
	bootbox.confirm("¿Está Seguro de que Entrego?", function(result){
		if(result)
        {
        	$.post("../ajax/encomiendas.php?op=activar", {guia : guia}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}



init();