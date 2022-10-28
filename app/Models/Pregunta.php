<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pregunta
 *
 * @property $preg_id
 * @property $modu_id
 * @property $preg_nume
 * @property $preg_text
 * @property $preg_desc
 * @property $created_at
 * @property $updated_at
 *
 * @property Modulo $modulo
 * @property Respuesta[] $respuestas
 * @property Sugerencia[] $sugerencias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pregunta extends Model
{
    
    protected $primaryKey="preg_id";
    static $rules = [
		//'preg_id' => 'required',
		'modu_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['modu_id','preg_nume','preg_text','preg_desc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modulo()
    {
        return $this->hasOne('App\Models\Modulo', 'modu_id', 'modu_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respuestas()
    {
        return $this->hasMany('App\Models\Respuesta', 'preg_id', 'preg_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sugerencias()
    {
        return $this->hasMany('App\Models\Sugerencia', 'preg_id', 'preg_id');
    }
    

}
