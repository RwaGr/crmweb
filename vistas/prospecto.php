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
                          <h1 class="box-title">Prospecto</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Razón social</th>
                            <th>Contacto </th>
                            <th>Tlf </th>
                            <th>Correo</th>
                            <th>Filtro</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Razón social</th>
                            <th>Contacto </th>
                            <th>Tlf </th>
                            <th>Correo</th>
                            <th>Filtro</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
          </section>
      </div>
<?php
require 'footer.php';
require 'modalprospecto.php';
?>
<script type="text/javascript" src="scripts/prospecto.js?v0.1.16"></script>

