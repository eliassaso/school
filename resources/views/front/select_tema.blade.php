@extends('app')

@section('content')

<div class="container" style="margin-top: 5px;">
<div class="row">
<div class="col s12">

  <nav>
    <div class="row">
      <div class="col s12" style="margin-top: 40px;">
        <a style="margin-left: 10px;" href="/home" class="breadcrumb red-text">Principal</a>
        <a href="{{ url('/front/'.$materia->degree) }}" class="breadcrumb red-text">Grado {!! $materia->degree !!}</a>
        <a href="{{ url('/titulos/'.$materia->id) }}" class="breadcrumb red-text">{!! $materia->nombre_materia !!}</a>
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

    @if(count($temas)>0) @foreach ($temas as $tema)
    <li class="collection-item" style="



    "><div class="">{!! $tema->title !!} <a style="color:#867777;" class="secondary-content" href="{{ url('/finalshow/'.$tema->id) }}" title=""><i class="material-icons">send</i></a></div></li>
    @endforeach
    @endif
    </ul>
</div>
</div>
</div>

@stop
