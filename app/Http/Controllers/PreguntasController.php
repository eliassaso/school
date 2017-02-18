<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Preguntas;
use App\Materias;
use App\Temas;
use DB;
use Auth;

class PreguntasController extends Controller
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
    public function creapregunta($id)
    {
        $error = null;
        $id_tema = $id;
        return view('preguntas.create', compact('error','id_tema'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $error=null;
        $rules=
            [
                'pregunta' => 'required',
                'respuesta_1' => 'required',
                'respuesta_2' => 'required',
                'respuesta_3' => 'required',
                'respuesta_4' => 'required',
                'notificacion' => 'required'
            ];
        $this->validate($request, $rules);

        $id_tema = $request->input('id_tema');

        Preguntas::create($request->all());
        return redirect('preguntas/'.$id_tema);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tema = Temas::findOrFail($id);
        //$id_profesor = $id;
        $preguntas =
            DB::select(
                DB::raw('SELECT *
                         FROM preguntas
                         WHERE id_tema = '.$id.'
                         ORDER BY id
                         ')
            );

        return view('preguntas.index', compact('tema','preguntas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunta = Preguntas::findOrFail($id);
        $id_tema = $pregunta->id_tema;
        $error = null;
        return view('preguntas.edit', compact('pregunta','id_tema','error'));
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
        $pregunta = Preguntas::findOrFail($id);
        $error=null;
        $rules=
            [
                'pregunta' => 'required',
                'respuesta_1' => 'required',
                'respuesta_2' => 'required',
                'respuesta_3' => 'required',
                'respuesta_4' => 'required',
                'notificacion' => 'required'
            ];
        $this->validate($request, $rules);

        $pregunta->update($request->all());
        $id_tema = $request->input('id_tema'); //se obtiene para poder devolverse a la vista de temas con dicho id

        return redirect('preguntas/'.$id_tema);
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
