@extends('emails.master')

@section('content')
<p>Hola: <strong>{{$name}}</strong></p>
<p>Este es la nueva contraseña para nuestra plataforma   mujerestrategica.com</p>
<p><h2>{{ $password}}</h2><p>

<p>Para iniciar sesion haga clic en el siguiente boton </p>
<p><a href="{{url('/login')}}" style="display: inline-block;background-color: #2caaff; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none;" >Resetear mi contraseña</a></p>

<p>Si el boton anterior no le funciona, copie y pegue la siguiente url en su navegador</p>
<p>{{url('/login')}}</p>
@stop