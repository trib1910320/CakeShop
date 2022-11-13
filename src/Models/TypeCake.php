<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\type;

class TypeCake extends Model
{
	protected $table = 'type_cake';
	protected $primaryKey = 'id';
	protected $fillable =[
		'type_cake'
	];
	public $timestamps = false;

	public function cakes()
	{
		return $this->hasMany(Cake::class);
	}
}