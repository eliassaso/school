@extends('app')
@section('content')


    <div class="container z-depth-3" id = 'main' style="">

        @if (!Auth::guest() && Auth::user()->roll == 'estudiante')

            <div class="carousel" style="border-bottom: 2px solid #c7c7c7; margin-top:50px; background-color:white;">

                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/1') }}"><h1>1</h1><!--<img style="width: 200px;height: 200px;" src="img/uno">--></a>
                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/2') }}"><h1>2</h1><!--<img style="width: 200px;height: 200px;" src="img/dos">--></a>
                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/3') }}"><h1>3</h1><!--<img style="width: 200px;height: 200px;" src="img/tres">--></a>
                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/4') }}"><h1>4</h1><!--<img style="width: 200px;height: 200px;" src="img/cuatro">--></a>
                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/5') }}"><h1>5</h1><!--<img style="width: 200px;height: 200px;" src="img/cinco">--></a>
                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/6') }}"><h1>6</h1><!--<img style="width: 200px;height: 200px;" src="img/seis">--></a>
                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/7') }}"><h1>7</h1><!--<img style="width: 200px;height: 200px;" src="img/siete">--></a>
                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/8') }}"><h1>8</h1><!--<img style="width: 200px;height: 200px;" src="img/ocho">--></a>
                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/9') }}"><h1>9</h1><!--<img style="width: 200px;height: 200px;" src="img/nueve">--></a>
                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/10') }}"><h1>10</h1><!--<img style="width: 200px;height: 200px;" src="img/diez">--></a>
                <a style="text-align: center;" class="carousel-item" href="{{ url('/front/11') }}"><h1>11</h1><!--<img style="width: 200px;height: 200px;" src="img/once">--></a>





                <!--<a style="text-align: center;" class="carousel-item" href="#two!"><img style="width: 200px;height: 200px;" src="img/dos"> <button class="waves-effect waves-light btn alin-center" id='2' onclick="getTemas(id)">Segundo</button></a>
                <a style="text-align: center;" class="carousel-item" href="#three!"><img style="width: 200px;height: 200px;" src="img/tres"> <button class="waves-effect waves-light btn alin-center" id='3' onclick="getTemas(id)">Tercero</button></a></a>
                <a style="text-align: center;" class="carousel-item" href="#four!"><img style="width: 200px;height: 200px;" src="img/cuatro"> <button class="waves-effect waves-light btn alin-center" id='4' onclick="getTemas(id)">Cuarto</button></a></a>
                <a style="text-align: center;" class="carousel-item" href="#five!"><img style="width: 200px;height: 200px;" src="img/cinco"> <button class="waves-effect waves-light btn alin-center" id='5' onclick="getTemas(id)">Quinto</button></a></a>
                <a style="text-align: center;" class="carousel-item" href="#six!"><img style="width: 200px;height: 200px;" src="img/seis"> <button class="waves-effect waves-light btn alin-center" id='6' onclick="getTemas(id)">Sexto</button></a></a>
                <a style="text-align: center;" class="carousel-item" href="#seven!"><img style="width: 200px;height: 200px;" src="img/siete"> <button class="waves-effect waves-light btn alin-center" id='7' onclick="getTemas(id)">Séptimo</button></a></a>
                <a style="text-align: center;" class="carousel-item" href="#eigh!"><img style="width: 200px;height: 200px;" src="img/ocho"> <button class="waves-effect waves-light btn alin-center" id='8' onclick="getTemas(id)">Octavo</button></a></a>
                <a style="text-align: center;" class="carousel-item" href="#nine!"><img style="width: 200px;height: 200px;" src="img/nueve"> <button class="waves-effect waves-light btn alin-center" id='9' onclick="getTemas(id)">Noveno</button></a></a>
                <a style="text-align: center;" class="carousel-item" href="#ten!"><img style="width: 200px;height: 200px;" src="img/diez"> <button class="waves-effect waves-light btn alin-center" id='10' onclick="getTemas(id)">Décimo</button></a></a>
                <a style="text-align: center;" class="carousel-item" href="#eleven!"><img style="width: 200px;height: 200px;" src="img/once"> <button class="waves-effect waves-light btn alin-center" id='11' onclick="getTemas(id)">Undécimo</button></a></a>-->

            </div>


            <!--<div class="login-body">
              <article class="container-login center-block">
                  <section>
                      <ul id="top-bar" class="nav nav-tabs nav-justified">
                          <li class="active"><a href="#login-access">Ingrese el código recibido por sms.</a></li>
                      </ul>
                      <div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12" style="text-align: center;">
                          <div id="login-access" class="tab-pane fade active in">
                              <h2><i class="glyphicon glyphicon-log-in"></i> Accesso</h2>
                              <form method="post" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal">
                                  <div class="form-group">

                                          <input type="password" class="form-group" style="text-align: center;" name="password" id="password" placeholder="Password" value="" tabindex="2" />
                                  </div>

                                  <br/>
                                  <div>
                                          <button type="submit" name="log-me-in" id="submit" tabindex="5" class="btn btn-lg btn-primary">Entra</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </section>
              </article>
          </div>-->


        @endif

    </div>

@endsection
