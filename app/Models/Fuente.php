<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fuente
 *
 * @property $fuen_id
 * @property $fuen_nomb
 * @property $fue_desc
 * @property $created_at
 * @property $updated_at
 *
 * @property Fuentefinan[] $fuentefinans
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fuente extends Model
{
    
    protected $primaryKey="";
    static $rules = [
		'fuen_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fuen_id','fuen_nomb','fue_desc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fuentefinans()
    {
        return $this->hasMany('App\Models\Fuentefinan', 'fuen_id', 'fuen_id');
    }
    

}
