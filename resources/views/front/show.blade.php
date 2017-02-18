@extends('app')

@section('content')
    <div class="container" id = 'main' style="margin-top: 5px;">
@foreach($materia as $mat)
      <nav>
        <div class="row">
          <div class="col s12" style="margin-top: 40px;">
            <a style="margin-left: 10px;" href="/home" class="breadcrumb red-text">Principal</a>
            <a href="{{ url('/front/'.$mat->degree) }}" class="breadcrumb red-text">Grado {!! $mat->degree !!}</a>
            <a href="{{ url('/titulos/'.$mat->id) }}" class="breadcrumb red-text">{!! $mat->nombre_materia !!}</a>
            <a href="{{ url('/finalshow/'.$tema->id) }}" class="breadcrumb red-text">{!! $tema->title !!}</a>
          </div>
        </div>
      </nav>
@endforeach

        <article>

            <h4 style="

              font-family: Roboto, sans-serif;
              font-size: 2.7em;
              font-weight: 100;
              line-height: 1em;
              letter-spacing: 0em;
              color: #3a9682;
              display: inline-block;

            ">{{ $tema->title }}</h4><hr>

            <div class="body">
              <div class="form-group">
                {!! $tema->content !!}
              </div>
            </div>
        </article>
        <br>

        <!--<table class="table table-striped">-->
            <tr>
                <h4 style="

              font-family: Roboto, sans-serif;
              font-size: 2.7em;
              font-weight: 100;
              line-height: 1em;
              letter-spacing: 0em;
              color: #3a9682;
              display: inline-block;

            ">Preguntas</h4><hr>
            </tr>

                @foreach($preguntas as $pregunta)

                    <article>
                        <tr>
                        <td>
                <div class="col s12" style="border-bottom: 2px solid #c7c7c7;">

                    <h4>{{ $pregunta->pregunta }}</h4>

                    <form name="formulario{{ $pregunta->id }}" id="formulario{{ $pregunta->id }}">



                    <div class="btn-group row" data-toggle="buttons">

                    <p>
                      <input class="with-gap" type="radio" name="options{{ $pregunta->id }}" id="{{ $pregunta->id }}_1" autocomplete="off">
                      <label for="{{ $pregunta->id }}_1"><span style = "padding-left:5px; margin-right: 20px;">A </span></label>
                      <div class="col s12" style="padding-left: 20px; margin-left: 0px; margin-top: 5px;">
                          {{ $pregunta->respuesta_1 }}
                        </div><br>
                    </p>

                    <p>
                      <input class="with-gap" type="radio" name="options{{ $pregunta->id }}" id="{{ $pregunta->id }}_2" autocomplete="off">
                      <label for="{{ $pregunta->id }}_2"><span style = "padding-left:5px; margin-right: 20px;">B </span></label>
                      <div class="col s12" style="padding-left: 20px; margin-left: 0px; margin-top: 5px;">
                          {{ $pregunta->respuesta_2 }}
                        </div><br>
                    </p>

                    <p>
                      <input class="with-gap" type="radio" name="options{{ $pregunta->id }}" id="{{ $pregunta->id }}_3" autocomplete="off">
                      <label for="{{ $pregunta->id }}_3"><span style = "padding-left:5px; margin-right: 20px;">C </span></label>
                       <div class="col s12" style="padding-left: 20px; margin-left: 0px; margin-top: 5px;">
                          {{ $pregunta->respuesta_3 }}
                        </div><br>

                    </p>

                    <p>
                      <input class="with-gap" type="radio" name="options{{ $pregunta->id }}" id="{{ $pregunta->id }}_4" autocomplete="off">
                      <label for="{{ $pregunta->id }}_4"><span style = "padding-left:5px; margin-right: 20px;">D </span></label>
                      <div class="col s12" style="padding-left: 20px; margin-left: 0px; margin-top: 5px;">
                          {{ $pregunta->respuesta_4 }}
                        </div><br>
                    </p>




                        <button type="button" id="{{ $pregunta->id }}" value="{{ $pregunta->respuesta }}" class="waves-effect waves-light btn" onclick="respuestaCorrecta(this)">Aceptar</button>

                    </div>
                    <div id="noty-holder{{ $pregunta->id }}">
                    </div>
                  </form>

                  </div>
                            <input type="hidden" id="notificacion{{ $pregunta->id }}" value ="{{ $pregunta->notificacion }}"></input>
                            <input type="hidden" id="correcta{{ $pregunta->id }}" value="{{ $pregunta->respuesta }}"></input>
                            <input type="hidden" id="link{{ $pregunta->id }}" value="{{ $pregunta->link }}"></input>

                        </td>
                        </tr>
                    </article>

                @endforeach
        <!--</table>-->


        <br><!--<div id="player" class="video-container"></div>-->
         <div class="video-container">
        <iframe width="853" height="480" src="//www.youtube.com/embed/{{$tema->link}}?rel=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <br><br>

@stop
