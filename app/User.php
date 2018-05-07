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

    public function favoriteHospitals()
    {
        return $this->hasMany(Favorite::class)->select(['user_id', 'favourable_id'])->where('favourable_type', 'App\\Hospital')->groupBy('user_id', 'favourable_id');
    }

    public function favoriteClinics()
    {
        return $this->hasMany(Favorite::class)->select(['user_id', 'favourable_id'])->where('favourable_type', 'App\\Clinic')->groupBy('user_id', 'favourable_id');
    }

    public function favoriteCosmeticClinics()
    {
        return $this->hasMany(Favorite::class)->select(['user_id', 'favourable_id'])->where('favourable_type', 'App\\CosmeticClinic')->groupBy('user_id', 'favourable_id');
    }

    public function favoritePharmacies()
    {
        return $this->hasMany(Favorite::class)->select(['user_id', 'favourable_id'])->where('favourable_type', 'App\\Pharmacy')->groupBy('user_id', 'favourable_id');
    }

    public function favoriteProductAds()
    {
        return $this->hasMany(Favorite::class)->select(['user_id', 'favourable_id'])->where('favourable_type', 'App\\ProductAd')->groupBy('user_id', 'favourable_id');
    }

    public function favoriteJobAds()
    {
        return $this->hasMany(Favorite::class)->select(['user_id', 'favourable_id'])->where('favourable_type', 'App\\JobAd')->groupBy('user_id', 'favourable_id');
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }



    public function deviceTokens()
    {
        return $this->hasMany(DeviceToken::class);
    }

}
