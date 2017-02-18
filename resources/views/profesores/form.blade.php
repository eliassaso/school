 <!-- Title Form Input -->
 <br><br>
<div class="container-fluid">


    <!-- Body Form Input -->
    <div class="form-group">
        {!! Form::label('charter','Numero de cedula: ')  !!}
        {!! Form::text('charter', null , ['class'=>'form-control'])  !!}
    </div>

    <!-- Submit -->

        {!! Form::submit($submitButtonText, ['class'=>'btn'])  !!}

</div>

@if ($error!=null)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <li>{{ $error }}</li>
        </ul>
    </div>
@endif
