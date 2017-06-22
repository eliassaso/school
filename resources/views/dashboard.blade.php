<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title>Mi cole virtual</title>
  <link rel="shortcut icon" href="http://micolecr.com/img/estudiante.png">

	{!! Html::style('/css/materialize.css') !!}
	{!! Html::style('/css/style.css') !!}
	{!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}

</head>
<body>
<!--nav-->
<nav class="navbar navbar-custom navbar-fixed-top" role="">
	<div class="container">
		<div class="nav-wrapper">
			<!--<a href="/" class="brand-logo z-depth-2" style="background-color:#ffb300; height:100px; font-family: 'Rockwell Extra Bold', 'Rockwell Bold', monospace;
	font-size: 24px;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	line-height: 26.4px;
  padding-left: 5px;
  padding-top: 10px;
  margin-top: 5px;"><strong style="font-size: 28px;">Mi Cole Virtual</strong> <br> <small> El futuro en mis manos.</small></a>-->
			<div class="navbar-header page-scroll">

			</div>
			<a class="navbar-brand" href="#"></a>


		<!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">-->
      <ul class="left hide-on-med-and-down">
        <li>	<a href="/" class="brand-logo z-depth-2" style="background-color:#ffb300; height:100px; font-family: 'Rockwell Extra Bold', 'Rockwell Bold', monospace;
    	font-size: 24px;
    	font-style: normal;
    	font-variant: normal;
    	font-weight: 500;
    	line-height: 26.4px;
      padding-left: 5px;
      padding-top: 10px;
      margin-top: 5px;"><strong style="font-size: 28px;">Mi Cole Virtual</strong> <br> <small> El futuro en mis manos.</small></a></li>
      </ul>
			<ul class="right hide-on-med-and-down">
				<!--<li><a href="{{ url('/') }}">Home</a></li>-->
				@if (!Auth::guest() && Auth::user()->roll == 'estudiante')

				@endif
				@if (!Auth::guest() && Auth::user()->roll == 'profesor')
					<li><a href="{{ url('/dashboard') }}">Temas</a></li>
					<!--<li><a href="{{ url('/profesores') }}"></a></li>-->
				@endif
				@if (!Auth::guest() && Auth::user()->roll == 'admin')
					<li><a href="{{ url('/materias') }}">Materias</a></li>
					<li><a href="{{ url('/profesores') }}">Profesores</a></li>
				@endif
			<!--</ul>

			<ul class="nav navbar-nav navbar-right">-->
				@if (Auth::guest())
        <li style="background-color:#81c784; margin-right:5px; margin-top: 5px;" class="z-depth-2"><a href="{{ url('/niveles') }}">Niveles</a></li>
        <li style="background-color:#7986cb; margin-right:5px; margin-top: 5px;" class="z-depth-2"><a href="{{ url('/guia') }}">¿Cómo puedo estudiar?</a></li>
        <li style="background-color:#ff80ab; margin-right:5px; margin-top: 5px;" class="z-depth-2"><a href="{{ url('/calendarios') }}">Información y Calendarios</a></li>
        <li style="background-color:#ff5722; margin-right:5px; margin-top: 5px;" class="z-depth-2"><a href="{{ url('/motivacion') }}">Área de motivación</a></li>
				@else
				<ul id="dropdown1" class="dropdown-content">
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li><a href="{{ url('/user') }}">Perfil</a></li>
				  <!--<li><a href="#!">two</a></li>
				  <li class="divider"></li>
				  <li><a href="#!">three</a></li>-->
				</ul>

				<li style="background-color:#81c784; margin-right:5px; margin-top: 5px;"><a class="dropdown-button z-depth-2" href="#!" data-activates="dropdown1">{{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i></a>
                </li>
				@endif
			</ul>

			<ul id="nav-mobile" class="side-nav">
				@if (!Auth::guest() && Auth::user()->roll == 'estudiante')

				@endif
				@if (!Auth::guest() && Auth::user()->roll == 'profesor')
					<li><a href="{{ url('/dashboard') }}">Temas</a></li>
					<!--<li><a href="{{ url('/profesores') }}"></a></li>-->
				@endif
				@if (!Auth::guest() && Auth::user()->roll == 'admin')
					<li><a href="{{ url('/materias') }}">Materias</a></li>
					<li><a href="{{ url('/profesores') }}">Profesores</a></li>
				@endif
			<!--</ul>

			<ul class="nav navbar-nav navbar-right">-->
				@if (Auth::guest())
        <li>	<a href="/" class="z-depth-2" style="background-color:#ffb300; height:100px; font-family: 'Rockwell Extra Bold', 'Rockwell Bold', monospace;
      font-size: 24px;
    	font-style: normal;
    	font-variant: normal;
    	font-weight: 500;
    	line-height: 26.4px;
      padding-left: 5px;
      padding-top: 10px;"><strong style="font-size: 28px;">Mi Cole Virtual</strong> <br> <small> El futuro en mis manos.</small></a></li>
        <li style="background-color:#81c784; margin-right:5px; margin-top: 5px;" class="z-depth-2"><a href="{{ url('/niveles') }}">Niveles</a></li>
        <li style="background-color:#7986cb; margin-right:5px; margin-top: 5px;" class="z-depth-2"><a href="{{ url('/guia') }}">¿Cómo puedo estudiar?</a></li>
        <li style="background-color:#ff80ab; margin-right:5px; margin-top: 5px;" class="z-depth-2"><a href="{{ url('/calendarios') }}">Información y Calendarios</a></li>
        <li style="background-color:#ff5722; margin-right:5px; margin-top: 5px;" class="z-depth-2"><a href="{{ url('/motivacion') }}">Área de motivación</a></li>
				@else
				<ul id="dropdown2" class="dropdown-content">
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li><a href="{{ url('/user') }}">Perfil</a></li>
				  <!--<li><a href="#!">two</a></li>
          <li class="divider"></li>
          <li><a href="#!">three</a></li>-->
				</ul>

				<li style="background-color:#81c784; margin-right:5px; margin-top: 5px;"><a class="dropdown-button z-depth-2" href="#!" data-activates="dropdown2">{{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i></a>
                </li>
				@endif
			</ul>

			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>

		</div>
	</div>
</nav>
<!--end nav-->

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="section">
      <br><br>
      <div class="row">

        <div class="col s12 m4" style="margin-top:70px;">
          <div class="col s10 m12" style="border-right:#ffa726 1px solid;">

              <form class="" role="form" method="POST" action="{{ url('/login') }}" style="">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="row">
                        <div class="input-field col s12">

                          <i class="material-icons prefix">account_circle</i>
                          <input type="email" class="" name="email" value="{{ old('email') }}">
                          <label class="orange-text" for="email">E-mail</label>

                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="small material-icons prefix">vpn_key</i>
                          <input type="password" class="" name="password">
                          <label class="orange-text" for="password">Contraseña</label>
                        </div>
                      </div>

                  <button style="" type="submit" class="waves-effect waves-light btn right hoverable"><i class="large material-icons right">lock_open</i>Aceptar</button>
                  <br><br>
                  <label style=''><a class='right write-text' href="{{ url('/token') }}"><b>Olvido su contraseña?</b></a></label>

              </form>

              <br><br>
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <strong class='red-text'>Whoops!</strong> <p class='red-text'>Revisar usuario o contraseña!!.</p>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li class='red-text'>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif


          </div>
        </div>

        <div class="col s12 m8" style="">
            <h4 class="left orange-text">Mi Cole Virtual. . . <small> el futuro en mis manos.</small></h4>
            <div class="row center flow-text"> <br><br>
              <p class="left-align"><small>Bienvenido a tu oportunidad de mejorar académicamente, aprender y prepararte para las
              pruebas de tu nivel.</small></p>
              <p class="left-align"><small>Te brindaremos contenidos, múltiples ejercicios y sus explicaciones, con imágenes que te ayudarán a comprender mejor.</small></p>
              <p class="left-align"><small>Y lo mejor, puedes tener acceso por medio de celular, tablet, computadora las 24 horas del día,
              para repasar o adelantar los temas de tu nivel, ya que todo estará al alcance de tus manos.</small></p>
            </div>
            <div class="row center">
                <a href="{{ url('/register') }}" id="download-button" class="btn-large waves-effect waves-light orange lighten-1">Registrarse</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">

          <div class="card">
              <div class="card-image">
                <img style="height:150px; with:300px" src="/img/uno.jpg">

              </div>
              <div class="card-content" style="height:550px;">
                  <span class="card-title"><strong>Nivel Escolar.</strong></span>
                <p>Repasa los contenidos que viste en clase.
                  Amplia los temas.
                  Realiza múltiples ejercicios para estar súper
                  preparado.
                  Siempre tendrás la posibilidad de repasar la
                  explicación de un tema y realizar tus
                  consultas en un foro donde te responderá
                  a un Docente altamente calificado.
                </p>
              </div>
              <div class="center card-action" style="background-color:#1de9b6; height:85px;">
                <a href="#"><strong>Nivel Escolar</strong></a>
              </div>
            </div>
        </div>

        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img style="height:150px; with:300px" src="/img/dos.jpg">
            </div>
            <div class="card-content" style="height:550px;">
                <span class="card-title"><strong>Nivel Secundaria.</strong></span>
              <p>Repasa los contenidos que viste en clase a tu propio
                ritmo, y la cantidad de veces que lo desees.
                Realiza múltiples ejercicios para estar súper preparado y
                revisa las explicaciones de la respuesta.
                Siempre tendrás la posibilidad de repasar la explicación
                de un tema y realizar tus consultas en un foro donde te
                responderá a un Docente altamente calificado.
              </p>
            </div>
            <div class=" center card-action" style="background-color:#00acc1; height:85px;">
              <a href="#"><strong>Nivel Secundaria</strong></a>
            </div>
          </div>
      </div>

      <div class="col s12 m4">
        <div class="card">
          <div class="card-image">
            <img style="height:150px; with:300px" src="/img/tres.jpg">
          </div>
          <div class="card-content" style="height:550px;">
              <span class="card-title"><strong>Educación Abierta y Bachillerato por Madurez.</strong></span>
            <p>No tienes que asistir a una institución con un horario
                definido. Puedes utilizar tu tiempo de acuerdo a tus
                necesidades.
                Te prepararás para realizar las pruebas, sin la
                necesidad de comprar libros, ni movilizarte a ningún
                lugar a estudiar. Estudias donde te sientas cómodo.
                Estudia y repasar a tu propio ritmo, las veces que
                quieras y realiza tus consultas en un foro donde te
                responderá a un Docente altamente calificado.
            </p>
          </div>
          <div class="center card-action" style="background-color:#e53935; height:85px;">
            <a href="#"><strong>Educación Abierta y Bachillerato por Madurez</strong></a>
          </div>
        </div>
    </div>
    </div>
    </div>

    <div class="section">

    </div>
  </div>
  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
</section>


<!--<div class="jumbotron">
<h1>isw811</h1>

</div>-->


{!! Html::script('/js/jquery-1.11.3.min.js') !!}
{!! Html::script('/js/materialize.min.js') !!}
{!! Html::script('/js/init.js') !!}
{!! Html::script('/js/main.js') !!}



</body>
</html>
