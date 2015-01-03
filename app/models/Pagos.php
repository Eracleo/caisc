<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Pagos extends Eloquent implements UserInterface, RemindableInterface {

	public static function agregar($input)
	{
		$respuesta = array();
		$reglas = array(
			'total'=>array('required'),
		);
		$validador = Validator::make($input,$reglas);
		if($validador->fails()){
			$respuesta['mensaje'] = $validador;
			$respuesta['error'] = true;
		} else{
			$respuesta['mensaje'] = 'Docente Creado';
			$respuesta['error'] = false;
		}
		return $respuesta;
	}
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pagos';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
}

