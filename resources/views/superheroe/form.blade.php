    <div class="form-group">
    <label for='NombreReal'> Nombre real</label>
    <input type="text" class="form-control" name="NombreReal" value="{{isset($superheroe->NombreReal)?$superheroe->NombreReal:' '}}" id="NombreReal"> 
    </div>

    <div class="form-group">
    <label for='NombreSuperheroe'> Nombre superhéroe</label>
    <input type="text" class="form-control" name="NombreSuperheroe" value="{{isset($superheroe->NombreSuperheroe)?$superheroe->NombreSuperheroe:' '}}" id="NombreSuperheroe"> 
    </div>

    <div class="form-group">
    <label for='Foto'></label>
    @if(isset($superheroe->Foto))
    <img class="img-thumbnail img-fluid" width="50px" height="50x" src="{{asset('storage'.'/'.$superheroe->Foto)}}"/>
    @endif
    <input type="file" class="form-control" name='Foto' value='' id='Foto'>
    </div>

    <div class="form-group">
    <label for='InformacionAdicional'> Información adicional</label>
    <input type="text" class="form-control" name="InformacionAdicional" value="{{isset($superheroe->InformacionAdicional)?$superheroe->InformacionAdicional:' '}}"id="InformacionAdicional">
    </div>

    <input class="btn btn-success" type="submit" value='Guardar cambios'>
    <a class="btn btn-primary" href="{{url('/superheroe/')}}"> REGRESAR </a>