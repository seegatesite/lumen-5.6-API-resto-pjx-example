<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class m_menu extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public $timestamps = false;
    protected $table = 'm_menu';
    protected $fillable = [
        'name', 'type_id','price','note'
    ];
    public function m_menu_type()
    {
        return $this->belongsTo('App\m_menu_type');
    }
}
