<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fuentefinan
 *
 * @property $fuen_fina_id
 * @property $fuen_id
 * @property $fuen_fina_notas
 * @property $created_at
 * @property $updated_at
 *
 * @property Financiamiento[] $financiamientos
 * @property Fuente $fuente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fuentefinan extends Model
{
    
    protected $primaryKey="";
    static $rules = [
		'fuen_fina_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fuen_fina_id','fuen_id','fuen_fina_notas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function financiamientos()
    {
        return $this->hasMany('App\Models\Financiamiento', 'fuen_fina_id', 'fuen_fina_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fuente()
    {
        return $this->hasOne('App\Models\Fuente', 'fuen_id', 'fuen_id');
    }
    

}
