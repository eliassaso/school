<?php

namespace App\Http\Controllers;

use App\Materia;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Materias;
use App\Temas;
use DB;
use Auth;

class TemasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $error = null;
        return view('temas.create', compact('error'));
    }
    public function createma($id)
    {
        $error = null;
        $id_materia = $id;
        return view('temas.create', compact('error','id_materia'));
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
                'title' => 'required',
                'content' => 'required',
                'link' => 'required'
            ];
        $this->validate($request, $rules);

        $id_materia = $request->input('id_materia');
        $title = $request->input('title');
        $content = $request->input('content');
        $link = $request->input('link');

        //Temas::create($request->all());
        $tema = new Temas;
        $tema->id_materia = $id_materia;
        $tema->title = $title;
        $tema->content = $content;
        $tema->link = $link;
        $tema->save();
        return redirect('temas/'.$id_materia);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

        return view('temas.index', compact('materia','temas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tema = Temas::findOrFail($id);
        $id_materia = $tema->id_materia;
        $error = null;
        return view('temas.edit', compact('tema','id_materia','error'));
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
        $tema = Temas::findOrFail($id);
        $error=null;
        $rules=
            [
                'title' => 'required',
                'content' => 'required',
                'link' => 'required'
            ];
        $this->validate($request, $rules);

        $tema->update($request->all());
        $id_materia = $request->input('id_materia'); //se obtiene para poder devolverse a la vista de temas con dicho id

        return redirect('temas/'.$id_materia);
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
