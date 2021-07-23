<div class="form-group row">
        <div class="col-lg-4">
            <label for="inputID">PRESCRIPCION</label>
            <input type="text" class="form-control" id="P" name="P" placeholder="" readonly>
        </div>

        <div class="col-lg-2">
            <label for="inputID">N° ENTREGA</label>
            <input type="text" class="form-control" id="NE" name="NE" placeholder="" readonly>
        </div>

        <div class="col-lg-3">
            <label for="inputID">ID TRANSACCIONAL</label>
            <input type="text" class="form-control" id="IDT" name="ID" placeholder="" readonly>
        </div>
        <div class="col-lg-3">
            <label for="inputID">TECNOLOGIA ENTREGADA</label>
            <input type="text" class="form-control" id="C" name="C" placeholder="" readonly>
        </div>
</div>
<div class="form-group row">
    <div class="col-lg-3">
        <label for="type">TIPO DOCUMENTO</label>
        <input type="text" class="form-control" id="TD" name="TD" placeholder="" readonly>
    </div>
    <div class="col-lg-3">
        <label for="inputID">DOCUMENTO</label>
        <input type="text" class="form-control" id="D" name="D" placeholder="" readonly>
    </div>
    <div class="col-lg-3">

        <label for="SelectCausa">Causa No Entrega</label>
        <select class="form-control" id="CausaNoEntrega">
            <option value="">--Ninguna--</option>
            <option value="7">No fue posible contactar al paciente</option>
            <option value="8">Paciente fallecido</option>
            <option value="9">Paciente se niega a recibir el suministro</option>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="inputID">N° LOTE</label>
        <input type="text" class="form-control" id="NoLote" name="NoLote" placeholder="" >
    </div>
</div>
<div class="form-group row">

        <div class="col-lg-4">
            <label for="EstadoEntrega">Entrega Total</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="customRadio1">Si</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">No</label>
            </div>
        </div>

        <div class="col-lg-4">
            <label for="inputID">FECHA ENTREGA</label>
            <input type="date" class="form-control" id="date_d" name="date_d" placeholder="" required>
        </div>
        <div class="col-lg-4">
            <label for="inputID">CANTIDAD A ENTREGAR</label>
            <input type="number" step="any" min="0" max=""  name="Valordispensado" class="form-control" id="Valordispensado" required>
        </div>

</div>

        <div class="form-group row">
            <div id="checkbox1" class="col-lg-3">
                <label for="EstadoEntrega">El que recibe es el mismo paciente ??</label>
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="customSwitch1" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">NO</label>
                    </div>
            </div>


            <div id="registrar_re_t" class="col-lg-4"  style="display: none;">
                <label for="type_doc">Tipo documento</label>
                <select class="form-control" id="type_doc">
                    <option value="">--Ninguna--</option>
                    <option value="TI">Tarjeta de identidad</option>
                    <option value="CC">Cédula de ciudadanía</option>
                    <option value="PA">Pasaporte</option>
                    <option value="CD">Carné Diplomático</option>
                    <option value="SC"> Salvoconducto de permanencia</option>
                    <option value="PR">Pasaporte de la ONU</option>
                    <option value="PE">Permiso Especial de Permanencia</option>
                    <option value="AS">Adulto sin Identificación</option>

                </select>
            </div>

            <div id="registrar_re_d" class="col-lg-4"  style="display: none;">
                <label for="n_doc">N° Documento</label>
                <input type="number" class="form-control" id="n_doc" name="n_doc" placeholder="">
            </div>

        </div>








