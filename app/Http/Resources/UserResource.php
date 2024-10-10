<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'electricities' => ElectricityResource::collection($this->electricities),
            'gases' => GasResource::collection($this->gases),
            'oils' => OilResource::collection($this->oiles),
            'waters' => WaterResource::collection($this->wateres),
        ];
    }
}
