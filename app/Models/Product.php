<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'old_price',
        'image',
        'specifications',
        'category',
        'featured',
    ];

    protected $casts = [
        'specifications' => 'array',
        'featured' => 'boolean',
        'price' => 'decimal:2',
        'old_price' => 'decimal:2',
    ];

    /**
     * Get the product route key name (slug instead of id).
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Format price as BDT currency.
     */
    public function formattedPrice(): string
    {
        return 'BDT' . number_format($this->price, 2);
    }

    /**
     * Format old price as BDT currency.
     */
    public function formattedOldPrice(): string
    {
        return $this->old_price ? 'BDT' . number_format($this->old_price, 2) : null;
    }

    /**
     * Calculate discount percentage.
     */
    public function discountPercentage(): ?int
    {
        if (!$this->old_price) {
            return null;
        }
        return round((($this->old_price - $this->price) / $this->old_price) * 100);
    }
}
