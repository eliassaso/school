@extends('app')

@section('content')
        <article>
            <h1>{{ $article->title }}</h1>
            <div class="body">
                {{ $article->body }}
            </div>
        </article>

        {!! Form::open(['method'=>'DELETE', 'action' => ['ArticlesController@destroy', $article->id]]) !!}
            {!! Form::submit('Eliminar', ['class'=>'btn btn-primary'])  !!}
            {!! Html::link('/articles/'.$article->id.'/edit',
            'Editar', ['class'=>'btn btn-info'], false)!!}	
        {!! Form::close() !!}
@stop