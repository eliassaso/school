@extends('app')

@section('content')
<br><br>
    <div class="container-fluid panel panel-default">
        <h1>Sus materias</h1>
        <table class="table table-striped">
            <tr>
                <td><strong>Grado</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Ver temas</strong></td>
            </tr>

            @foreach($materias as $materia)

                <article>
                    <tr>
                        <td><h4>{{ $materia->degree }}</h4></td>
                        <td><h4>{{$materia->nombre_materia}}</h4></td>
                        <td class="">
                            {!! Form::open(['url' => 'temas/'.$materia->id,
                                 'method' => 'GET',
                                 'class' => 'formDelete',
                                  'id' => 'form'.$materia->id]) !!}
                            <div class="ui buttons">
                                {!! Form::hidden('id_materia', $materia->id, ['class'=>'form-control'])  !!}
                                <button type="submit" class="waves-effect waves-light btn-large btn tooltipped" data-position="right" data-delay="50" data-tooltip="Ver tema"><i class="material-icons">send</i></button>
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    {{--
                        <a href="{{ action('ArticlesController@show', [$article->id]) }}"><h2>{{ $article->title }}</h2></a>
                        <a href="{{ url('/articles', $article->id) }}"><h2>{{ $article->title }}</h2></a>
                    --}}

                    <div class="body">

                    </div>
                </article>

            @endforeach
        </table>
        <br>
        <a class="waves-effect waves-light btn-large" href="/home"
           role="button">Volver</a>
    </div>
@stop

@section('js')
    {!! Html::script('/js/main.js') !!}
@stop
