<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sugerencia
 *
 * @property $suge_id
 * @property $preg_id
 * @property $modu_nume
 * @property $suge_tipo
 * @property $suge_rubro
 * @property $suge_text
 * @property $suge_link
 * @property $created_at
 * @property $updated_at
 *
 * @property Pregunta $pregunta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sugerencia extends Model
{
    
    protected $primaryKey="suge_id";
    static $rules = [
		//'suge_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['preg_id','modu_nume','suge_tipo','suge_rubro','suge_text','suge_link'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pregunta()
    {
        return $this->hasOne('App\Models\Pregunta', 'preg_id', 'preg_id');
    }
    

}
