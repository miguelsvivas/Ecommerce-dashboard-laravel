<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash , Auth, Mail ,Str;
use App\Mail\UserSendRecover, App\Mail\UserSendNewPassword;
use App\User;


class ConnectController extends Controller
{


    public function __construct(){
    	$this->middleware('guest')->except(['getLogout']);


    }

    public function getLogin(){
    	return view('connect.login');
    }



    public function postLogin(Request $request){
    	$rules=[
    		'email' => 'required|email',
    		'password' => 'required|min:8',];

    	$messages=[	'email.required' => 'su correo electronico es requerido',
    		'email.email'=> 'el formato de su correo electronico es invalido',
    		'password.required' => 'Por favor escriba una contraseña',
    		'password.min' =>'la contraseña debe tener almenos 8 caracteres',
    		];
    	$validator = Validator::make($request->all(), $rules,$messages);
    	 if($validator->fails()):
    	 return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
    else:
    	if(Auth::attempt(['email'=> $request ->input('email'), 'password' => $request->input('password')], true)):
            if (Auth::user()->status == "100"):
                return redirect('/logout');
            else:

    		return redirect('/');
        endif;
    	else:
    		 return back()->with('message','Contraseña erronea')->with('typealert','danger');
    	endif;
    endif;




    }

       public function getRegister(){
    	return view('connect.register');
    }

    public function postRegister(Request $request){

    	$rules =[ 
    		'name' => 'required',
    		'lastname'=> 'required',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required|min:8',
    		'cpassword'=> 'required|min:8|same:password'

    	];

    	$messages=[
    		'name.required' => 'su nombre es requerido',
    		'lastname.required' => 'su apellido es requerido',
    		'email.required' => 'su correo electronico es requerido',
    		'email.email'=> 'el formato de su correo electronico es invalido',
    		'email.unique' => 'ya existe un usuario con ese correo',
    		'password.required' => 'Por favor escriba una contraseña',
    		'password.min' =>'la contraseña debe tener almenos 8 caracteres',
    		'cpassword.required' => 'Es necesario confirmar la contraseña',
    		'cpassword.same' => 'las contraseñas no coinciden'


    	];



    	$validator = Validator::make($request->all(), $rules,$messages);
    	if($validator->fails()):
    	return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
    else:
    	$user = new User;
    	$user->name=e($request->input('name'));
    	$user->lastname=e($request->input('lastname'));
    	$user->email=e($request->input('email'));
    	$user->password= Hash::make($request->input('password'));

    	if($user->save()):
    		return redirect('/login')->with('message','Su usuario ha sido creado con exito')->with('typealert','success');
    	endif;
   		endif;

    }
    public function getLogout(){
        $status = Auth::user()->status;
        Auth::logout();
        if($status == "100"):
    	

                return redirect('/login')->with('message','Su usuario fue suspendido')->with('typealert','danger');

        else:
   
        
    	return redirect('/');

    endif;

    }

    public function getRecover(){

        return view('connect.recover');

    }

    public function postRecover(Request $request){

        $rules =[ 

            'email' => 'required|email'

        ];

        $messages=[
            
            'email.required' => 'su correo electronico es requerido',
            'email.email'=> 'el formato de su correo electronico es invalido',


        ];


        $validator = Validator::make($request->all(), $rules,$messages);
        if($validator->fails()):
        return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
         else:
            $user = User::where('email', $request->input('email'))->count();
            if($user == "1"):
                $user = User::where('email', $request->input('email'))->first();
                $code = rand(100000, 999999);
                $data = ['name' => $user->name, 'email' => $user->email, 'code' => $code];
                $u = User::find($user->id);
                $u->password_code = $code;
                if($u->save()):
                Mail::to($user->email)->send(new UserSendRecover($data));
                return redirect('/reset?email='.$user->email)->with('message','revise el codigo que le hemos enviado a su corro electronico')->with('typealert','danger');
             //   return view('emails.user_password_recover',$data);
            endif;
            else:
                return back()->with('message','este correo electronico no existe en nuestros registros')->with('typealert','danger');
            endif;
         endif;
    }

    public function getReset(Request $request){
        $data = ['email' => $request->get('email')];
        return view('connect.reset',$data);



    }

    public function postReset(Request $request){

           $rules =[ 

            'email' => 'required|email',
            'code' => 'required'

        ];

        $messages=[
            
            'email.required' => 'su correo electronico es requerido',
            'email.email'=> 'el formato de su correo electronico es invalido',
            'code.required' => 'El codigo de recuperacion es requerido'

        ];


        $validator = Validator::make($request->all(), $rules,$messages);
        if($validator->fails()):
        return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
         else:
              $user = User::where('email', $request->input('email'))->where('password_code',$request->input('code'))->count();
              if($user == "1"):
              $user = User::where('email', $request->input('email'))->where('password_code',$request->input('code'))->first();
                $new_password = Str::random(8);
                $user->password = Hash::make($new_password);
                $user->password_code = null;
                if($user->save()):
                     $data = ['name' => $user->name,  'password' => $new_password];
                     Mail::to($user->email)->send(new  UserSendNewPassword($data));
                     return redirect('/login')->with('message','la contraseña fue reestablecida, hemos enviado un correo con su nueva contraseña para que pueda   pueda iniciar seseion')->with('typealert','success');

                endif;
              else:
                  return back()->with('message','el correo electronico o el codigo son erroneos')->with('typealert','danger');
              endif;
         endif;

    }

}
