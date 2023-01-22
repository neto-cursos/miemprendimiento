<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RespCuestionario
 *
 * @property $resp_cuest_id
 * @property $canv_id
 * @property $cuest_id
 * @property $opci_cuest_id
 * @property $modu_nume
 * @property $resp_cuest_desc
 * @property $resp_cuest_text
 * @property $resp_cuest_esta
 * @property $created_at
 * @property $updated_at
 *
 * @property Canva $canva
 * @property Cuestionario $cuestionario
 * @property OpciCuestionario $opciCuestionario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RespCuestionario extends Model
{
    
    protected $primaryKey="resp_cuest_id";
    static $rules = [
		//'resp_cuest_id' => 'required',
		'canv_id' => 'required',
		'cuest_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['canv_id','cuest_id','opci_cuest_id','modu_nume','resp_cuest_desc','resp_cuest_text','resp_cuest_esta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function canva()
    {
        return $this->hasOne('App\Models\Canva', 'canv_id', 'canv_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cuestionario()
    {
        return $this->hasOne('App\Models\Cuestionario', 'cuest_id', 'cuest_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function opciCuestionario()
    {
        return $this->hasOne('App\Models\OpciCuestionario', 'opci_cuest_id', 'opci_cuest_id');
    }
    

}
