@extends('master')

@section('title', 'Editar Perfil')

@section('content')

<div class="row mtop32">

	
	<div class="col-md-4">
		<div class="panel shadow">
			<div class="header">
				<h2 class="title"><i class="far fa-user"></i> Editar Avatar</h2>
				</div>
				<div class="inside">   
					

			</div>
			{!! Form::close() !!}
		</div>


		<div class="panel shadow mtop32">
			<div class="header">
				<h2 class="title"><i class="fas fa-lock"></i> Cambiar Contraseña</h2>
				</div>
				<div class="inside">
					
			{!! Form::open(['url'=> '/account/edit/password'])!!}
				<div class="row">
				<div class="col-md-12">
				
				<label for="name">Contraseña actual</label>	
   				<div class="input-group">
                  
                 <span class="input-group" id="basic-addon1"><i class="fas fa-keyboard"></i>
                     </span>
                   
                {!! Form::password('password',['class' => 'form-control'])!!}
            </div>

				</div>
			</div>	

			<div class="row mtop16">
				<div class="col-md-12">
				
				<label for="name">Nueva Contraseña</label>	
   				<div class="input-group">
                  
                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i>
                     </span>
                   
                {!! Form::password('password',['class' => 'form-control'])!!}
            </div>

				</div>
			</div>


			<div class="row mtop16">
				<div class="col-md-12">
				
				<label for="name">Confirmar Contraseña</label>	
   				<div class="input-group">
                  
                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i>
                     </span>
                   
                {!! Form::password('cpassword',['class' => 'form-control'])!!}
            </div>

				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-12">				
                  
                {!! Form::submit('Guardar',['class' => 'btn btn-primary'])!!}
     

				</div>
			</div>			
			{!! Form::close() !!}
			</div>
		</div>


	</div>

	<div class="col-md-8">
			<div class="panel shadow">
			<div class="header">
				<h2 class="title"><i class="fas fa-address-card"></i> Editar Informacion</h2>
				</div>
				<div class="inside">
					
				{!! Form::open(['url' => '/account/edit/info']) !!}
				<div class="row">
					
					<div class="col-md-4">
						   
            {!!Form::open(['url' => '/account/edit/info']) !!}

            <label for="name">Nombre:</label>
                    <div class="input-group">
                  
                     <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i>
                     </span>
                   
                {!! Form::text('name',Auth::user()->name,['class' => 'form-control'])!!}
            </div>
					</div>

			<div class="col-md-4">
						   
            {!!Form::open(['url' => '/account/edit/info']) !!}

            <label for="name">Apellidos :</label>
                    <div class="input-group">
                  
                     <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i>
                     </span>
                   
                {!! Form::text('lastname',Auth::user()->lastname,['class' => 'form-control'])!!}
            </div>
					</div>


			<div class="col-md-4">
						   
            {!!Form::open(['url' => '/account/edit/info']) !!}

            <label for="email">Email :</label>
                    <div class="input-group">
                  
                     <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i>
                     </span>
                   
                {!! Form::text('email',Auth::user()->email,['class' => 'form-control','disabled'])!!}
            </div>
					</div>

			<div class="row mtop16	">

				<div class="col-md-4">
						   

            <label for="phone">Telefono :</label>
                    <div class="input-group">
                  
                     <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i>
                     </span>


                   
                {!! Form::number('phone',Auth::user()->phone,['class' => 'form-control'])!!}
            </div>
					</div>





				<div class="col-md-8">
						 <label for="module" >Fecha de nacimiento: año - mes -dia </label>
                <div class="input-group">
                   
                     <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i>
                     </span>
                    	
                {!! Form::number('year',null, ['class' => 'form-control','min' => getUserYears()[1],'max' => getUserYears()[0]]) !!}

                 {!! Form::select('month',getMonths('list',null),null , ['class' => 'form-select']) !!}

                   {!! Form::number('day',null, ['class' => 'form-control','min' => 1,'max' => 31,'required' ]) !!}

                 </div>
				</div>

				<div class="col-md-4">
						 <label for="module" >Genero</label>
                <div class="input-group">
                   
                     <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i>
                     </span>
                    	
                
                 {!! Form::select('gener',['0' => 'Sin Especificar', '1' => 'Hombre', '2' => 'Mujer'],null , ['class' => 'form-select']) !!}


                 </div>
			


				</div>


			</div>			

				</div>
				 <div class="row mtop16">
                     	<div class="col-md-12">
                     		
                     		{!! Form::submit('Guardar', ['class' => 'btn btn-primary'])!!}

                     	</div>
                     </div>
				{!! Form::close()!!}

				
			
			</div>
		</div>
	</div>

</div>

@endsection