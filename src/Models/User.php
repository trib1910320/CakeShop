<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $fillable =[
		'fullname',
		'username',
		'password',
		'email',
		'phone',
		'address'
	];
	public $timestamps = false;
	
	public function carts()
	{
		return $this->hasMany(Cart::class);
	}
	public function contacts()
	{
		return $this->hasMany(Contact::class);
	}
}
