@extends('app')

@section('content')
<br><br>
    <div class="container-fluid panel panel-default">
        <h1>Profesores</h1>
        <table class="table table-striped">
            <tr>
                <td><strong>Profesores</strong></td>
                <td><strong>Cédula</strong></td>
                <td><strong>Funciones</strong></td>
            </tr>

                @foreach($profesores as $profesor)

                    <article>
                        <tr>
                            <td><a href="/profesores/{{ $profesor->id  }}/edit"><h4>{{ $profesor->name}}  {{$profesor->last_name}} </h4></a></td>
                            <td><h4>{{$profesor->charter}}</h4></td>
                            <td class="navbar-right">
                                <div class="ui buttons">
                                    <a href="/profesores/{{$profesor->id}}/impartidas" class="btn-floating btn-large waves-effect waves-light blue btn tooltipped" data-position="left" data-delay="50" data-tooltip="Impartidas" id="{{$profesor->id}}"><i class="material-icons">play_for_work</i></a>
                                    <a href="/profesores/{{$profesor->id}}/edit" class="btn-floating btn-large waves-effect waves-light green btn tooltipped" data-position="right" data-delay="50" data-tooltip="Asignar" id="{{$profesor->id}}"><i class="material-icons">input</i></a>
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
        {!! $profesores->render() !!}
        <br>
    </div>
@stop

@section('js')
    {!! Html::script('/js/main.js') !!}
@stop

@include('profesores.delete')
