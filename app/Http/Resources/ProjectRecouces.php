<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectRecouces extends JsonResource
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

            'id' => $this->id,
            'category_name_ar' => $this->Category->name_ar,
            'category_name_en' => $this->Category->name_en,
            'description_ar' => $this->description_ar,
            'description_en' => $this->description_en,
            'feature_en' => $this->feature_en,
            'feature_ar' => $this->feature_ar,
            'active' => $this->active,
            'tryable' => $this->tryable,
            'special' => $this->special,
            'image' => $this->image,
            'price' => $this->price,
            'addons' => $this->Addons,
            'images' => $this->Images,
            'Colors' => $this->Colors->Colors,


        ];
    }
}
