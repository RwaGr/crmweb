<!--MODAL DE INSERTAR -->
<div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Insertar contacto</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="informulario">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Razón social</label>
                <div class="col-sm-9">
                  <input type="text" name="inrazonsocial" class="form-control" id="inrazonsocial" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Telefono</label>
                <div class="col-sm-9">
                  <input type="text" name="intlf_1" class="form-control" id="intlf_1">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Correo</label>
                <div class="col-sm-9">
                  <input type="text" name="incorreo" class="form-control" id="incorreo" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Filtro</label>
                <div class="col-sm-9">
                  <select  class="form-control" name="infiltro" id="infiltro">filtro
                    <option value="1">Sin contactar</option>
                    <option value="2">Interesado</option>
                    <option value="3">Indeciso</option>
                    <option value="4">Sin responder</option>
                    <option value="5">Llamar después</option>
                    <option value="6">Sin interes</option>
                  </select>
                </div>
              </div>
              <div>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="inbtnCerrar">Cancelar</button>
                <button type="button" class="btn btn-info" id="inbtnGuardar">Agregar</button>
              </div>
            </div>
          </form>
        </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<!--MODAL DE REGISTRAR -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Editar contacto</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="mformulario">
            <!--Parametro invisible -->
            <input type="hidden" name="midcontacto" id="midcontacto">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Razón social</label>
                <div class="col-sm-9">
                  <input type="text" name="mrazonsocial" class="form-control" id="mrazonsocial" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Telefono</label>
                <div class="col-sm-9">
                  <input type="text" name="mtlf_1" class="form-control" id="mtlf_1" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Correo</label>
                <div class="col-sm-9">
                  <input type="text" name="mcorreo" class="form-control" id="mcorreo" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Filtro</label>
                <div class="col-sm-9">
                  <select  class="form-control" name="mfiltro" id="mfiltro">filtro
                    <option value="1">Sin contactar</option>
                    <option value="2">Interesado</option>
                    <option value="3">Indeciso</option>
                    <option value="4">Sin responder</option>
                    <option value="5">Llamar después</option>
                    <option value="6">Sin interes</option>
                  </select>
                </div>
              </div>
            </div>
          </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="mbtnCerrar">Cancelar</button>
        <button type="button" class="btn btn-info" id="mbtnGuardar">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!--MODAL MOSTRAR -->
<div class="modal fade" id="modalMostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Mostrar contacto</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="mmformulario">
            <!--Parametro invisible -->
            <input type="hidden" name="mmidcontacto" id="mmidcontacto">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Razón social</label>
                <div class="col-sm-9">
                  <input type="text" name="mmrazonsocial" class="form-control" id="mmrazonsocial" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Telefono</label>
                <div class="col-sm-9">
                  <input type="text" name="mmtlf_1" class="form-control" id="mmtlf_1" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Correo</label>
                <div class="col-sm-9">
                  <input type="text" name="mmcorreo" class="form-control" id="mmcorreo" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Filtro</label>
                <div class="col-sm-9">
                  <input type="text" name="mmfiltro" class="form-control" id="mmfiltro" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Estado</label>
                <div class="col-sm-9">
                  <span class="label label-success" name="mmestado" id="mmestado"></span>
              </div>
            </div>
          </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="mmbtnCerrar">Cancelar</button>
      </div>
    </div>
  </div>
</div>