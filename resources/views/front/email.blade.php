
        <br>
        <div style="/*font-family: 'Roboto', sans-serif; font-style : italic; font-size: 48px;*/" class="container-fluid panel panel-default" id="question">
        {!! Form::model(['method'=>'POST', 'action' => ['FrontController@sendMail']]) !!}
            <div class="form-group">
                {!! Form::hidden('idTema', $tema->id , ['class'=>'form-control'])  !!}
            </div>
            
            <h5 style="
            
              font-family: Roboto, sans-serif;
              font-size: 2.7em;
              font-weight: 100;
              line-height: 1em;
              letter-spacing: 0em;
              color: #1d6152;
              background-color: #fff;
              display: inline-block;
              margin-top: -0.7em;
              padding: 0.65em 0 0.65em 0.7em;

            " class="flow-text teal-text text-lighten-1">Preguntar al profesor  <i class="material-icons prefix">question_answer</i></h5>

            <div class="row">
                <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                {!! Form::label('correo','Escriba su correo',['for'=>'email', 'data-error'=>'wrong', 'data-success'=>'right'])  !!}
                {!! Form::email('email', null , ['class'=>'validate', 'type'=>'email', 'id'=>'email'])  !!}
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                <i class="material-icons prefix">mode_edit</i>
                <label for="content">Consulta</label>
                {!! Form::textarea('consulta', null , ['class'=>'materialize-textarea', 'length'=>'4000', 'name'=>'content', 'id'=>'content', 'rows'=>'10', 'cols'=>'80','wrap'=>'soft'])  !!}
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="red-text text-darken-2">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Submit -->
            <div class="form-group">
                {!! Form::submit('Enviar', ['class'=>'btn btn-primary form-control'])  !!}

        {!! Form::close() !!}

            </div>
        </div>
        <br>
