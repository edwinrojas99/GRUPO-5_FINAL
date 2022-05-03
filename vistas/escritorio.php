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


/*   require_once "../modelos/Consultas.php";
  $consulta = new Consultas();
  $rsptac = $consulta->totalpersonal();
  $regc=$rsptac->fetch_object();
  $total_personal=$regc->totalp;
 */
?>
<!DOCTYPE html>
<html >
<head>
  <title></title>
  
</head>
<body class="body">
 
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border"  style="background: #99CCFF">
                      <center>
                         <h1 >BIENVENIDO AL SISTEMA DE  TRANSPORTE MIXTO TRICOLOR</h1>
                      </center>                    
                     
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div style="background-image: url('img/2.jpg'); 
      
      opacity: 0.6; font-family:Georgia " >
                      <div class="panel-body" >
                      <center><h1>Nuestra misión</h1></center>
                          <p>                          
 Ser la mejor empresa de servicio del mundo. Para lograrlo, hemos establecido una cultura que apoya a los miembros de nuestro equipo para que ellos puedan dar un servicio excepcional a nuestros clientes. “A los clientes no les gustará una empresa si no les gusta primero a sus empleados”.
                          </p>
                    </div>
                    <div class="panel-body">
                      <center><h1>  Nuestra visión</h1></center>
                          <p>
                          

Nuestra vision son los siguientes aspectos:
<h5>1. Trabajamos para el cliente.</h5>

<h5>2. Trabajamos para ser muy transparentes.</h5>
<h5>3. Favorecemos la autonomía y la responsabilidad.</h5>


<h5>4. Creemos que nuestra mejor ventaja son los compañeros increíbles.</h5>
                          </p>
                    </div>
                        <div class="panel-body">
                          <center><h1> Nuestros valores</h1></center>
                          <p>
                           <H5>1.Honestidad</H5>
                           <h5>2. Transparencia</h5>
                           <h5>3. Pasión</h5>
                           <h5>4. Calidad</h5>
                           <h5>5. Orientación al cliente</h5>
                           <h5>6. Responsabilidad social</h5>
                           <h5></h5>
                           <h5></h5>
                           <h5></h5>

                          </p>
                    </div>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
</body>
</html>
<?php


require 'footer.php';
?>




<?php 
}
ob_end_flush();
?>

