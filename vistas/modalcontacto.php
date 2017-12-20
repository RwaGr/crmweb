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
                <label class="col-sm-3 control-label">contacto</label>
                <div class="col-sm-9">
                  <input type="text" name="incontacto" class="form-control" id="incontacto" >
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
                    <option value="6">Sin interés</option>
                  </select>
                </div>
              </div>
              <div>
                
              </div>
            </div>
          </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="inbtnCerrar">Cancelar</button>
        <button type="button" class="btn btn-info" id="inbtnGuardar">Agregar</button>
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
                <label class="col-sm-3 control-label">Rut</label>
                <div class="col-sm-9">
                  <input type="text" name="mrut" class="form-control" id="mrut" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Giro</label>
                <div class="col-sm-9">
                  <input type="text" name="mgiro" class="form-control" id="mgiro" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Contacto</label>
                <div class="col-sm-9">
                  <input type="text" name="mcontacto" class="form-control" id="mcontacto" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Cargo</label>
                <div class="col-sm-9">
                  <input type="text" name="mcargo" class="form-control" id="mcargo" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Telefono</label>
                <div class="col-sm-9">
                  <input type="text" name="mtlf_1" class="form-control" id="mtlf_1" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Telefono opcional</label>
                <div class="col-sm-9">
                  <input type="text" name="mtlf_2" class="form-control" id="mtlf_2" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Correo</label>
                <div class="col-sm-9">
                  <input type="text" name="mcorreo" class="form-control" id="mcorreo" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Región</label>
                <div class="col-sm-9">
                  <input type="text" name="mregion" class="form-control" id="mregion" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Ciudad</label>
                <div class="col-sm-9">
                  <input type="text" name="mciudad" class="form-control" id="mciudad" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Comuna</label>
                <div class="col-sm-9">
                  <input type="text" name="mcomuna" class="form-control" id="mcomuna" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Dirección</label>
                <div class="col-sm-9">
                  <input type="text" name="mdireccion" class="form-control" id="mdireccion" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Canal de ingreso</label>
                <div class="col-sm-9">
                  <select  class="form-control" name="mcanal" id="mcanal">filtro
                    <option value="Correo">Correo</option>
                    <option value="Sitio web">Sitio web</option>
                    <option value="LLamada">LLamada</option>
                    <option value="Presencial">Presencial</option>
                    <option value="Tarjeta de presentacion">Tarjeta de Presentación</option>
                    <option value="Recomendación">Recomendación</option>
                  </select>
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
                    <option value="6">Sin interés</option>
                  </select>
                </div>
              </div>              

              <div class="form-group">
                <label class="col-sm-3 control-label">Enlace</label>
                <div class="col-sm-9">
                  <input type="text" name="menlace" class="form-control" id="menlace" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Codigo Postal</label>
                <div class="col-sm-9">
                  <input type="text" name="mcodigopostal" class="form-control" id="mcodigopostal" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Imagen</label>
                <div class="col-sm-9">
                  <input type="text" name="mimagen" class="form-control" id="mimagen" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Sitio web</label>
                <div class="col-sm-9">
                  <input type="text" name="msitioweb" class="form-control" id="msitioweb" placeholder="">
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
                <label class="col-sm-3 control-label">Rut</label>
                <div class="col-sm-9">
                  <input type="text" name="mmrut" class="form-control" id="mmrut" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Giro</label>
                <div class="col-sm-9">
                  <input type="text" name="mmgiro" class="form-control" id="mmgiro" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Contacto</label>
                <div class="col-sm-9">
                  <input type="text" name="mmcontacto" class="form-control" id="mmcontacto" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Cargo</label>
                <div class="col-sm-9">
                  <input type="text" name="mmcargo" class="form-control" id="mmcargo" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Telefono</label>
                <div class="col-sm-9">
                  <input type="text" name="mmtlf_1" class="form-control" id="mmtlf_1" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Telefono opcional</label>
                <div class="col-sm-9">
                  <input type="text" name="mmtlf_2" class="form-control" id="mmtlf_2" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Correo</label>
                <div class="col-sm-9">
                  <input type="text" name="mmcorreo" class="form-control" id="mmcorreo" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Región</label>
                <div class="col-sm-9">
                  <input type="text" name="mmregion" class="form-control" id="mmregion" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Ciudad</label>
                <div class="col-sm-9">
                  <input type="text" name="mmciudad" class="form-control" id="mmciudad" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Comuna</label>
                <div class="col-sm-9">
                  <input type="text" name="mmcomuna" class="form-control" id="mmcomuna" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Dirección</label>
                <div class="col-sm-9">
                  <input type="text" name="mmdireccion" class="form-control" id="mmdireccion" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Canal de ingreso</label>
                <div class="col-sm-9">
                  <label class="form-control label" name="mmcanal" id="mmcanal"></label>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-sm-3 control-label">Filtro</label>
                <div class="col-sm-9">
                  <label type="text" class="form-control" name="mmfiltro" id="mmfiltro"></label>
                </div>
              </div>  

              <div class="form-group">
                <label class="col-sm-3 control-label">Estado</label>
                <div class="col-sm-9">
                  <span class="form-control label" name="mmestado" id="mmestado"></span>
              </div>           

              <div class="form-group">
                <label class="col-sm-3 control-label">Enlace</label>
                <div class="col-sm-9">
                  <a href="" name="mmenlace" class="form-control" id="mmenlace"></a>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Fecha de ingreso</label>
                <div class="col-sm-9">
                  <input type="date" name="mmingreso" class="form-control" id="mmingreso" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Codigo Postal</label>
                <div class="col-sm-9">
                  <input type="text" name="mmcodigopostal" class="form-control" id="mmcodigopostal" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Imagen</label>
                <div class="col-sm-9">
                  <input type="text" name="mmimagen" class="form-control" id="mmimagen" disabled="disabled">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Sitio web</label>
                <div class="col-sm-9">
                  <a  href="" name="mmsitioweb" class="form-control" id="mmsitioweb"></a>
                </div>
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