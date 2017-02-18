@extends('app')

@section('content')
<br><br>
    <h1>Reclutar profesor</h1>
    <hr>

    {!! Form::open(['url' => 'profesores/reclutar']) !!}
        @include('profesores.form',['submitButtonText'=>'Agregar profesor'])
    {!! Form::close() !!}

    @include('errors.list')

@stop
