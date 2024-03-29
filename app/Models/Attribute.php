<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'attributes';

    protected $fillable = ['attribute_label', 'type_id'];

    public function entityType()
    {
        return $this->belongsTo(EntityType::class, 'type_id', 'id');
    }

    public function value()
    {
        return $this->belongsToMany(Value::class, 'type_id', 'id');
    }
}
