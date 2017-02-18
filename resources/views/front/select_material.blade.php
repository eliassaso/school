@extends('app')

@section('content')

<div class="container" style="margin-top: 5px;">


<div class="row">
<div class="col s12">

  <nav>
    <div class="row">
      <div class="col s12" style="margin-top: 40px;">
        <a style="margin-left: 10px;" href="/home" class="breadcrumb red-text">Principal</a>
        <a href="{{ url('/front/'.$id) }}" class="breadcrumb red-text">Grado {!! $id !!}</a>
      </div>
    </div>
  </nav>

    <ul style="font-family: Roboto, sans-serif;
                  font-size: 2.2em;
                  /*font-style: italic;*/
                  font-weight: 200;
                  line-height: 1.5em;
                  letter-spacing: 0em;
                  color: #26a69a;
                  background-color: #fff;
                  /*display: inline-block;*/
    " class="collection with-header z-depth-2">

    @if(count($nombre_materias)>0) @foreach ($nombre_materias as $nombre_materia)
    <li class="collection-item" style="



    "><div class="">{!! $nombre_materia->nombre_materia !!} <a style="color:#867777;" class="secondary-content" href="{{ url('/titulos/'.$nombre_materia->id) }}" title=""><i class="material-icons">send</i></a></div></li>
    @endforeach
    @endif
    </ul>
</div>
</div>

</div>

@stop
