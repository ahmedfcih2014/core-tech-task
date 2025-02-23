<?php

namespace App\Http\Resources\Api\Auth;

use App\Http\Resources\Api\User\ProfileResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'token' => $this->resource['token'] ?? '',
            'user' => ProfileResource::make($this->resource['user'] ?? []),
        ];
    }
}
