<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Costo
 *
 * @property $cost_id
 * @property $modu_id
 * @property $cost_text
 * @property $cost_desc
 * @property $created_at
 * @property $updated_at
 *
 * @property Modulo $modulo
 * @property RespCosto[] $respCostos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Costo extends Model
{
    protected $primaryKey="cost_id";
    static $rules = [
		//'cost_id' => 'required',
		'modu_id' => 'required',
	    'cost_text' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['modu_id','cost_text','cost_desc'];


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
    public function respCostos()
    {
        return $this->hasMany('App\Models\RespCosto', 'cost_id', 'cost_id');
    }
    

}
