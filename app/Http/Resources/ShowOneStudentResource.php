<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowOneStudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            'group' => $this->group->name,
            "group_id" => $this->group_id,
            "created_at" => $this->created_at->format('d-m-Y H-m-i'),
            "updated_at" => $this->updated_at->format('d-m-Y H-m-i'),
            'courses' => $this->courses->pluck('name','id'),
        ];
    }
}
