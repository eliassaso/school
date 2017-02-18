@extends('app')

@section('content')
<br><br>
    <div class="container-fluid panel panel-default">
    <h1>Crear pregunta</h1>
    <hr>

    {!! Form::open(['url' => 'preguntas']) !!}
        @include('preguntas.form',['submitButtonText'=>'Agregar pregunta'])
    {!! Form::close() !!}

    @include('errors.list')
    </div>
    <br><br>

@stop
