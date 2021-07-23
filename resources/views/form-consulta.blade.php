<div class="form-group row">
    <div class="col-lg-3">
        <label for="fecha" class="col-xs-4 control-label ">Fecha</label>
        <input type="date" name="fechaini" id="fechaini" class="form-control" value="{{old('fechaini')}}" >
    </div>
    <div class="col-lg-3">
        <label for="snombre" class="col-xs-4 control-label ">Fecha final</label>
        <input type="date" name="fechafin" id="fechafin" class="form-control" value="{{old('fechafin')}}" >
    </div>
    <div class="col-lg-6">
        <label for="prescripcion" class="col-xs-4 control-label ">Prescripcion</label>
        <textarea name="prescripcion" id="prescripcion" class="textarea form-control" rows="3" placeholder="Enter ..." ></textarea>
        {{-- <input type="textarea" name="prescripcion" id="prescripcion" class="form-control" value="{{old('prescripcion')}}" minlength="6"  > --}}
    </div>
</div>




 