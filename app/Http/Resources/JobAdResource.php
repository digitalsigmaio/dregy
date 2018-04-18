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
            'type' => $this->jobType,
            'education_level' => $this->educationLevel,
            'region' => $this->region,
            'city' => $this->city,
            'address' => $this->address,
            'img' => $this->img,
            'promoted' => $this->promoted,
            'phone' => $this->phoneNumbers->pluck('number'),
            'favs' => [
                'count' => $this->favs->count(),
                'users_id' => $this->favs->pluck('user_id')
            ],
            'views' => $this->views,
            'review' => $this->review,
            'created_at' => $this->created_at->toFormattedDateString()
        ];
    }
}
