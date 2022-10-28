<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoriasact
 *
 * @property $cate_acti_id
 * @property $cate_acti_nomb
 * @property $cate_acti_desc
 * @property $created_at
 * @property $updated_at
 *
 * @property Actividadesclafe[] $actividadesclaves
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categoriasact extends Model
{
    
    protected $primaryKey="";
    static $rules = [
		'cate_acti_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cate_acti_id','cate_acti_nomb','cate_acti_desc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actividadesclaves()
    {
        return $this->hasMany('App\Models\Actividadesclafe', 'cate_acti_id', 'cate_acti_id');
    }
    

}
