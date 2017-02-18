<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Materias;
use App\ProfesorMateria;
use DB;
use Auth;

class ProfesoresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = DB::table('users')
            ->where('roll','=','profesor')
            ->orderBy('name', 'ASC')
            ->paginate(5);
        return view('profesores.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $error = null;
        return view('profesores.create', compact('error'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        //$id_profesor = $id;
        $materias =
            DB::select(
                DB::raw('SELECT *
                         FROM materias
                         WHERE id <> ALL(SELECT id_materia FROM profesor_materia)
                         ORDER BY degree
                         ')
            );

        return view('profesores.asignar', compact('materias','user'));
    }

    public function impartidas($id)
    {
        $user = User::findOrFail($id);
        //$id_profesor = $id;
        $materias =
            DB::select(
                DB::raw('SELECT *
                         FROM materias
                         WHERE id in (SELECT id_materia FROM profesor_materia WHERE id_profesor ='.$id.')
                         ORDER BY degree
                         ')
            );

        return view('profesores.impartidas', compact('materias','user'));
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

    public function reclutar(Request $request)
    {
        $charter = $request->input('charter');
        //echo $charter;

        $exist =
            DB::table('users')
                ->select('*')
                ->where('charter', '=', $charter)
                //y el id_user = id yo
                ->get();

        if(!empty($exist)){

            DB::table('users')
                ->where('charter', '=', $charter)
                ->update(['roll' => 'profesor']);
            return redirect('/profesores');

        }else{
            //$mensaje = 'La materia <strong>'. $exist .'</strong> ya existe.';
            $error = 'Usuario no registrado';
            return view('profesores.create', compact('error'));
        }
    }

    public function asignar(Request $request){
        $id_materia = $request->input('id_materia');
        $id_profesor = $request->input('id_profesor');

        ProfesorMateria::create($request->all());
        return redirect('profesores/'.$id_profesor.'/edit');

        //echo $id_materia.$id_profesor;
        //echo $id_profesor;
        //echo $id_materia;
    }

    public function quitar(Request $request){
        $id_materia = $request->input('id_materia');
        $id_profesor = $request->input('id_profesor');

        ProfesorMateria::where('id_materia', '=', $id_materia)->delete();


        return $this->impartidas($id_profesor);
        //return view('profesores.index');

    }

    public function dashboard(){

        //$user = User::findOrFail(Auth::user()->id);
        //$id_profesor = $id;
        $materias =
            DB::select(
                DB::raw('SELECT *
                         FROM materias
                         WHERE id in (SELECT id_materia FROM profesor_materia WHERE id_profesor ='.Auth::user()->id.')
                         ORDER BY degree
                         ')
            );

        return view('profesores.dashboard', compact('materias'));

    }
}
