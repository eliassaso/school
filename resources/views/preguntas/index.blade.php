@extends('app')

@section('content')
<br><br>
    <div class="container-fluid panel panel-default">
        <h1>Preguntas</h1>
        <h3>Tema: {{$tema->title}}</h3>
        <table class="table table-striped">
            <tr>
                <td><strong>Preguntas</strong></td>
                <td><strong>Funciones</strong></td>
            </tr>

                @foreach($preguntas as $pregunta)

                    <article>
                        <tr>
                            <td><a href="/temas/{{ $pregunta->id  }}/edit"><h4>{{ $pregunta->pregunta}} </h4></a></td>
                            <td>
                                <div class="ui buttons">
                                    <a class="btn-floating btn-large waves-effect waves-light red" id="{{$pregunta->id}}"  data-title="assignDelete" data-toggle="modal" data-target="#delete" data-placement="top"><i class="material-icons">delete</i></a>
                                    <a class="btn-floating btn-large waves-effect waves-light green" href="/preguntas/{{$pregunta->id}}/edit"  id="{{$pregunta->id}}"><i class="material-icons">edit</i></a>
                                </div>
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
        <a class="waves-effect waves-light btn" href="/creapregunta/{{$tema->id}}"
           role="button">Crear pregunta para este tema</a>
        <a class="waves-effect waves-light btn" href="/temas/{{$tema->id_materia}}"
           role="button">Volver</a>
    </div>
    <br><br>
@stop

@section('js')
    {!! Html::script('/js/main.js') !!}
@stop

@include('materias.delete')
