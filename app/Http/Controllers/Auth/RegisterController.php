<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role_User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/index';

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
            'email' => ['required', 'string', 'max:255','unique:users'],
            'permiso' => ['required', 'string', 'max:255'],
            'facultad' => ['required', 'string', 'max:255'],
            'rut' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3'],
            'nombre' => ['required', 'string', 'max:255',],
            'apellidos' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $role_u = new Role_User();
        if($data['permiso'] == "Admin"){
            $role_u->role_id=1;
        }
        if($data['permiso'] == "Secretario"){
            $role_u->role_id=2;
        }
        $role_u->user_email = $data['email'];
        $role_u->save();

        return User::create([
            'email'=>$data['email'],
            'permiso' => $data['permiso'],
            'facultad' => $data['facultad'],
            'rut' => $data['rut'],
            'password' => Hash::make($data['password']),
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'estado' => $data['estado'],
        ]);
    }
}
