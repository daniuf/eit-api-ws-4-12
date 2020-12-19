<?php

class API {

  public function __construct() {

  }

  /**
   * Metodo para crear un usuario
   */
  public function createUser($input) 
  {
	//Procesar el input y crear registro en DB
	return true;
  }

  public function deleteUser($input) 
  {
	//Procesar el input y eliminar registro en DB
	return true;
  }

  public function updateUser($input) 
  {
	//Procesar el input y actualizar registro en DB
	return true;
  }

  public function getUsers() 
  {
	//Consultamos a DB y retornamos listado de usuarios
	$array = array(array('nombre' => "Juan", "email" => "juan@gmail.com"),
			array('nombre' => "Facundo", "email" => "facundo@gmail.com")
			);

	$users = json_encode($array);

	return $users;
  }
}
