@extends('app')

@section('content')
    <div class="container-fluid panel panel-default">
    <h1>Crear nuevo tema</h1>
    <hr>

    {!! Form::open(['url' => 'temas']) !!}
        @include('temas.form',['submitButtonText'=>'Agregar tema'])
    {!! Form::close() !!}

    @include('errors.list')
    </div>

@stop