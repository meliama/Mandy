<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'name'=>'required|alpha|min:2',
          'surname'=>'required|alpha|min:2',
          'username'=>'required|min:1|unique:users',
          'email'=>'required|email|unique:users',
          'password'=>'required|alpha_num|min:3|confirmed',
        ],
        [
          'name.required'=>'Completá tu nombre',
          'name.alpha'=>'El campo solo debe contener letras',
          'name.min'=>'El nombre debe contener mínimo 2 caracteres',

          'surname.required'=>'Completá tu apellido',
          'surname.alpha'=>'El campo solo debe contener letras',
          'surname.min'=>'El apellido debe contener mínimo 2 caracteres',

          'username.required'=>'Completá tu nombre de usuario',
          'username.min'=>'El nombre de usuario debe contener mínimo 2 caracter',
          'username.unique'=>'Ya hay una cuenta asociada a este nombre de usuario',

          'email.required'=>'Completá tu e-mail',
          'email.email'=>'Usá el formato nombre@dominio.com',
          'email.unique'=>'Ya hay una cuenta asociada a este e-mail',

          'password.required'=>'Completá tu contraseña',
          'password.alpha_num'=>'El campo debe contener solo letras o números',
          'password.min'=>'La contraseña debe tener más de 3 caracteres',

        ]

      );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
     protected function create(array $data)
  {

       return User::create([
          'name' => $data['name'],
          'surname' => $data['surname'],
          'username' => $data['username'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
      ]);
 dd($data);
      return redirect('/home');
  }


  }
