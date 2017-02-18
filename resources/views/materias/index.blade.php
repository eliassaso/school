@extends('app')

@section('content')
<br><br>
    <div class="container-fluid panel panel-default">
        <h1>Materias</h1>
        <table class="table table-striped">
            <tr>
                <td><strong>Materias</strong></td>
                <td><strong>Borrar</strong></td>
            </tr>

                @foreach($materias as $materia)

                    <article>
                        <tr>
                            <td><a href="/materias/{{ $materia->id  }}/edit"><h4>{{ $materia->degree}} - {{$materia->nombre_materia}} </h4></a></td>
                            <td>
                                {!! Form::open(['url' => 'materias/'.$materia->id,
                                     'method' => 'DELETE',
                                     'class' => 'formDelete',
                                      'id' => 'form'.$materia->id]) !!}
                                <div class="ui buttons">
                                    <a class="btn btn-danger glyphicon glyphicon-trash" id="{{$materia->id}}" data-title="assignDelete" data-toggle="modal" data-target="#delete" data-placement="top"><i class="icon Delete"></i>Delete</a>
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
        {!! $materias->render() !!}
        <br>
        <a class="waves-effect waves-light btn" href="{{ url('materias/create') }}"
           role="button">Crear materia</a>
    </div>
    <br><br>
@stop

@section('js')
    {!! Html::script('/js/main.js') !!}
@stop

@include('materias.delete')
