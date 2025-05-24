<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\UserResource;

class EmployeeResource extends JsonResource
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
            // 'user' => new UserResource($this->whenLoaded('user')),
            // 'role' => $this->role,
            'restaurant_id' => $this->restaurant_id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'user_id' => $this->user->id,
        ];
    }
}
