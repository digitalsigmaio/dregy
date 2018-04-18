<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class HospitalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ar_name' => $this->ar_name,
            'en_name' => $this->en_name,
            'ar_slug' => $this->ar_slug,
            'en_slug' => $this->en_slug,
            'region' => new RegionResource($this->region),
            'city' => new CityResource($this->city),
            'ar_address' => $this->ar_address,
            'en_address' => $this->en_address,
            'ar_note' => $this->ar_note,
            'en_note' => $this->en_note,
            'website' => $this->website,
            'email' => $this->email,
            'img' => $this->img,
            'premium' => $this->premium,
            'phone' => $this->phoneNumbers->pluck('number'),
            'rate' => $this->rate,
            'favs' => [
                'count' => $this->favs->count(),
                'users_id' => $this->favs->pluck('user_id')
            ],
            'views' => $this->views,
            'specialities' => $this->specialities->pluck('id'),
            'created_at' => $this->created_at->toFormattedDateString()
        ];
    }
}