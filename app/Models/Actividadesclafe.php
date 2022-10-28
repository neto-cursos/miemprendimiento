<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Actividadesclafe
 *
 * @property $acti_clav_id
 * @property $cate_acti_id
 * @property $empr_id
 * @property $rubr_acti_id
 * @property $acti_clav_desc
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoriasact $categoriasact
 * @property Emprendimiento $emprendimiento
 * @property Rubroact $rubroact
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Actividadesclafe extends Model
{
    
    protected $primaryKey="";
    static $rules = [
		'acti_clav_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['acti_clav_id','cate_acti_id','empr_id','rubr_acti_id','acti_clav_desc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoriasact()
    {
        return $this->hasOne('App\Models\Categoriasact', 'cate_acti_id', 'cate_acti_id');
    }
    
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
    public function rubroact()
    {
        return $this->hasOne('App\Models\Rubroact', 'rubr_acti_id', 'rubr_acti_id');
    }
    

}
