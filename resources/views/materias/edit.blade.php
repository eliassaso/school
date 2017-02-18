@extends('app')

@section('content')
<br><br>
    <div class="container-fluid panel panel-default">
    <h1>Editando: {!! $materia->nombre_materia  !!}</h1>
    <hr>

    {!! Form::model($materia, ['method'=>'PATCH', 'action' => ['MateriasController@update', $materia->id]]) !!}
        @include('materias.form',['submitButtonText'=>'Actualizar materia'])
    {!! Form::close() !!}

    @include('errors.list')
    </div>
<br><br>
@stop
