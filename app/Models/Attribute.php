<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'attributes';

    protected $fillable = ['label', 'type_id'];

    public function entityType()
    {
        return $this->belongsTo(EntityType::class, 'type_id', 'id');
    }
}
