<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuestionario
 *
 * @property $cuest_id
 * @property $modu_id
 * @property $cuest_text
 * @property $cuest_desc
 * @property $created_at
 * @property $updated_at
 *
 * @property Modulo $modulo
 * @property OpciCuestionario[] $opciCuestionarios
 * @property RespCuestionario[] $respCuestionarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cuestionario extends Model
{
    
    protected $primaryKey="cuest_id";
    static $rules = [
		//'cuest_id' => 'required',
		'modu_id' => 'required',
		'cuest_text' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['modu_id','cuest_text','cuest_desc'];


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
    public function opciCuestionarios()
    {
        return $this->hasMany('App\Models\OpciCuestionario', 'cuest_id', 'cuest_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respCuestionarios()
    {
        return $this->hasMany('App\Models\RespCuestionario', 'cuest_id', 'cuest_id');
    }
    

}
