<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
	protected $table = 'cake';
	protected $primaryKey = 'id';
	protected $fillable =[
		'img',
		'cake',
		'price',
		'detail',
		'id_type'
	];
	public $timestamps = false;

	public function carts()
	{
		return $this
			->belongsToMany(Cart::class,'detail_cart')
			->as('detail_cart')
			->withPivot('id','number');
	}

	public function typecake()
	{
		return $this
			->belongsTo(TypeCake::class,'id_type');
	}

}
