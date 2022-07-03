<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'registration_type',
        'status',
        'created_by',
        'updated_by',
        'updated_by',
        'created_at',
        'updated_at',
        'disable_by',
        'disable_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function otherInfo () {
        return $this->hasOne(other_infos::class, 'users_id', 'id');
    }

    public function academicInfo () {
        return $this->hasOne(academic_infos::class, 'users_id', 'id');
    }

    public function contactInfos () {
        return $this->hasMany(contact_infos::class, 'users_id', 'id');
    }

    public function appointments () {
        return $this->hasMany(appointments::class, 'users_id', 'id');
    }

    public function guidance () {
        return $this->hasMany(guidances::class, 'users_id', 'id');
    }

    public function instructors () {
        return $this->hasMany(instructors::class, 'users_id', 'id');
    }

    public function chats () {
        return $this->hasMany(chats::class, 'receiver_id', 'id');
    }
}
