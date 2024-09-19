<?php

namespace App\Models;

use App\Interfaces\Models\TranslationInterface;
use App\Traits\Translations\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model implements TranslationInterface
{
    use HasFactory, HasTranslation, SoftDeletes;

    /**
     * @var array|string[]
     */
    public array $translatable = [
        'name',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'name' => 'string',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
    ];

    /**
     * @return void
     */
    protected static function boot(): void
    {
        static::creating(function (self $category) {
            $category->uuid = Str::uuid();
        });

        parent::boot();
    }

    public function getTranslationRelation(): string
    {
        return CategoryTranslation::class;
    }

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
