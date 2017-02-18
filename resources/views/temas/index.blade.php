@extends('app')

@section('content')
<br><br>
    <div class="container-fluid panel panel-default">
        <h1>Temas</h1>
        <h3>Materia: {{$materia->nombre_materia}}, grado: {{$materia->degree}} </h3>
        <table class="table table-striped">
            <tr>
                <td><strong>Temas</strong></td>
                <td><strong>Funciones</strong></td>
            </tr>

                @foreach($temas as $tema)

                    <article>
                        <tr>
                            <td><a href="/temas/{{ $tema->id  }}/edit"><h4>{{ $tema->title}} </h4></a></td>
                            <td>
                                <div class="ui buttons">
                                    <a class="btn-floating btn-large waves-effect waves-light red" id="{{$tema->id}}" data-title="assignDelete" data-toggle="modal" data-target="#delete" data-placement="top"><i class="material-icons">delete</i></a>
                                    <a class="btn-floating btn-large waves-effect waves-light green" href="/temas/{{$tema->id}}/edit" id="{{$tema->id}}" ><i class="material-icons">edit</i></a>
                                    <a class="btn-floating btn-large waves-effect waves-light blue" href="/preguntas/{{$tema->id}}" id="{{$tema->id}}" ><h4 style="margin-top: 10px;">?</h4><i class="material-icons">questio</i></a>
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
        <a class="waves-effect waves-light btn" href="/createma/{{$materia->id}}"
           role="button">Crear Tema</a>
        <a class="waves-effect waves-light btn" href="/dashboard"
           role="button">Volver</a>
    </div>
    <br><br>
@stop

@section('js')
    {!! Html::script('/js/main.js') !!}
@stop

@include('materias.delete')
