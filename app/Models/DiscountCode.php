<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'limit',
        'amount',
        'type',
        'start',
        'end',
        'is_active',
    ];

    protected $cast = [
        'is_active' => 'boolean',
        'start' => 'date:Y-m-d',
        'end' => 'date:Y-m-d',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }


}
