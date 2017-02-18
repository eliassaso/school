<!-- Title Form Input -->
<div class="container-fluid panel panel-default">

    {!! Form::hidden('id_materia', $id_materia, ['class'=>'form-control'])  !!}
    <!-- Body Form Input -->

    <div class="form-group">
        {!! Form::label('title','Nombre del título: ')  !!}
        {!! Form::text('title', null , ['class'=>'form-control'])  !!}
    </div>
    <div class="form-group">
        {!! Form::label('content','Contenido: ')  !!}
        {!! Form::textarea('content', null , ['class'=>'form-control ckeditor materialize-textarea', 'length'=>'8000', 'name'=>'content', 'id'=>'content', 'rows'=>'10', 'cols'=>'80','wrap'=>'soft','maxlength'=>'8000'])  !!}


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


<script languaje="javascript">


/*var num=1;

function saltar(value)
{


    if(value.length >= 155 * num)
    {

    //if (confirm("Desea seguir escribiendo!")) {
    //alert('Se dio un salto de Linia con exito');
    document.getElementById('content').value=value+' \n';

    //}
    //else{

    //alert("se cancelo salto de linea");
    //}

    ++num;
    }
}

*/

/*function saltar(event) {

    //content.setLineWrap(true);
    //content.setWrapStyleWord(true);

texto = content.value.length;
cant = content.cols;
limite = cant;
    if(texto == cant) {
        limite = cant;
    }
    else {
        for(i=1;i<1000;i++) {
            if(texto == (cant*i)) {
                limite = (cant*i);
            }
        }
    }
    if((texto == limite)||(event.KeyCode == 13)) {
        document.getElementById('acuerdos2').value=value+' \n';
        content.rows = content.rows+1;

    }
}*/

</script>
<!--<textarea name=txt ROWS="1" COLS="40" onKeyPress="saltar()"></textarea> -->

@if ($error!=null)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <li>{{ $error }}</li>
        </ul>
    </div>
@endif
