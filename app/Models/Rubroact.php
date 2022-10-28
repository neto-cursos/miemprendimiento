<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rubroact
 *
 * @property $rubr_acti_id
 * @property $rubr_acti_nomb
 * @property $rubr_acti_desc
 * @property $created_at
 * @property $updated_at
 *
 * @property Actividadesclafe[] $actividadesclaves
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rubroact extends Model
{
    
    protected $primaryKey="";
    static $rules = [
		'rubr_acti_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rubr_acti_id','rubr_acti_nomb','rubr_acti_desc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actividadesclaves()
    {
        return $this->hasMany('App\Models\Actividadesclafe', 'rubr_acti_id', 'rubr_acti_id');
    }
    

}
