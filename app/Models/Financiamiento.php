<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Financiamiento
 *
 * @property $fina_id
 * @property $empr_id
 * @property $fuen_fina_id
 * @property $fina_activ
 * @property $fina_cant
 * @property $fina_unid
 * @property $fina_mone
 * @property $fina_mont
 * @property $created_at
 * @property $updated_at
 *
 * @property Emprendimiento $emprendimiento
 * @property Fuentefinan $fuentefinan
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Financiamiento extends Model
{
    
    protected $primaryKey="";
    static $rules = [
		'fina_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fina_id','empr_id','fuen_fina_id','fina_activ','fina_cant','fina_unid','fina_mone','fina_mont'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function emprendimiento()
    {
        return $this->hasOne('App\Models\Emprendimiento', 'empr_id', 'empr_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fuentefinan()
    {
        return $this->hasOne('App\Models\Fuentefinan', 'fuen_fina_id', 'fuen_fina_id');
    }
    

}
