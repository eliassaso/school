<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Materia;
use App\Temas;
use App\Preguntas;
use App\Profesor;
use App\Token;
use Auth;
use DB;


//se alinea el texto con control+alt gr+ slash inverto(despues del numero 0 en el signo de pregunta)
//se alinea los simbolos con control+alt+]  (=, . , ; entre otros)
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function listaMaterias($id)
    {
        /*$error = null;
        $materias =
            DB::table('materias')
                ->select('*')
                ->where('degree', '=', $id)
                ->orderBy('degree', 'ASC')
                ->get();
        return view('front.index', compact('materias','error'));*/
    }

    public function listaTemas($id)
    {
        $temas =
          DB::table('temas')
          ->select('*')
          ->where('id_materia', '=', $id)
          ->get();
        return view('materias.edit', compact('materia','error'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nombre_materias = DB::table('materias')
        ->select('*')
        ->where('degree','=', $id)
        ->get();

        //$cant_materias = $nombre_materias.count();
        //$temas = count($nombre_materias);

        /*$materia = Materia::findOrFail($id);
        //$id_profesor = $id;
        $temas =
            DB::select(
                DB::raw('SELECT *
                         FROM temas
                         WHERE id_materia = '.$id.'
                         ORDER BY title
                         ')
            );*/

        return view('front.select_material', compact('nombre_materias','id'));
        //return view('front.select_material', compact('materia','error'));
        return $nombre_materias;//*************crear una vista donde se carguen las materias y los temas de cada materia***********
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTemas($id)
    {
        $materia = Materia::findOrFail($id);
        //$id_profesor = $id;
        $temas =
            DB::select(
                DB::raw('SELECT *
                         FROM temas
                         WHERE id_materia = '.$id.'
                         ORDER BY title
                         ')
            );

        return view('front.select_tema', compact('temas','error','materia'));
        //return $temas;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finalShow($id)
    {
      $tema = Temas::findOrFail($id);
      $materia = Materia::findOrFail($tema->id_materia);
        //contraseña y usuario de base de datos hostinger La base de datos ha sido creada. La contraseña para el usuario u635245875_elias ha sido establecida a 2634701
        $mensaje = '';
        date_default_timezone_set('America/Costa_Rica');
        $time = date('Y-m-d H:i:s');
        $token =
            DB::table('token')
                ->select('expira','degree')
                ->where('id_user', '=', Auth::user()->id)
                ->where('degree', '=', $materia->degree)
                ->orderBy('expira','DESC')
                ->get();

        if (count($token) == 0) {
            return view('auth.token',compact('id','preguntas','mensaje'));
        }

        /*for ($i=0; $i < count($token); $i++) {*/

          if ($time > $token[0]->expira) {
            /*if($i == count($token)){*/
              return view('auth.token',compact('id','preguntas','mensaje'));
            /*}*/
          } else {

              if($token[0]->degree == $materia->degree) {
                  $materia = DB::table('materias')
                      ->select('*')
                      ->where('id', '=', $tema->id_materia)
                      ->get();


                  $preguntas = DB::select(DB::raw('SELECT * FROM preguntas WHERE id_tema = ' . $id . ''));

                  return view('front.show', compact('tema', 'preguntas', 'materia'));
              }else{

                  $mensaje = 'Solicite su licencia para este grado!';
                  return view('auth.token',compact('id','preguntas','mensaje'));

              }
            }
            /*$mensaje = 'Solicite su licencia para este grado!';
            return view('auth.token',compact('id','preguntas','mensaje'));*/
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function includeNewToken(Request $request){

        $id = $request->idTema;
        $newToken =
            DB::table('token')
                ->select('token', 'id_user', 'id')
                ->where('token', '=', $request->licencia)
                ->get();

        $mensaje = 'no existe el token';

        if(count($newToken) == 0){

            //echo "no existe el token";

            return view('auth.token',compact('id','mensaje'));

        }
        else if($newToken[0]->id_user != 0){
            //echo "no existe el token";
            return view('auth.token',compact('id','mensaje'));
        }

        else if($newToken[0]->id_user == 0){

            date_default_timezone_set('America/Costa_Rica');
            $expira = date('Y-m-d', strtotime('+1 month'));

            //print_r($newToken);
            $tokenEdit = Token::find($newToken[0]->id);
            $tokenEdit->id_user = Auth::user()->id;
            $tokenEdit->expira = $expira;
            $tokenEdit->degree = $request->degree;
            $tokenEdit->save();
            return $this->finalShow($request->idTema);

        }else{
            if($newToken[0]->id_user == Auth::user()->id){
                $tokenEliminar = Token::find($newToken[0]->id);
                if($tokenEliminar){
                    //$tokenEliminar->delete();
                    //echo "Ya esta registrado";
                    return $this->finalShow($request->idTema);
                }
                //echo 'ya se encuentra registrado el código';
                //echo "no existe el token";
                /*$materia = Materia::find($id);

                if($materia)
                    $materia->delete();
                return redirect('materias');*/
            }
        }

        /*if ($file != null) {
            if ($request->type == 1) {
                $user->privacy = "Public";
            } else {
                $user->privacy = "Private";
            }

            //Se Declara la ruta de destino
            $destino = public_path() . '/Profile/';

            $user->bibliography = $request->bibliography;
            $user->nickname = $request->nickname;
            $user->last_name = $request->lastname;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->avatar = $destino;
            $user->save();
            Input::file('files')->move($destino, $user->id . '.jpg');
        }*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMail(Request $request){

        $error = null;
        $rules =
            [
                'email'   => 'required',
                'content' => 'required'
            ];
        $this->validate($request, $rules);

        //$idTemaFront = $request->input('idTema');
        $temaId = Temas::findOrFail($request->input('idTema'));
        //$num = (int)$temaId['id'];
        $profesor = DB::select(DB::raw('SELECT * FROM users WHERE id = (SELECT id_profesor FROM profesor_materia WHERE id_materia = (SELECT id_materia FROM temas WHERE id = '.$temaId['id'].'))'));


        //print_r($profesor);
        //print_r($temaId['id']);
        //print_r($temaId);

        $email   = $request->input('email');
        $content = $request->input('content');

        \Mail::send('front.emailSend', ['email' => $email, 'content' => $content], function ($message) use($profesor)
        {

            $message->from('eliassaso@gmail.com', 'Elías Sánchez');
            $message->to($profesor[0]->email);
            $message->subject("Consulta My School");

        });

        return response()->json(['message' => 'Request completed']);

    /*$data = $request->all();

    \Mail::send('front.email', $data, function($message) use ($request)
        {
            $message->to('eliassaso@gmail.com', 'John Smith')->subject('Welcome!');
        });
        //print_r($data->title.$data->content);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
