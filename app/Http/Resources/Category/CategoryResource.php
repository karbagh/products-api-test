<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * @OA\Schema(
     *     title="Category Resource",
     *     description="Category resource",
     *     schema="CategoryResourceSchema",
     * 	   @OA\Property(
     *          property="id",
     *          type="string",
     *          example="e904b43e-7bcf-3244-aac0-38691e72f0e1"
     *     ),
     * 	   @OA\Property(
     *          property="name",
     *          type="string",
     *          example="Product Name"
     *     ),
     * )
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'name' => $this->name,
        ];
    }
}
