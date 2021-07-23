<div class="form-group row">
    <div class="col-lg-3">
        <label for="inputID">PRESCRIPCION</label>
        <input type="text" class="form-control" id="PRES" name="PRES" placeholder="" readonly>
    </div>
    <div class="col-lg-3">
        <label for="inputID">TIPO TECNOLOGÍA</label>
        <input type="text" class="form-control" id="TIPT" name="TIPT" placeholder="" readonly>
    </div>
    <div class="col-lg-2">
        <label for="inputID">CONSECUTIVO TEC</label>
        <input type="text" class="form-control" id="CODT" name="CODT" placeholder="" readonly>
    </div>
    <div class="col-lg-2">
        <label for="inputID">TIPO ID</label>
        <input type="text" class="form-control" id="TIPI" name="TIPI" placeholder="" readonly>
    </div>
    <div class="col-lg-2">
        <label for="inputID">ID PACIENTE</label>
        <input type="text" class="form-control" id="NIDE" name="NIDE" placeholder="" readonly>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-2">
        <label for="inputID">N° ENTREGA</label>
        <input type="text" class="form-control" id="NE" name="NE" placeholder="" readonly>
    </div>
    <div class="col-lg-3">
        <label for="inputID">CUM</label>
        <input type="text" class="form-control" id="CUM" name="CUM" placeholder="" readonly>
    </div>
    <div class="col-lg-3">
        <label for="inputID">VALOR TOTAL</label>
        <input type="text" class="form-control" id="VALE" name="VALE" placeholder="" readonly>
    </div>
    <div class="col-lg-2">
        <label for="inputID">CANT ENTREGADA</label>
        <input type="text" class="form-control" id="CANE" name="CANE" placeholder="" readonly>
    </div>
    <div class="col-lg-2">
        <label for="inputID">VALOR UNITARIO</label>
        <input type="text" class="form-control" id="VALU" name="VALU" placeholder="" readonly>
    </div>
</div>
    <div class="form-group">
        <div class="col-lg-12">
            <label for="Facturado">N de factura CUFE </label>
            <input type="text" name="NoFactura" class="form-control" id="NoFactura" required>
          </div>
    </div>
    <div class="form-group">
    <div class="col-lg-6">

            <label for="SelectCausa">NOIDEPS</label>
            <input type="number" step="any" min="111111111" max="" name="NoIDEPS" class="form-control" id="NoIDEPS" readonly>
    </div>
    <div class="col-lg-6">

        <label for="SelectCausa">CodEPS</label>
        <select class="form-control" id="CodEPS" required>
            <option value="">--Seleccione--</option>
            <option value="EPS012">EPS012 -> Contributivo</option>
            <option value="EPSS12">EPSS12 -> Subsidiado</option>
        </select>
    </div>
    </div>
    <div class="form-group">
    <div class="col-lg-6">

            <label for="CuotaModer">Cuota moderadora</label>
            <input type="number" step="any" min="0" max=""  name="CuotaModer" class="form-control" id="CuotaModer" required>
    </div>
    </div>






