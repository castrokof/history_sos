<div class="form-group row">
    <div class="col-lg-3">
        <label for="fecha" class="col-xs-4 control-label ">Tipo documento</label>
        <select name="type_document" id="type_document" class="form-control select2bs4" style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="AS">AS</option>
            <option value="CC">CC</option>
            <option value="CE">CE</option>
            <option value="MS">MS</option>
            <option value="NI">NI</option>
            <option value="NU">NU</option>
            <option value="PE">PE</option>
            <option value="RC">RC</option>
            <option value="TI">TI</option>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="Documento" class="col-xs-4 control-label">Documento</label>
        <input type="number" name="document" id="document" class="form-control" value="{{old('document')}}" required >
    </div>
    <div class="col-lg-6 align-bottom">
        <label for="consultar" class="col-xs-4 control-label">.</label><br>
    <button type="button" id="consultar" class="btn btn-success btn-bottom-left">Consultar</button><button type="button" id="enviar" class="btn btn-warning btn-bottom-left">Limpiar</button>
    </div>
        {{-- <div class="col-lg-6">
        <label for="prescripcion" class="col-xs-4 control-label ">Prescripcion</label>
        <textarea name="prescripcion" id="prescripcion" class="textarea form-control" rows="3" placeholder="Enter ..." ></textarea>
       <input type="textarea" name="prescripcion" id="prescripcion" class="form-control" value="{{old('prescripcion')}}" minlength="6"  >
    </div> --}}
</div>




