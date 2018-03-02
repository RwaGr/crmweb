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

 if ($_SESSION['agenda']==1) 
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
                    <div class="box-header with-border col-md-12">
                        <div class="col-md-3">
                          <h1 class="box-title">Registros <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        </div>
                        
                        <div class="box-tools pull-right">
                          <button class="btn btn-success" style="width: 110px; padding: 10px" id="completado" name="completado" onclick="mostrarCom(true)">Completados</button>
                          <button class="btn btn-warning" style="width: 110px; padding: 10px" id="pendientes" name="pendientes" onclick="mostrarPen(true)">Pendientes</button>
                          <button class="btn btn-danger" style="width: 110px; padding: 10px" id="descartado" name="descartado" onclick="mostrarDes(true)">Descartado</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Responsable</th>
                            <th>Actividad</th>
                            <th>Asunto</th>
                            <th>Contacto y razonsocial</th>
                            <th>Tlf y Correo</th>
                            <th>Fecha y hora</th>
                            <th>Duración</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Responsable</th>
                            <th>Actividad</th>
                            <th>Asunto</th>
                            <th>Contacto y razonsocial</th>
                            <th>Tlf y Correo</th>
                            <th>Fecha y hora</th>
                            <th>Duración</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body"  id="formularioregistros">
                        <form name="cotizacion" id="formulario" method="POST">

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Razón social(*):</label>
                            <input type="hidden" name="idagenda" id="idagenda">
                            <select id="idcontacto" name="idcontacto" class="form-control selectpicker" data-live-search="true" required>
                               
                            </select>
                          </div>
                
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Actividad(*):</label>                       
                            <select name="tipo_evento" id="tipo_evento" class="form-control selectpicker" required>
                               <option value="llamada"><i class="fa fa-phone">Llamada</i></option>
                               <option value="reunion"><i class="fa fa-users"></i>Reunión</option>
                               <option value="tarea"><i class="fa fa-clock"></i>Tarea</option>
                               <option value="plazo"><i class="fa fa-flag"></i>Plazo</option>
                               <option value="correo"><i class="fa fa-envelope"></i>Correo</option>
                               <option value="almuerzo"><i class="fa fa-coffee"></i>Almuerzo</option>
                            </select>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Asunto(*):</label>        
                            <input type="text" class="form-control" name="asunto" id="asunto" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>        
                            <textarea style="height: auto !important; resize: none;" maxlength="250" class="form-control" rows="5" name="descripcion" id="descripcion"></textarea>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha(*):</label>        
                            <input type="text" class="form-control" name="fec_evento" id="fec_evento"  required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Hora inicio:</label>        
                            <input type="text" class="form-control" name="hora_evento" id="hora_evento">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Duración:</label>        
                            <input list="select" type="text"  class="form-control" name="duracion" id="duracion">
                            <datalist id="select">
                              <option value="00:15">
                              <option value="00:30">
                              <option value="00:45">
                              <option value="01:00">  
                              <option value="01:15">
                              <option value="01:30">
                              <option value="01:45">
                              <option value="02:00"> 
                              <option value="02:15">
                              <option value="02:30">
                              <option value="02:45">
                              <option value="03:00"> 
                              <option value="03:15">
                              <option value="03:30">
                              <option value="03:45">
                              <option value="04:00"> 
                              <option value="04:15">
                              <option value="04:30">
                              <option value="04:45">
                              <option value="05:00"> 
                              <option value="05:15">
                              <option value="05:30">
                              <option value="05:45">
                              <option value="06:00">
                              <option value="06:15">
                              <option value="06:30">
                              <option value="06:45">
                              <option value="07:00"> 
                              <option value="07:15">
                              <option value="07:30">
                              <option value="07:45">
                              <option value="08:00"> 


                            </datalist>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Responsable:</label>        
                            <select id="idusuario" name="idusuario" class="form-control selectpicker" data-live-search="true" required>
                               
                            </select>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>Crear</button>

                            <button id="btnCancelar" class="btn btn-danger" type="button" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                  </div>
              </div>
          </div>
      </section>

    </div>


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
<script type="text/javascript" src="scripts/agenda.js"></script>

<?php
//Cierre del ELSE que valida el login 
}
ob_end_flush();
?>