<?php

function kvfj($json,$key ){

	if($json == null):
		return null;
	else:
		$json = $json;
		$json = json_decode($json,true);
		if(array_key_exists($key, $json)):
			return $json[$key];
		else:
			return null;
		endif;
	endif;
}



function getModulesArray(){
	$a =[
		'0' => 'Productos',
		'1' => 'Blog'

	];
	return $a;

}


function getRoleUserArray($mode,$id){
	 $roles = ['0' => 'Usuario','1' => 'Administrador'];
	if(!is_null($mode)):
		return $roles;
	else:
 
return $roles[$id];

endif;

}

function getUserStatusArray($mode,$id){
  $status = ['0' => 'Registrado','1' => 'Verificado', '100' => 'Baneado'];
if(!is_null($mode)):
		return $status;
	else:
 
return $status[$id];

endif;

}

function user_permissions(){
	$p = [ 
		'dashboard' =>[
			'icon' => '<i class="fas fa-home"></i>',
			'title' => 'Modulo Dashboard',
			'keys' => [
				'dashboard' => 'Puede ver el dashboard',
				'dashboard_small_stats' => 'Puede ver las estadisticas',
				'dashboard_sell_today' => 'Puede ver lo facturado'
			]
		],
		'products' => [
			'icon' => '<i class="fas fa-boxes""></i>',
			'title' => 'Modulo Productos',
			'keys' => [
				'products' => 'Puede ver el listado de productos',
				'product_add' => 'Puede Agregar Productos',
				'product_edit' => 'Puede Editar Productos' ,
				'product_search' => 'Puede buscar Producto' ,
				'product_delete' => 'Puede Eliminar Productos' ,
				'product_gallery_add' => 'Puede Agregar imagenes a la galeria ' ,
				'product_gallery_delete' => 'Puede Eliminar imagenes de la galeria' ,
				

		]
	],
	'categories' => [
			'icon' => '<i class="far fa-folder-open"></i>',
			'title' => 'Modulo Categorias',
			'keys' => [
				'categories' => 'Puede ver la lista de categorias',
				'category_add' => 'Puede agregar categorias',
				'category_edit' => 'Puede editar categorias' ,
				'category_delete' => 'Puede eliminar categorias' 
				

		]
	],
	'users' => [
			'icon' => '<i class="fas fa-user-friends"></i>',
			'title' => 'Modulo Usuarios',
			'keys' => [
				'user_list' => 'Puede ver la lista de usuarios',
				'user_edit' => 'Puede editar usuarios',
				'user_banned' => 'Puede banear usuarios' ,
				'user_permissions' => 'Puede administrar permisos de usuarios' 
				

		]
	]
	];

	return $p;
}

function getUserYears(){
	$ya= date('Y');

	$ym = $ya- 18;

	$yo = $ym - 62;

	return [$ym,$yo];
}

function getMonths($mode, $key){
$m = [
	'1' => 'Enero',
	'2' => 'Febrero',
	'3' => 'Marzo',
	'4' => 'Abril',
	'5' => 'Mayo',
	'6' => 'Junio',
	'7' => 'Julio',
	'8' => 'Agosto',
	'9' => 'Septiembre',
	'10' => 'Octubre',
	'11' => 'Noviembre',
	'12' => 'Diciembre',


];
if($mode == "list"){
	return $m;


}else{
	return $m[$key];
}

}

