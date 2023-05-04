<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Respuesta
 *
 * @property $resp_id
 * @property $preg_id
 * @property $resp_desc
 * @property $modu_nume
 * @property $canv_id
 * @property $resp_nume
 * @property $resp_text
 * @property $created_at
 * @property $updated_at
 * @property $resp_esta
 *
 * @property Canva $canva
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Respuesta extends Model
{
    
    protected $primaryKey="resp_id";
    static $rules = [
		//'resp_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['preg_id','resp_desc','modu_nume','canv_id','resp_nume','resp_text','resp_id_ref','resp_esta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function canva()
    {
        return $this->hasOne('App\Models\Canva', 'canv_id', 'canv_id');
    }
    

}
