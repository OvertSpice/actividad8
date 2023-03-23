@extends('layouts.app')

@section('content')
<div class="container">

<a href="{{ url('/superheroe/create') }}"> Registrar un nuevo superhéroe </a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>NombreReal</th>
            <th>NombreSuperheroe</th>
            <th>InformacionAdicional</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $superheroes as $superheroe )
        <tr>
            <td>{{ $superheroe->id }}</td>
            <td>
            <img src="{{ asset ('storage').'/'.$superheroe->Foto }}" width="50px" height="50x" alt="">
            </td>



            <td>{{ $superheroe->NombreReal }}</td>
            <td>{{ $superheroe->NombreSuperheroe }}</td>
            <td>{{ $superheroe->InformacionAdicional }}</td>
            <td>
                
            <a href="{{ url('/superheroe/'.$superheroe->id.'/edit') }}">
                Editar
            </a>

            <form action="{{ url('/superheroe/'.$superheroe->id ) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('¿Deseas borrar este elemento?')" value='Borrar'>
            </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection