<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = User::findOrFail(Auth::user()->id);
        $error = '';
        return view('users.profile',compact('error'));
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
      $error = '';
      $user = User::findOrFail($id);

      $error = null;
      $rules =
          [
              'charter'   => 'required',
              'name'   => 'required',
              'last_name' => 'required',
              'email'   => 'required',
              'phone' => 'required',
          ];
          if($request->status == ''){
            $request->status = 'Inactivo';
          }else{
              $request->status = 'Activo';
          }
      $this->validate($request, $rules);

      if($request->passwordNuevo == '' && $request->passwordActual == ''){

          $user->charter = $request->charter;
          $user->name = $request->name;
          $user->last_name = $request->last_name;
          $user->email = $request->email;
          $user->phone = $request->phone;
          $user->province = $request->province;
          $user->status = $request->status;
          $user->save();
          return redirect('home');
        }else{
          //$passwordActual = \Hash::make($request->passwordActual);

          if (\Hash::check($request->passwordActual, Auth::user()->password))
          {
            if($request->passwordNuevo == ''){

              $error = 'Debe ingresar la contraseña nueva!';
              return view('users.profile',compact('error'));

            }else{

              $passwordNuevo = \Hash::make($request->passwordNuevo);

                $user->charter = $request->charter;
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->province = $request->province;
                $user->status = $request->status;
                $user->password = $passwordNuevo;
                $user->save();
              return redirect('home');

            }
          }

          /*if($passwordActual == Auth::user()->password){

          }*/else{
            $error = 'contraseña incorrecta';
            return view('users.profile',compact('error'));
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
        //
    }
}
