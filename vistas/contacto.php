<?php
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
                          <h1 class="box-title">Contacto <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Razón social</th>
                            <th>Tlf </th>
                            <th>Correo</th>
                            <th>Filtro</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Razón social</th>
                            <th>Tlf </th>
                            <th>Correo</th>
                            <th>Filtro</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Razón social:</label>
                            <input type="hidden" name="idcontacto" id="idcontacto">
                            <input type="text" class="form-control" name="razonsocial" id="razonsocial" maxlength="50" placeholder="Razón social" required>
                          </div>                       
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tlf:</label>                       
                            <input type="text" class="form-control" name="tlf_1" id="tlf_1" maxlength="250" placeholder="Telefono">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Correo:</label>
                            <input type="hidden" name="idcontacto" id="idcontacto">
                            <input type="text" class="form-control" name="correo" id="correo" maxlength="50" placeholder="Correo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Filtro:</label>                       
                            <select  class="form-control" name="filtro" id="filtro"
                            required>filtro
                            	<option value="1">Sin contactar</option>
                            	<option value="2">Interesado</option>
                            	<option value="3">Indeciso</option>
                            	<option value="4">Sin responder</option>
                            	<option value="5">Llamar después</option>
                            	<option value="6">Sin interes</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                             <button class="btn btn-danger" type="button" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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
require 'footer.php';
?>
<script type="text/javascript" src="scripts/contacto.js"></script>

