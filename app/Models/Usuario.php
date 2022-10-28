<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Usuario
 *
 * @property $clie_id
 * @property $clie_email
 * @property $clie_pass
 * @property $clie_nomb
 * @property $clie_apell
 * @property $created_at
 * @property $updated_at
 * @property $clie_estad
 *
 * @property Emprendimiento[] $emprendimientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  static $rules = [
    'clie_id' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['clie_email', 'clie_pass', 'clie_nomb', 'clie_apell'];
  protected $hidden = [
    'clie_pass',
    'remember_token',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function getEmailAttribute()
  {
    return $this->clie_email;
  }

  public function setEmailAttribute($value)
  {
    $this->attributes['clie_email'] = strtolower($value);
  }

  public function getAuthPassword()
  {
    return $this->clie_pass;
  }
  public function username()
  {
    return 'clie_nomb';
  }
  public function emprendimientos()
  {
    return $this->hasMany('App\Models\Emprendimiento', 'clie_id', 'clie_id');
  }
}
