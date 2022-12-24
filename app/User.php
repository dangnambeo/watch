<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected  $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_name', 'email', 'password',
    ];
    public function bill(){
        return $this->hasMany(bill::class,'user_id');
    }
}
