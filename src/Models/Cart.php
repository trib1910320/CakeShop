<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = 'cart';
	protected $primaryKey = 'id';
	protected $fillable =[
		'id_user',
		'status',
		'hide'
	];
	public $timestamps = false;

    public function cakes()
	{
		return $this
			->belongsToMany(Cake::class,'detail_cart')
			->as('detail_cart')
			->withPivot('id','number');
	}

    public function user()
	{
		return $this
			->belongsTo(User::class,'id_user');
	}
}