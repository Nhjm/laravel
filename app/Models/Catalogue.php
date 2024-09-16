<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'catalogue_id',
        'is_active',
    ];

    protected $cast = [
        'is_active' => 'boolean',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Catalogue::class, 'catalogue_id');
    }

    public function children()
    {
        return $this->hasMany(Catalogue::class)->with('children');
    }
}
