@extends('layouts.app')

@section('content')
<div class="container">

<a href="{{ url('/superheroe/create') }}" class="btn btn-success" > Registrar un nuevo superhéroe </a>
</br>
</br>

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
            <img class="img-thumbnail img-fluid" src="{{ asset ('storage').'/'.$superheroe->Foto }}" width="50px" height="50x" alt="">
            </td>



            <td>{{ $superheroe->NombreReal }}</td>
            <td>{{ $superheroe->NombreSuperheroe }}</td>
            <td>{{ $superheroe->InformacionAdicional }}</td>
            <td>
                
            <a href="{{ url('/superheroe/'.$superheroe->id.'/edit') }}" class="btn btn-warning" >
                Editar
            </a>
            |

            <form action="{{ url('/superheroe/'.$superheroe->id ) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar este elemento?')" value='Borrar'>
            </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection