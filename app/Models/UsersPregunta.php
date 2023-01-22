<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersPregunta
 *
 * @property $usr_preg_id
 * @property $modu_id
 * @property $id
 * @property $empr_id
 * @property $usr_preg_own
 * @property $usr_repl_preg_id
 * @property $usr_preg_nume
 * @property $usr_preg_text
 * @property $usr_preg_desc
 * @property $usr_preg_esta
 * @property $created_at
 * @property $updated_at
 *
 * @property Modulo $modulo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UsersPregunta extends Model
{
    
    protected $primaryKey="usr_preg_id";
    static $rules = [
		//'usr_preg_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['modu_id','empr_id','usr_preg_own','usr_repl_preg_id','usr_preg_nume','usr_preg_text','usr_preg_desc','usr_preg_esta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modulo()
    {
        return $this->hasOne('App\Models\Modulo', 'modu_id', 'modu_id');
    }
    

}
