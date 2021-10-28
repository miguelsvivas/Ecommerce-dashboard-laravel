<div class="container">

<div class="row m-t-30 ">

	

	<div class="">
			<div class="panel shadow">
			<div class="header">
				<h2 class="title" style="text-align: center; padding-top: 30px; padding-bottom: 40px"><i class="fa fa-address-book-o"></i>Mis datos</h2>
				</div>
				<div class="inside">
					
				{!! Form::open(['url' => '/account/edit/info']) !!}
				<div class="row">
					
					<div class="col-md-4">
						   
            {!!Form::open(['url' => '/account/edit/info']) !!}

            <label for="name">Nombre:</label>
                    <div class="input-group">
                  
                     <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>
                     </span>
                   
                {!! Form::text('name',Auth::user()->name,['class' => 'form-control'])!!}
            </div>
			</div>

			<div class="col-md-4">
						   
            {!!Form::open(['url' => '/account/edit/info']) !!}

            <label for="lastname">Apellidos :</label>
                    <div class="input-group">
                  
                      <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>
                     </span>
                   
                {!! Form::text('lastname',Auth::user()->lastname,['class' => 'form-control'])!!}
            </div>
					</div>




			<div class="col-md-4">
						   
            {!!Form::open(['url' => '/account/edit/info']) !!}

            <label for="email">Email :</label>
                    <div class="input-group">
                  
                      <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i>
                     </span>
                   
                {!! Form::text('email',Auth::user()->email,['class' => 'form-control','disabled'])!!}
            </div>
					</div>


					<div class="col-md-4">
						   
            {!!Form::open(['url' => '/account/edit/info']) !!}

            <label  style="padding-left: 1px; padding-top: 13px">Direccion:</label>
                    <div class="input-group">
                  
                      <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>
                     </span>
                   
                {!! Form::text('lastname',Auth::user()->address,['class' => 'form-control'])!!}
            </div>
					</div>




			<div class="row m-t-30	">

				<div class="col-md-4">
						   

            <label for="phone" style="padding-left: 4px; padding-top: 13px" >Telefono :</label>
                    <div class="input-group" style="padding-left: 4px">
                  
                     <span class="input-group-addon"><i class="fa-user"></i>
                     </span>


                   
                {!! Form::number('phone',Auth::user()->phone,['class' => 'form-control'])!!}
            </div>
					</div>


			</div>






				</div>
				 <div class="row" style="text-align: center; padding-left: 20px; padding-top: 30px">
                     	<div class="col-md-12">
                     		
                     		{!! Form::submit('Guardar', ['class' => 'btn btn-primary'])!!}

                     	</div>
                     </div>
				{!! Form::close()!!}
			
			</div>
		</div>
	</div>

</div>
</div>