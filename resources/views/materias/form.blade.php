<!-- Title Form Input -->
<br><br>
<div class="container-fluid">
    <div class="form-group input-field col s12">
        {!! Form::label('degree','Grado: ')  !!}
        {!! Form::select('degree', array('1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5','6' => '6',
        '7' => '7','8' => '8','9' => '9','10' => '10','11' => '11',), null, array('class'=>'form-control browser-default'))  !!}
    </div>

    <!-- Body Form Input -->
    <div class="form-group">
        {!! Form::label('nombre_materia','Nombre materia: ')  !!}
        {!! Form::text('nombre_materia', null , ['class'=>'form-control'])  !!}
    </div>

    <!-- Submit -->
    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class'=>'btn form-control'])  !!}
    </div>
</div>

@if ($error!=null)
    <div>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <li class="red-text text-lighten-1">{{ $error }}</li>
        </ul>
    </div>
@endif
<br><br>
