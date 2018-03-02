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

 if ($_SESSION['oportunidades']==1) 
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
                          <h1 class="box-title">Prospectos</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistadop" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>ID</th>
                            <th>Razón Social</th>
                            <th>Contacto</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Imagen</th>
                            <th>Fecha de Ing.</th>
                            <th>Filtro</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>ID</th>
                            <th>Razón Social</th>
                            <th>Contacto</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Imagen</th>
                            <th>Fecha de Ing.</th>
                            <th>Filtro</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body"  id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Razón social(*)</label>
                            <input type="hidden" name="idcontacto" id="idcontacto">
                            <input type="text" class="form-control" name="razonsocial" id="razonsocial" maxlength="30" placeholder="Razón Social" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Rut</label>                       
                            <input type="text" class="form-control" name="rut" id="rut" maxlength="15" placeholder="99.999.999-1">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Giro</label>                       
                            <input type="text" class="form-control" name="giro" id="giro" maxlength="15" placeholder="Giro">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Contacto</label>                       
                            <input type="text" class="form-control" name="contacto" id="contacto" maxlength="50" placeholder="Contacto">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cargo</label>                       
                            <input type="text" class="form-control" name="cargo" id="cargo" maxlength="20" placeholder="Ejecutivo">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Telefono #1(*)</label>                       
                            <input type="tel" class="form-control" name="tlf_1" id="tlf_1" maxlength="20" placeholder="+56222220000" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Telefono #2</label>                       
                            <input type="tel" class="form-control" name="tlf_2" id="tlf_2" maxlength="20" placeholder="+56222220000">
                          </div>

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Correo</label>                       
                            <input type="email" class="form-control" name="correo" id="correo" maxlength="30" placeholder="email@email.cl">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Región</label>                       
                            <input type="text" class="form-control" name="region" id="region" maxlength="20" placeholder="Región">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Ciudad</label>                       
                            <input type="text" class="form-control" name="ciudad" id="ciudad" maxlength="20" placeholder="Ciudad">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Comuna</label>                       
                            <input type="text" class="form-control" name="comuna" id="comuna" maxlength="20" placeholder="Comuna">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Dirección</label>                       
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="250" placeholder="Dirección">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Canal de ingreso</label>
                            
                              <select  class="form-control" name="canal_deingreso" id="canal_deingreso">
                                <option value="1" selected>Correo</option>
                                <option value="2">Sitio web</option>
                                <option value="3">LLamada</option>
                                <option value="4">Presencial</option>
                                <option value="5">Tarjeta de Presentación</option>
                                <option value="6">Recomendación</option>
                              </select>

                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Filtro</label>

                              <select  class="form-control" name="filtro" id="filtro">
                                <option value="1" selected>Sin contactar</option>
                                <option value="2">Interesado</option>
                                <option value="3">Indeciso</option>
                                <option value="4">Sin responder</option>
                                <option value="5">Llamar después</option>
                                <option value="6">Sin interés</option>
                              </select>

                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Enlace</label>                       
                            <input type="url" class="form-control" name="enlace" id="enlace" maxlength="200" placeholder="Enlace API">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Código Postal</label>                       
                            <input type="number" class="form-control" name="codigopostal" id="codigopostal"  placeholder="Código Postal">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen</label>                       
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Sitio web</label>                       
                            <input type="url" class="form-control" name="sitioweb" id="sitioweb"  placeholder="www.web.cl">
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" type="button" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>

<!--  DIV PARA COTIZAR     -->

                    <div class="panel-body" style="height: 400px;" id="formcotizacion">
                        <form name="cotizacion" id="cotizacion" method="POST">

                          <div class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <label>Razón social(*):</label>
                            <input type="hidden" name="idcontactoct" id="idcontactoct">
                            <input type="text" class="form-control" name="razonsocialct" id="razonsocialct" maxlength="30" placeholder="Razón Social" required>
                          </div>

                          <div class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <label>Contacto:</label>                       
                            <input type="text" class="form-control" name="contactoct" id="contactoct" maxlength="50" placeholder="Contacto">
                          </div>
                
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Telefonos:</label>                       
                            <input type="tel" class="form-control" name="tlf_1ct" id="tlf_1ct" maxlength="20" placeholder="+56222220000" required>
                          </div>
        
                          <div class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <label>Correo:</label>                       
                            <input type="email" class="form-control" name="correoct" id="correoct" maxlength="30" placeholder="email@email.cl">
                          </div>

                          <div class="form-group col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <label>Descripcion Cotización:</label>                       
                            <input type="text" class="form-control" name="descripcionct" id="descripcionct" maxlength="30" placeholder="Descripción de operación">
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Impuesto %</label>
                            <br>
                            <input type="radio" name="imp" id="cimp" value="cimp" checked>Incluir 
                            <input type="radio" name="imp" id="simp" value="simp">S/IMP <br>
                            <input type="text" class="form-control" name="impuestoct" id="impuestoct" required="">
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
                            <button class="btn btn-primary" type="submit" id="btnCotizar"><i class="fa fa-save"></i>Cotizar</button>

                            <button id="btnCancelar" class="btn btn-danger" type="button" onclick="cancelarCot()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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

<?php
} // Esta llave abre y NO deja ver el contenido si hay permisos
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>
<script type="text/javascript" src="scripts/prospecto.js"></script>

<?php
//Cierre del ELSE que valida el login 
}
ob_end_flush();
?>
