<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cronograma
 *
 * @property $cron_id
 * @property $empr_id
 * @property $cron_fech_inic
 * @property $cron_fech_fin
 * @property $cron_proy
 * @property $cron_desc
 * @property $cron_type
 * @property $cron_hide_child
 * @property $cron_done
 * @property $cron_esta
 * @property $created_at
 * @property $updated_at
 *
 * @property Emprendimiento $emprendimiento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cronograma extends Model
{
  public $incrementing = false;   
    protected $primaryKey="cron_id";
    static $rules = [
		'cron_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cron_id','empr_id','cron_fech_inic','cron_fech_fin','cron_proy','cron_desc','cron_type','cron_hide_child','cron_done','cron_esta','cron_resp'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function emprendimiento()
    {
        return $this->hasOne('App\Models\Emprendimiento', 'empr_id', 'empr_id');
    }
    

}
