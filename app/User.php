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
        return $this->hasMany(BeautyCenter::class);
    }

    public function productAds()
    {
        return $this->hasMany(ProductAd::class);
    }

    public function jobAds()
    {
        return $this->hasMany(JobAd::class);
    }

    public function hospitalViews()
    {
        return $this->hasMany(HospitalView::class);
    }

    public function clinicViews()
    {
        return $this->hasMany(ClinicView::class);
    }

    public function pharmacyViews()
    {
        return $this->hasMany(PharmacyView::class);
    }

    public function beautyCenterViews()
    {
        return $this->hasMany(BeautyCenterView::class);
    }

    public function productAdViews()
    {
        return $this->hasMany(ProductAdView::class);
    }

    public function jobAdViews()
    {
        return $this->hasMany(JobAdView::class);
    }

    public function hospitalFavs()
    {
        return $this->hasMany(HospitalFav::class);
    }

    public function clinicFavs()
    {
        return $this->hasMany(ClinicFav::class);
    }

    public function pharmacyFavs()
    {
        return $this->hasMany(PharmacyFav::class);
    }

    public function beautyCenterFavs()
    {
        return $this->hasMany(BeautyCenterFav::class);
    }

    public function productAdFavs()
    {
        return $this->hasMany(ProductAdFav::class);
    }

    public function jobAdFavs()
    {
        return $this->hasMany(JobAdFav::class);
    }

    public function hospitalRates()
    {
        return $this->hasMany(HospitalRate::class);
    }

    public function clinicRates()
    {
        return $this->hasMany(ClinicRate::class);
    }

    public function pharmacyRates()
    {
        return $this->hasMany(PharmacyRate::class);
    }

    public function beautyCenterRates()
    {
        return $this->hasMany(BeautyCenterRate::class);
    }

    public function deviceTokens()
    {
        return $this->hasMany(DeviceToken::class);
    }

}
