<div class="form-group row">
    <div class="col-lg-3">
        <label for="inputID">PRESCRIPCION</label>
        <input type="text" class="form-control" id="P" name="P" placeholder="" readonly>
    </div>
    <div class="col-lg-3">
        <label for="inputID">CUM</label>
        <input type="text" class="form-control" id="C" name="C" placeholder="" readonly>
    </div>
    <div class="col-lg-2">
        <label for="inputID">N° ENTREGA</label>
        <input type="text" class="form-control" id="NE" name="NE" placeholder="" readonly>
    </div>
    <div class="col-lg-2">
        <label for="inputID">FECHA ENTREGA</label>
        <input type="text" class="form-control" id="FE" name="FE" placeholder="" readonly>
    </div>
</div>
<div class="form-group">
    <div class="col-lg-12">
        <label for="inputID">ID TRANSACCIONAL</label>
        <input type="text" class="form-control" id="IDT" name="ID" placeholder="" readonly>
    </div>
</div>
<div class="form-group">
        <div class="col-lg-12">
            <label for="EstadoEntrega">Estado de Entrega</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="customRadio1">Si se entrega</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">No se entrega</label>
              </div>
          </div>
    </div>
    <div class="form-group">
          <div class="col-lg-12">

                <label for="SelectCausa">Causa No Entrega</label>
                <select class="form-control" id="CausaNoEntrega">
                    <option value="">--Ninguna--</option>
                    <option value="7">No fue posible contactar al paciente</option>
                    <option value="8">Paciente fallecido</option>
                    <option value="9">Paciente se niega a recibir el suministro</option>
                </select>
          </div>
    </div>
    <div class="form-group">
    <div class="col-lg-6">

            <label for="SelectCausa">Valor Entregado</label>
            <input type="number" step="any" min="0" max=""  name="ValorEntregado" class="form-control" id="ValorEntregado" required>
          </div>
    </div>






