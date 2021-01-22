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
        'name', 'email', 'password','parent_id','upline_id','level', 'is_active', 'is_admin', 'dni_photo_path_1', 'dni_photo_path_2', 'celular', 'path', 'sameline', 'is_approved'
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
        return $this->hasMany(User::class, 'parent_id')->where('is_approved', true);
    }

    public function getUrlForRegisterAttribute()
    {
        return env("APP_URL")."/".$this->id;
    }

    public function getDownlinersAttribute()
    {
        $users = self::where('path', 'LIKE', $this->path . '%');
        if ($this->path!=0) {
            $users =  $users->where('upline_id', '>', $this->upline_id);
        }
        
        $users =  $users->get();
        
        if ($this->path!=0) {
            $users_2 = self::where('path', '=', $this->path)
            ->get();
            
            $users = $users->merge($users_2);
        }

        $i = 0;
        foreach ($users as $user) {
            $data[$i]['id'] = $user->id;
            $data[$i]['name'] = $user->name;
            $data[$i]['email'] = $user->email;
            $data[$i]['profile_photo_url'] = $user->profile_photo_url;
            $data[$i]=collect($data[$i]);
            $data[$i++]['parent'] = ($user['upline_id']==$this->upline_id ? "": $user['upline_id']);
        }

        return collect($data);
    }

    public function getDownlinersUnlimitedAttribute()
    {
        $current_user = self::where('id', '=', $this->id)
        ->get();

        $users = self::where('path', 'LIKE', $this->path . '%');
        if ($this->path!=0) {
            $users =  $users->where('upline_id', '>', $this->upline_id);
        }
        
        $max_level = $this->level + 4;
        $users = $users->where('level', '>', $this->level)
        ->where('level', '<', $max_level)
        ->get();

        if ($this->path!=0) {
            $users_2 = self::where('path', '=', $this->path)
            ->get();

            $users = $users->merge($users_2);
        }

        $users = $users->merge($current_user);

        $i = 0;
        foreach ($users as $user) {
            $data[$i]['id'] = $user->id;
            $data[$i]['name'] = $user->name;
            $data[$i]['email'] = $user->email;
            $data[$i]['profile_photo_url'] = $user->profile_photo_url;
            $data[$i]=collect($data[$i]);
            $data[$i++]['parent'] = ($user['upline_id']==$this->upline_id ? "": $user['upline_id']);
        }

        return collect($data);
    }
}