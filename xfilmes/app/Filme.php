<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $fillable = [
		'ano', 'titulo', 'duracao', 'ci', 'genero_id', 'status'
	];

	public function genero(){
		$this->hasOne('App\Genero');
	}
}
