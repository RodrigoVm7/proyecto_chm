<?php

namespace App\Http\Controllers;

use App\User;
use App\facultad;
use App\Role_User;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendMail;


class usersController extends Controller {

    public function index(Request $request){
        $color=$request->user()->color;
        if($request->user()){
            $tipo=$request->user()->permiso;
            if($tipo=='Admin'){
                return view('admin.index',compact('color'));
            }
            if ($tipo=='Secretario'){
                return view('secretario.index');
            }
        }else{
            return view('welcome');
        }
    }    

    public function personalizar(Request $request){
        $color=$request->user()->color;
        return view('user.personalizarFondo',compact('color'));
    }

    public function cambiarColor(Request $request){
        User::where('email','=',$request->user()->email)->update(['color'=>$request->input('color')]);
        return redirect('/personalizarFondo')->with('Mensaje','Color de fondo actualizado correctamente');
    }

    /* Funcion que retorna a la pagina principal de la pestaña Usuarios en el menu de Administrador, junto con los datos de los usuarios
       existentes. */
    public function mostrar(Request $request){
        $color=$request->user()->color;
        $request->user()->authorizeRoles(['Admin']);
    	$datos=User::paginate(3);
    	return view('user.index',compact('datos','color'));
    }

    /* Funcion que retorna a la pagina que permite crear un nuevo usuario*/
    public function create(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        $facultades=facultad::all();
        $color=$request->user()->color;
    	return view('user.create',compact('facultades','color'));
    }

    /* Funcion que recibe los datos del formulario para crear un nuevo usuario, para posteriormente ingresarlo a la base de datos. Ademas, 
       el sistema se encarga de generar la contraseña de ingreso para el nuevo usuario, la cual se le envia al usuario en cuestion al 
       correo electronico ingresado. */
    public function store(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        $campos=[
            'nombre' => 'required|string|min:2',
            'apellidos' => 'required|string|max:100',
            'rut' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'facultad' => 'required|string|min:2'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        
        $role_u = new Role_User();
        if($request['permiso'] == "Admin"){
            $role_u->role_id=1;
        }
        if($request['permiso'] == "Secretario"){
            $role_u->role_id=2;
        }
        $role_u->user_email = request()->input('email');
        $role_u->save();

        $pass=random_int(100,1000);
        $nuevoUsuario=new User();
        $nuevoUsuario->email=request()->input('email');
        $nuevoUsuario->permiso=request()->input('permiso');
        $nuevoUsuario->facultad=request()->input('facultad');
        $nuevoUsuario->rut=request()->input('rut');
        $nuevoUsuario->password=Hash::make($pass);
        $nuevoUsuario->nombre=request()->input('nombre');
        $nuevoUsuario->apellidos=request()->input('apellidos');
        $nuevoUsuario->estado="ACTIVO";
        $nuevoUsuario->save();
        $remitente=request()->input('email');
        $data = new \stdClass();
        $data->nombre=request()->input('nombre');
        $data->pass=$pass;
        Mail::to($remitente)->send(new SendMail($data));
        return redirect('admin/usuarios')->with('Mensaje','Usuario añadido correctamente. Contraseña enviada al email');
    }

    /* Función que retorna una vista con los datos del usuario buscado mediante el rut*/
    public function buscar(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        $color = $request->user()->color;
        $rut=request()->input('rut');
        $datos=User::where('rut','=',$rut)->get();
        return view('user.buscar',compact('datos','color'));
    }

    /* Función que retorna a la página que permite editar la información de un usuario en particular*/
    public function edit(Request $request, $email){
        $request->user()->authorizeRoles(['Admin']);
        $rut_sesion_actual=$request->user()->rut;
        $user=User::findOrFail($email);
        $facultades=facultad::all();
        $color=$request->user()->color;
        return view('user.edit',compact('user','facultades','rut_sesion_actual','color'));
    }

    /* Función que recibe los datos del formulario para editar un usuario, para posteriormente ingresar a la base de datos la 
       información actualizada*/
    public function update(Request $request, $email){
        $request->user()->authorizeRoles(['Admin']);
        $datosUsuario=request()->except('_token');
        User::where('email','=',$email)->update($datosUsuario);
        return redirect('admin/usuarios')->with('Mensaje','Académico actualizado correctamente');
    }

    /* Función que retorna a la página principal de la pestaña Usuarios en el menú de Administrador, pero con la columna de reenviar 
       contraseñas habilitada. */
    public function reenviarContraseña(Request $request){
        $request->user()->authorizeRoles(['Admin']);
        $datos=User::all();
        $color=$request->user()->color;
        return view('user.indexReenviarContraseña',compact('datos','color'));
    }

    /* Función que se encarga de generar una nueva contraseña para un usuario, la cuál es actualizada en la base de datos y a su vez es
       es enviada al correo electrónico del usuario en cuestión. */
    public function nuevaContraseña(Request $request, $email){
        $request->user()->authorizeRoles(['Admin']);
        $pass=random_int(100, 1000);
        User::where('email','=',$email)->update(['password'=>Hash::make($pass)]);
        $data = new \stdClass();
        $data->nombre=User::where('email','=',$email)->first()->nombre;
        $data->pass=$pass;
        Mail::to($email)->send(new SendMail($data));
        return redirect('admin/usuarios')->with('Mensaje','Contraseña enviada al email');
    }
}
