<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator , Str, Auth;
use App\User;

class UserController extends Controller
{
    public function __Contructor(){
    	$this->middleware('Auth');
    }

    public function getAccountEdit(){
    	return view('user.account_edit');
    }



    public function postAccountInfo(Request $request){
          $rules =[
            'name' => 'required',
             'lastname' => 'required',
              'phone' => 'required|min:7',
        ];
        
        $messages = [
            'name.required' => 'Su nombre  es requerido',
            'lastname.required' => 'Su apellido es requerido',
            'phone.required' => 'Su numero telefonico es requerido',
            
        ];
          $validator = Validator::make($request->all(), $rules,$messages);
        if($validator->fails()):
        return back()->withErrors($validator)->withFail('Error message');
         else:
         	$u = User::find(Auth::id());
         	$u->name = e($request->input('name'));
         	$u->lastname = e($request->input('lastname'));
         	$u->phone = e($request->input('phone'));
         	if($u->save()):
         	return back()->withSuccess('Datos actualizados correctamente');
         endif;
         	endif;




    }
}
