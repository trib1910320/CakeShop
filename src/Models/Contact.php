<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $table = 'contact';
	protected $primaryKey = 'id';
	protected $fillable =[
		'customer',
		'mail',
		'phone',
		'detail',
		'id_user'
	];
	public $timestamps = false;
	
	public function user()
	{
		return $this->belongsTo(User::class,'id_user');
	}
}
