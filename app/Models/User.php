<?php

namespace App\Models;

use App\Models\HasDniPhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasDniPhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','parent_id','upline_id','level', 'is_active', 'is_admin', 'dni_photo_path_1', 'dni_photo_path_2', 'celular'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'dni_photo_url_one',
        'dni_photo_url_two',
        'url_for_register'
    ];

    // public function parent()
    // {
    //     return $this->belongsTo('User', 'parent_id');
    // }

    // protected with

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function getUrlForRegisterAttribute()
    {
        return env("APP_URL")."/".$this->id;
    }
}