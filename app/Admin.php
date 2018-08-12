<?php

namespace App;

use App\Notifications\AdminResetPasswordNotification;
use App\Traits\AdminLogger;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use Notifiable, HasApiTokens, AdminLogger;

    /**
     * @var string
     *
     */
    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function hospitals()
    {
        return $this->hasMany(Hospital::class);
    }

    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }

    public function pharmacies()
    {
        return $this->hasMany(Pharmacy::class);
    }

    public function beautyCenters()
    {
        return $this->hasMany(CosmeticClinic::class);
    }

    public function productADReviews()
    {
        return $this->hasMany(ProductAd::class);
    }

    public function jobAdReviews()
    {
        return $this->hasMany(JobAd::class);
    }
}
