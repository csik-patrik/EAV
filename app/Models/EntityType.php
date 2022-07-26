<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityType extends Model
{
    use HasFactory;

    protected $table = 'entity_types';

    protected $fillable = ['label'];

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'type_id', 'id');
    }

    public function entity()
    {
        return $this->belongsToMany(Entity::class, 'type_id', 'id');
    }

    public function values()
    {
        return $this->belongsToMany(EntityType::class, 'type_id', 'id');
    }
}
