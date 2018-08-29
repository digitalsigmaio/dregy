<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class ProductAdResource extends JsonResource
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
            'user_name'  => $this->user->name,
            'user_email' => $this->user->email,
            'title' => $this->title,
            'description' => $this->description,
            'evaluation' => $this->evaluation,
            'slug' => $this->slug,
            'status' => $this->status,
            'price' => $this->price,
            'ref_id' => $this->ref_id,
            'category' => $this->category,
            'region' => $this->region,
            'city' => $this->city,
            'address' => $this->address,
            'img' => $this->img,
            'status' => $this->status,
            'premium' => $this->featured,
            'phone' => $this->phoneNumbers->pluck('number'),
            'favorites' => $this->favorites,
            'views' => $this->views,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
