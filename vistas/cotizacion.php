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

 if ($_SESSION['negociaciones']==1) 
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
                        <div class="col-md-3">
                          <h1 class="box-title">Cotizaciones <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        </div>
                        
                        <div class="box-tools pull-right">
                          <button class="btn btn-success" style="width: 110px; padding: 10px" id="completado" name="completado" onclick="mostrarVen(true)">Mostrar Ventas</button>
                          <button class="btn btn-warning" style="width: 110px; padding: 10px" id="pendientes" name="pendientes" onclick="mostrarCot(true)">Cotizaciones</button>
                        </div>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Serie</th>
                            <th>Usuario</th>
                            <th>Razón social</th>
                            <th>Contacto</th>
                            <th>Telefono</th>
                            <th>Fecha</th>
                            <th>Impuesto</th>
                            <th>Total</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Serie</th>
                            <th>Usuario</th>
                            <th>Razón social</th>
                            <th>Contacto</th>
                            <th>Telefono</th>
                            <th>Fecha</th>
                            <th>Impuesto</th>
                            <th>Total</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="cotizacion" id="formulario" method="POST">

                          <div class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <label>Razón social(*):</label>
                            <input type="hidden" name="idcotizacion" id="idcotizacion">
                            <input type="hidden" name="idusuario" id="idusuario">
                            <select id="idcontactoct" name="idcontactoct" class="form-control selectpicker" data-live-search="true" required>
                               
                            </select>
                          </div>
                
                          <div class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <label>Descripcion Cotización:</label>                       
                            <input type="text" class="form-control" name="descripcionct" id="descripcionct" maxlength="50" placeholder="Descripción de operación">
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Impuesto %</label>
                            <br>
                            <input type="radio" name="imp" id="cimp" value="cimp" checked>Incluir 
                            <input type="radio" name="imp" id="simp" value="simp">S/IMP <br>
                            <input type="text" class="form-control" name="impuestoct" id="impuestoct" required>
                          </div>

                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a data-toggle="modal" href="#myModal">           
                              <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fa fa-plus"></span> Agregar Artículos</button>
                            </a>
                          </div>

                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                              <thead style="background-color: #A9D0F5">
                                  <th>Opciones</th>
                                  <th>Artículos</th>
                                  <th>Cantidad</th>
                                  <th>Precio Venta</th>
                                  <th>Descuento</th>
                                  <th>Subtotal</th>
                              </thead>
                              <tfoot>
                                  <th></th>
                                  <th>NETO</th>
                                  <th><h4 id="neto">$CLP 0.00</h4><input type="hidden" name="neto_venta" id="neto_venta"></th>
                                  <th></th>
                                  <th>TOTAL</th>
                                  <th><h4 id="total">$CLP 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th> 
                              </tfoot>
                              <tbody>
                                
                              </tbody>
                            </table>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>Cotizar</button>

                            <button id="btnCancelar" class="btn btn-danger" type="button" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                  </div>
              </div>
          </div>
      </section>

    </div>

 <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 65% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione un Artículo</h4>
        </div>
        <div class="modal-body">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Opciones</th>
                <th>ID</th>
                <th>nombre</th>
                <th>descripcion</th>
                <th>valor</th>
                <th>Imagen</th>
            </thead>
            <tbody>
               
            </tbody>
            <tfoot>
                <th>Opciones</th>
                <th>ID</th>
                <th>nombre</th>
                <th>descripcion</th>
                <th>valor</th>
                <th>Imagen</th>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  
  <!-- Fin modal -->
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
} // Esta llave abre y NO deja ver el contenido si hay permisos
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>
<script type="text/javascript" src="scripts/cotizacion.js"></script>

<?php
//Cierre del ELSE que valida el login 
}
ob_end_flush();
?>