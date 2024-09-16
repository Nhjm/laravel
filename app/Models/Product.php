<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalogue_id',
        'slug',
        'sku',
        'name',
        'image',
        'price_regular',
        'price_sale',
        'description',
        'material',
        'user_manual',
        'content',
        'view',
        'is_active',
    ];

    protected $cast = [
        'is_active' => 'boolean',
    ];

    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }


}
