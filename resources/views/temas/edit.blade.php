@extends('app')

@section('content')
<br><br>
    <div class="container-fluid panel panel-default">
    <h1>Editando: {!! $tema->title  !!}</h1>
    <hr>

    {!! Form::model($tema, ['method'=>'PATCH', 'action' => ['TemasController@update', $tema->id]]) !!}
        @include('temas.form',['submitButtonText'=>'Actualizar Tema'])
    {!! Form::close() !!}

    @include('errors.list')
    </div>
<br><br>
@stop
