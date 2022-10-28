<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modulo
 *
 * @property $modu_id
 * @property $modu_nomb
 * @property $modu_nume
 * @property $modu_desc
 * @property $created_at
 * @property $updated_at
 *
 * @property Pregunta[] $preguntas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Modulo extends Model
{
    
    protected $primaryKey="modu_id";
    static $rules = [
		//'modu_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['modu_nomb','modu_nume','modu_desc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preguntas()
    {
        return $this->hasMany('App\Models\Pregunta', 'modu_id', 'modu_id');
    }
    

}
