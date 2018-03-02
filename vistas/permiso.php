<?php
//Activamos el almacenamiento en el buffer
ob_start();

session_start();

if (!isset($_SESSION['nombre'])) 
{
  header("Location: login.html");
}
else
{

require 'header.php';

 if ($_SESSION['acceso']==1) 
 {// Esta llave abre y NO deja ver el contenido si hay permisos
  
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
                          <h1 class="box-title">Permiso <button id="btnagregar" class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Nombre</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Nombre</th>
                          </tfoot>
                        </table>
                    </div>
                  </div>
              </div>
          </div>
      </section>
    </div>
<?php
} // Esta llave abre y NO deja ver el contenido si hay permisos
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>

<script type="text/javascript" src="scripts/permiso.js"></script>

<?php
//Cierre del ELSE que valida el login 
}
ob_end_flush();
?>