<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Canva
 *
 * @property $canv_id
 * @property $empr_id
 * @property $canv_esta
 * @property $created_at
 * @property $updated_at
 *
 * @property Emprendimiento $emprendimiento
 * @property Respuesta[] $respuestas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Canva extends Model
{
    
    protected $primaryKey="canv_id";
    static $rules = [
        'canv_id' => 'required',
		'empr_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['canv_id','empr_id','canv_esta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function emprendimiento()
    {
        return $this->hasOne('App\Models\Emprendimiento', 'empr_id', 'empr_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respuestas()
    {
        return $this->hasMany('App\Models\Respuesta', 'canv_id', 'canv_id');
    }
    

}
