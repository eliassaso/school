@extends('app')

@section('content')
<br><br>
    <h1>Crear nueva Materia</h1>
    <hr>

    {!! Form::open(['url' => 'materias']) !!}
        @include('materias.form',['submitButtonText'=>'Agregar materia'])
    {!! Form::close() !!}

    @include('errors.list')
<br><br>
@stop
