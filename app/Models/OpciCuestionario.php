<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OpciCuestionario
 *
 * @property $opci_cuest_id
 * @property $cuest_id
 * @property $modu_nume
 * @property $opci_cuest_type
 * @property $opci_cuest_text
 * @property $opci_cuest_desc
 * @property $opci_cuest_esta
 * @property $created_at
 * @property $updated_at
 *
 * @property Cuestionario $cuestionario
 * @property RespCuestionario[] $respCuestionarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OpciCuestionario extends Model
{
    
    protected $primaryKey="opci_cuest_id";
    static $rules = [
		// 'opci_cuest_id' => 'required',
		'cuest_id' => 'required',
		'opci_cuest_type' => 'required',
		'opci_cuest_text' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cuest_id','modu_nume','opci_cuest_type','opci_cuest_text','opci_cuest_desc','opci_cuest_esta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cuestionario()
    {
        return $this->hasOne('App\Models\Cuestionario', 'cuest_id', 'cuest_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respCuestionarios()
    {
        return $this->hasMany('App\Models\RespCuestionario', 'opci_cuest_id', 'opci_cuest_id');
    }
    

}
