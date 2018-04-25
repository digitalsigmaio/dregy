<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobAdResource extends JsonResource
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
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'salary' => $this->salary,
            'ref_id' => $this->ref_id,
            'category'=> $this->category,
            'experience_level' => $this->experienceLevel,
            'employment_type' => $this->employmentType,
            'type' => $this->type,
            'education_level' => $this->educationLevel,
            'region' => $this->region,
            'city' => $this->city,
            'address' => $this->address,
            'img' => $this->img,
            'premium' => $this->premium,
            'phone' => $this->phoneNumbers->pluck('number'),
            'favorites' => [
                'count' => $this->favorites->count(),
                'users_id' => $this->favorites->pluck('user_id')
            ],
            'views' => $this->views,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
