<!-- Title Form Input -->
<div class="container-fluid panel panel-default">

    {!! Form::hidden('id_tema', $id, ['class'=>'form-control'])  !!}
    <!-- Body Form Input -->

    <div class="form-group">
        {!! Form::label('pregunta','Pregunta: ')  !!}
        {!! Form::textarea('pregunta', null , ['class'=>'form-control'])  !!}
    </div>
    <br>
    <div class="form-group">
        {!! Form::label('respuesta_1','respuesta_1:')  !!}
        {!! Form::textarea('respuesta_1', null , ['class'=>'form-control'])  !!}
    </div>
    <div class="form-group">
        {!! Form::label('respuesta_2','respuesta_2:')  !!}
        {!! Form::textarea('respuesta_2', null , ['class'=>'form-control'])  !!}
    </div>
    <div class="form-group">
        {!! Form::label('respuesta_3','respuesta_3:')  !!}
        {!! Form::textarea('respuesta_3', null , ['class'=>'form-control'])  !!}
    </div>
    <div class="form-group">
        {!! Form::label('respuesta_4','respuesta_4:')  !!}
        {!! Form::textarea('respuesta_4', null , ['class'=>'form-control'])  !!}
    </div>
    <br>
    <div class="form-group">
        {!! Form::label('respuesta','Respuesta Correcta: ')  !!}
        {!! Form::select('respuesta', array('1' => 'respuesta_1', '2' => 'respuesta_2','3' => 'respuesta_3','4' => 'respuesta_4',), null, array('class'=>'form-control'))  !!}
    </div>
    <div class="form-group">
        {!! Form::label('notificacion','Notificación: ')  !!}
        {!! Form::textarea('notificacion', null , ['class'=>'form-control'])  !!}
    </div>
    <div class="form-group">
        {!! Form::label('link','Agregar link de video ')  !!}
        {!! Form::text('link', null , ['class'=>'form-control'])  !!}
    </div>

    <!-- Submit -->
    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control'])  !!}
    </div>
</div>

@if ($error!=null)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <li>{{ $error }}</li>
        </ul>
    </div>
@endif