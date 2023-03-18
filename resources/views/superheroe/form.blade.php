<label for='NombreReal'> Nombre real</label>
    <input type="text" name="NombreReal" value="{{isset($superheroe->NombreReal)?$superheroe->NombreReal:' '}}" id="NombreReal"> 
    <br>
    <label for='NombreSuperheroe'> Nombre superhéroe</label>
    <input type="text" name="NombreSuperheroe" value="{{isset($superheroe->NombreSuperheroe)?$superheroe->NombreSuperheroe:' '}}" id="NombreSuperheroe"> 
    <br>
    <label for='Foto'> Foto del superhéroe</label>
    @if(isset($superheroe->Foto))
    <img width="50px" height="50x" src="{{asset('storage'.'/'.$superheroe->Foto)}}"/>
    @endif
    <input type="file" name='Foto' value='' id='Foto'>
    <br>
    <label for='InformacionAdicional'> Información adicional</label>
    <input type="text" name="InformacionAdicional" value="{{isset($superheroe->InformacionAdicional)?$superheroe->InformacionAdicional:' '}}"id="InformacionAdicional">
    <br>
    <input type="submit" value='Guardar cambios'>
    <br>
    <a href="{{url('/superheroe/')}}"> REGRESAR </a>