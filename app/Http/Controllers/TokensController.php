<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Token;
use DB;

class TokensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.password');
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
      $error=null;
      $rules=
          [
              'email' => 'required'
          ];
      $this->validate($request, $rules);
      //print_r($request->email);

      $exist =
          DB::table('users')
              ->select('*')
              ->where('email', '=', $request->email)
              //y el id_user = id yo
              ->get();

      if(!empty($exist)){
        $email = $request->email;
        $random = rand(0,100000);
        $password = \Hash::make($random);

        $aviso = 'se envio correo con la nueva contraseña';
        //echo $random;

          DB::table('users')
              ->where('email', '=', $request->email)
              ->update(['password' => $password]);

              \Mail::send('front.emailSend', ['email' => $email, 'content' => $random], function ($message) use($request)
                {

                    $message->from('eliassaso@gmail.com', 'Elías Sánchez');
                    $message->to($request->email);
                    $message->subject("Nueva contraseña");

                });
                $men = 'la contraseña se envio a su correo';
          return view('auth.login');

      }else{
          echo "Usuario no se encuentra registrado!";
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
