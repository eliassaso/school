<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Materia;
use App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use DB;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$materias = Materia::all();
        $materias = DB::table('materias')
            ->orderBy('degree', 'ASC')
            ->paginate(5);
        return view('materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $error = null;
        return view('materias.create', compact('error'));
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
                'degree' => 'required',
                'nombre_materia' => 'required'
            ];
        $this->validate($request, $rules);

        $degree = $request->input('degree');
        $nombre_materia = $request->input('nombre_materia');

        $exist =
            DB::table('materias')
                ->select('*')
                ->where('degree', '=', $degree)
                ->where('nombre_materia', '=', $nombre_materia)
                //y el id_user = id yo
                ->get();

        if(empty($exist[0])){

            Materia::create($request->all());
            return redirect('materias');

        }else{
            //$mensaje = 'La materia <strong>'. $exist .'</strong> ya existe.';
            $error = 'Ya existe';
            //$error = $exist;
            return view('materias.create', compact('error'));
        }


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
        $error = null;
        $materia = Materia::findOrFail($id);
        return view('materias.edit', compact('materia','error'));
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
        $error=null;
        $rules=
            [
                'degree' => 'required',
                'nombre_materia' => 'required'
            ];
        $this->validate($request, $rules);

        $degree = $request->input('degree');
        $nombre_materia = $request->input('nombre_materia');

        $exist =
            DB::table('materias')
                ->select('*')
                ->where('degree', '=', $degree)
                ->where('nombre_materia', '=', $nombre_materia)
                //y el id_user = id yo
                ->get();

        if((!empty($exist)) && ($exist[0]->id == $id)){

            $materia = Materia::findOrFail($id);
            $materia->update($request->all());
            return redirect('materias');

        }else{
            if((!empty($exist)) && ($exist[0]->id != $id)){
                $materia = Materia::findOrFail($id);
                $error = 'Ya existe!';
                return view('materias.edit', compact('materia','error'));
            }else{
                $materia = Materia::findOrFail($id);
                $materia->update($request->all());
                return redirect('materias');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $materia = Materia::find($id);

        if($materia)
            $materia->delete();
        return redirect('materias');
    }
}
