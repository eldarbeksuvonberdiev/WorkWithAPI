<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeCharacteristic extends Model
{
    protected $fillable = [
        'attribute_id',
        'characteristic_id'
    ];
}
