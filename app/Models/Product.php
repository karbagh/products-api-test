<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translations\HasTranslation;
use App\Interfaces\Models\TranslationInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model implements TranslationInterface
{
    use HasFactory, HasTranslation, SoftDeletes;

    /**
     * @var array|string[]
     */
    public array $translatable = [
        'name',
        'description',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'price',
    ];

    /**
     * @return void
     */
    protected static function boot(): void
    {
        static::creating(function (self $product) {
            $product->uuid = Str::uuid();
        });

        parent::boot();
    }

    /**
     * @return string
     */
    public function getTranslationRelation(): string
    {
        return ProductTranslation::class;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
