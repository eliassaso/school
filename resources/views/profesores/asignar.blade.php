@extends('app')

@section('content')
<br><br>
    <div class="container-fluid panel panel-default">
        <h1>Materias sin asignación</h1>
        <h2>Profesor: {{$user->name}}</h2>
        <table class="table table-striped">
            <tr>
                <td><strong>Grado</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Asignar</strong></td>
            </tr>

            @foreach($materias as $materia)

                <article>
                    <tr>
                        <td><a href="/materias/{{ $materia->id  }}/edit"><h4>{{ $materia->degree }}</h4></a></td>
                        <td><h4>{{$materia->nombre_materia}}</h4></td>
                        <td class="">
                            {!! Form::open(['url' => 'profesores/asignar',
                                 'method' => 'POST',
                                 'class' => 'formDelete',
                                  'id' => 'form'.$materia->id]) !!}
                            <div class="ui buttons">
                                {!! Form::hidden('id_profesor',$user->id, ['class'=>'form-control'])  !!}
                                {!! Form::hidden('id_materia', $materia->id, ['class'=>'form-control'])  !!}
                                <button type="submit" class="btn-floating btn-large waves-effect waves-light blue btn tooltipped" data-position="right" data-delay="50" data-tooltip="Asignar"><i class="material-icons">play_for_work</i></button>
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
    </div>
@stop

@section('js')
    {!! Html::script('/js/main.js') !!}
@stop
