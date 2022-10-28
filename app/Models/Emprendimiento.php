<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Emprendimiento
 *
 * @property $empr_id
 * @property $id
 * @property $empr_nomb
 * @property $empr_rubro
 * @property $empr_tipo
 * @property $created_at
 * @property $updated_at
 * @property $empr_esta
 *
 * @property Actividadesclafe[] $actividadesclaves
 * @property Canva[] $canvases
 * @property Cronograma[] $cronogramas
 * @property Financiamiento[] $financiamientos
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Emprendimiento extends Model
{
    
    protected $primaryKey="empr_id";
    static $rules = [
		//'empr_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','empr_nomb','empr_rubro','empr_tipo','empr_esta','empr_desc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actividadesclaves()
    {
        return $this->hasMany('App\Models\Actividadesclafe', 'empr_id', 'empr_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function canvases()
    {
        return $this->hasMany('App\Models\Canva', 'empr_id', 'empr_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cronogramas()
    {
        return $this->hasMany('App\Models\Cronograma', 'empr_id', 'empr_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function financiamientos()
    {
        return $this->hasMany('App\Models\Financiamiento', 'empr_id', 'empr_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id');
    }
    

}
