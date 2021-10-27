<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'rate' => $this->rate,
            'sold' => $this->sold,
            'description' => $this->description,
            'sale_off' => $this->sale_off,
            'is_public' => $this->is_public,
            'brand' => $this->brand->name,
            'category' => $this->category->name,
            'image' => ImageResource::collection($this->images),
            //'tags' => TagResource::collection($this->tags),
            //'sizes' => SizeResource::collection($this->sizes),
 
        ];
    }
}
