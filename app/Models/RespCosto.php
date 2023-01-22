<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RespCosto
 *
 * @property $resp_cost_id
 * @property $canv_id
 * @property $cost_id
 * @property $modu_nume
 * @property $resp_cost_desc
 * @property $resp_cost_acti
 * @property $resp_cost_monto
 * @property $resp_cost_esta
 * @property $created_at
 * @property $updated_at
 *
 * @property Canva $canva
 * @property Costo $costo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RespCosto extends Model
{
    
    protected $primaryKey="resp_cost_id";
    static $rules = [
		//'resp_cost_id' => 'required',
		'canv_id' => 'required',
		'cost_id' => 'required',
		'resp_cost_acti' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['canv_id','cost_id','modu_nume','resp_cost_desc','resp_cost_acti','resp_cost_monto','resp_cost_esta'];


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
    public function costo()
    {
        return $this->hasOne('App\Models\Costo', 'cost_id', 'cost_id');
    }
    

}
