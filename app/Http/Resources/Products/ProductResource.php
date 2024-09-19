<?php

namespace App\Http\Resources\Products;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use NumberFormatter;

class ProductResource extends JsonResource
{
    /**
     * @OA\Schema(
     *     title="Product Resource",
     *     description="Product resource",
     *     schema="ProductResourceSchema",
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
     * 	   @OA\Property(
     *          property="description",
     *          type="string",
     *          example="Description of this product."
     *     ),
     * 	    @OA\Property(
     *          property="price",
     *          type="number",
     *          example="15000.00"
     *      ),
     * 	    @OA\Property(
     *          property="category",
     *          type="object",
     * 	        @OA\Property(
     *           property="main",
     *           type="object",
     *           ref="#/components/schemas/CategoryResourceSchema",
     *          ),
     *      ),
     * )
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $fmt = numfmt_create('hy_AM', NumberFormatter::CURRENCY);

        return [
            'id' => $this->uuid,
            'name' => $this->name,
            'description' => $this->description,
            'price' => numfmt_format_currency($fmt, round($this->price, 3), "AMD"),
            'category' => CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}
