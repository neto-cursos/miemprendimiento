<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CronActividade
 *
 * @property $id
 * @property $cron_id
 * @property $empr_id
 * @property $cron_acti_padr
 * @property $type
 * @property $project
 * @property $displayorder
 * @property $name
 * @property $start
 * @property $end
 * @property $responsable
 * @property $dependencies
 * @property $cantidad
 * @property $unidad
 * @property $costounitario
 * @property $monto
 * @property $notas
 * @property $progress
 * @property $cron_done
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property CronDependencia[] $cronDependencias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CronActividade extends Model
{
    public $incrementing = false;    
    protected $primaryKey="id";
    static $rules = [
        'id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','cron_id','empr_id','cron_acti_padr','type','project','displayorder','name','start','end','responsable','dependencies','cantidad','unidad','costounitario','monto','notas','progress','cron_done','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cronDependencias()
    {
        return $this->hasMany('App\Models\CronDependencia', 'id', 'id');
    }
    

}
