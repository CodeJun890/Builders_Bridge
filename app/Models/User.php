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
        'profile',
        'email',
        'password',
        'firstname',
        'middlename',
        'lastname',
        'gender',
        'phoneNumber',
        'birthday',
        'current_job_title',
        'current_company_name',
        'about',
        'certifications',
        'work_experience',
        'education',
        'social_links',
        'addresses',
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

    public function savedLists(){
        return $this->hasMany(SavedList::class);
    }

    public function rentals(){
        return $this->hasMany(Rental::class, 'rental_owner');
    }
    public function services(){
        return $this->hasMany(Service::class, 'service_owner');
    }
}
