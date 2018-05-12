<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'ref_id', 'provider', 'provider_id', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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

    public function productAds()
    {
        return $this->hasMany(ProductAd::class);
    }

    public function jobAds()
    {
        return $this->hasMany(JobAd::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class)->select(['user_id', 'favourable_type', 'favourable_id'])->groupBy('favourable_type', 'user_id', 'favourable_id');
    }

    public function rawFavorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favoriteHospitals()
    {
        return $this->hasMany(Favorite::class)->where('favourable_type', 'App\\Hospital');
    }


    public function favoriteClinics()
    {
        return $this->hasMany(Favorite::class)->where('favourable_type', 'App\\Clinic');
    }

    public function favoriteCosmeticClinics()
    {
        return $this->hasMany(Favorite::class)->where('favourable_type', 'App\\CosmeticClinic');
    }

    public function favoritePharmacies()
    {
        return $this->hasMany(Favorite::class)->where('favourable_type', 'App\\Pharmacy');
    }

    public function favoriteProductAds()
    {
        return $this->hasMany(Favorite::class)->where('favourable_type', 'App\\ProductAd');
    }

    public function favoriteJobAds()
    {
        return $this->hasMany(Favorite::class)->where('favourable_type', 'App\\JobAd');
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class)->select(['user_id', 'rateable_type', 'rateable_id', 'rate'])->groupBy('rateable_type', 'user_id', 'rateable_id', 'rate');
    }

    public function rateForHospitals()
    {
        return $this->hasMany(Rate::class)->select(['user_id', 'rateable_id', 'rate'])->where('rateable_type', 'App\\Hospital');
    }

    public function rateForClinics()
    {
        return $this->hasMany(Rate::class)->select(['user_id', 'rateable_id', 'rate'])->where('rateable_type', 'App\\Clinic');
    }

    public function rateForPharmacies()
    {
        return $this->hasMany(Rate::class)->select(['user_id', 'rateable_id', 'rate'])->where('rateable_type', 'App\\Pharmacy');
    }

    public function rateForCosmeticClinics()
    {
        return $this->hasMany(Rate::class)->select(['user_id', 'rateable_id', 'rate'])->where('rateable_type', 'App\\CosmeticClinic');
    }


    public function deviceTokens()
    {
        return $this->hasMany(DeviceToken::class);
    }

}
