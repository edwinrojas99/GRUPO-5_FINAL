<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';


?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    
                       <div class="box-header with-border">
                       <h1 class="box-title">Escala Salarial </h1>
                   
                    
                         
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    
                   
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>N° Encomienda</th>
                            <th>Remitente</th>
                            <th>Consignatario</th>
                            <th>Cedula Identidad</th>
                            <th>Celular Consignatario</th>
                            <th>Fecha</th>
                            <th>Fecha Recojo</th>
                            <th>Liquido Pagable</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                        
                        </table>
                    </div>
                     <div class="panel-body" id="formularioregistros">
<form name="formulario" id="formulario" action="" method="POST">    
            <div class="box box-danger">
            <div class="box-header with-border">               
              <h3 class="box-title">Datos Personales Remitente</h3>
           <hr>
             
              
          
              
              <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <label>Nombres Completo:</label>
              <input type="hidden" name="guia" id="guia">
                <input type="text" class="form-control" name="nombre_completo" id="nombre_completo"placeholder="Nombres">
                </div>
                
               
                <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label>Celular:</label>
                  <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular">
                </div>
                
                

               <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <label>Fecha </label>
              <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha ">
              </div>
             
                <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label>Origen:</label>
                <select class="form-control" name="origen" id="origen">
                    <option value="">Elige origen</option>
                    <option value="Parada Chapare">Parada Chapare</option>
                    <option value="Bueltadero">Bueltadero</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    
                  </select>
                </div>
    
               
               
             
                
                 <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label>Destino:</label>
                <select class="form-control" name="destino" id="destino" placeholder="Destino ">
                   <option value="">Elige un destino</option>
                    <option value="Parada Chapare">Parada Chapare</option>
                    <option value="Bueltadero">Bueltadero</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    
                  </select>
                </div>
    
                <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <label>Descripcion:</label>
                <input type="text" style="width : 240px; heigth :100%"class="form-control" name="detalle" id="detalle"placeholder="Descripcion">
                </div>
                
                <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <label>Precio:</label>
                <input type="text" class="form-control" name="precio" id="precio"placeholder="Precio">
                </div>
                <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <label>Chofer:</label>
                <input type="text" class="form-control" name="chofer" id="chofer"placeholder="Chofer">
                </div>
                
                
                 <h3 class="box-title">Datos Personales Consignatario</h3>
                <hr>
                
                <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <label>Nombres Completo:</label>
              <input type="hidden" name="guia" id="guia">
                <input type="text" class="form-control" name="nombre_re" id="nombre_re"placeholder="Nombres">
                </div>
                
             
                
                
                 <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label>Celular:</label>
                  <input type="text" class="form-control" name="celular2" id="celular2" placeholder="Celular">
                </div>
                
               <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <label>Fecha Entrega</label>
              <input type="date" class="form-control" name="fecha_re" id="fecha_re" placeholder="Fecha ">
              </div>
              
               <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <label>Carnet </label>
              <input type="text" class="form-control" name="carnet" id="carnet" placeholder="Fecha ">
              </div>
              
               <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label>Expedido:</label>
                <select class="form-control" name="expedido" id="expedido" >
                   <option value="">Elige un destino</option>
                    <option value="PT">PT</option>
                    <option value="CB">CB</option>
                    <option value="SC">SC</option>
                    <option value="BN">BN</option>
                    <option value="OR">OR</option>
                    <option value="LP">LP</option>
                    <option value="TJ">TJ</option>
                    <option value="CH">CH</option>
                    <option value="PD">PD</option>
                    
                  </select>
                </div>
            </div>
            </div>
            
                

            </div>

             


                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                        
                   </div>


                   
                  
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}


require 'footer.php';
?>
<script type="text/javascript" src="scripts/rEntrega.js"></script>
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>

<script type="text/javascript" src="getData6.js"></script>
<script type="text/javascript" src="direcci.js"></script>
<script type="text/javascript" src="unid.js"></script>
<script type="text/javascript" src="get_programa.js"></script>

<script src="../public/js/jquery-3.1.1.min.js"></script>





<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   

<?php 

ob_end_flush();
?>


