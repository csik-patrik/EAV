<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $table = 'values';

    protected $fillable = [
        'entity_id',
        'type_id',
        'attribute_id',
        'value',
    ];
    public function attribute()
    {
        return $this->hasOne(Attribute::class, 'id', 'attribute_id');
    }

    public function entityType()
    {
        return $this->hasOne(EntityType::class, 'id', 'type_id');
    }
}
