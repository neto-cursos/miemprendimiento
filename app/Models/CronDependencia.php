<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CronDependencia
 *
 * @property $cron_dep_id
 * @property $id
 * @property $cron_dep_tareas
 *
 * @property CronActividade $cronActividade
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CronDependencia extends Model
{
  public $timestamps = false;
  protected $primaryKey = "cron_dep_id";
  static $rules = [
    // 'cron_dep_id' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['id', 'cron_dep_tareas'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function cronActividade()
  {
    return $this->hasOne('App\Models\CronActividade', 'id', 'id');
  }
}
