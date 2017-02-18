@extends('app')
@section('content')

<div style='margin-top: 10px;' class="container-fluid" id = 'main'>
<div class="col s12">

        <div class="col s12" id="">
        {!! Form::open(['method'=>'POST', 'action' => ['FrontController@includeNewToken']]) !!}
            <div class="form-group">
                {!! Form::hidden('idTema', $id, ['class'=>'form-control'])  !!}
            </div>
            <br><br>
            <div class="form-group input-field col s12">
                {!! Form::label('degree','Grado: ')  !!} <br><br>
                {!! Form::select('degree', array('1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5','6' => '6',
                '7' => '7','8' => '8','9' => '9','10' => '10','11' => '11',), null, array('class'=>'form-control browser-default'))  !!}
            </div>
            <div class="col s6">
                {!! Form::label('licencia','Digite su licencia')  !!}
                {!! Form::text('licencia', null , ['class'=>'col s6'])  !!}
            </div>

            <!-- Submit -->
            <button class = 'waves-effect waves-light btn left hoverable' type = "submit">
                {!! Form::submit('Enviar', ['class' => ''])  !!}
            </button>


        {!! Form::close() !!}

        <br><br>
        <span class = "red-text darken-1">{!! $mensaje !!}</span>

        </div>

</div>
</div>

@endsection
