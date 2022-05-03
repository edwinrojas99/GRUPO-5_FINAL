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
    $("#nombre_re").val("");
	$("#carnet").val("");
	$("#expedido").val("");
	$("#celular").val("");
	$("#fecha").val("");
	$("#origen").val("");

	$("#destino").val("");
	$("#precio").val("");
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
		            
		            'excelHtml5'
		           
		        ],
		"ajax":
				{
					url: '../ajax/almacen.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
            
           
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
		url: "../ajax/almacen.php?op=guardaryeditar",
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
	$.post("../ajax/almacen.php?op=mostrar",{guia : guia}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#guia").val(data.guia);
	
		$("#nombre_completo").val(data.nombre_completo);
        $("#nombre_re").val(data.nombre_re);
		$("#carnet").val(data.carnet);
		$("#expedido").val(data.expedido);
		$("#celular").val(data.celular);
		$("#fecha").val(data.fecha);
		$("#origen").val(data.origen);
		$("#destino").val(data.destino);
		$("#precio").val(data.precio);
		$("#chofer").val(data.chofer);
		


 	})
}

//Función para desactivar registros
function desactivar(guia)
{
	bootbox.confirm("¿Está Seguro Enviar ?", function(result){
		if(result)
        {
            
        	$.post("../ajax/almacen.php?op=desactivar", {guia : guia}, function(e){
        		
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
        	$.post("../ajax/almacen.php?op=activar", {guia : guia}, function(e){
        		
	            tabla.ajax.reload();
        	});	
        }
	})
}



init();