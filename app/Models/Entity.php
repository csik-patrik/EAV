<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $table = 'entities';

    protected $fillable = ['type_id'];

    public function EntityType()
    {
        return $this->hasOne(EntityType::class, 'id', 'type_id');
    }
}
