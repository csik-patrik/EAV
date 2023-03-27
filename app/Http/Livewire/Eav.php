<?php

namespace App\Http\Livewire;

use App\Models\EntityType;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Eav extends Component
{
    public $entityTypes;

    public $selectedEntityTypeId = 1;

    public $entities;

    public $attributes;


    public function selectEntityType()
    {
        try {
            $this->entities = DB::table('entities')->where('type_id', $this->selectedEntityTypeId)->get();

            $this->attributes = DB::table('attributes')->where('type_id', $this->selectedEntityTypeId)->get();
        } catch(\Illuminate\Database\QueryException $exception) {

        }
    }

    public function mount()
    {
        $this->entities = DB::table('entities')->where('type_id', $this->selectedEntityTypeId)->get();

        $this->attributes = DB::table('attributes')->where('type_id', $this->selectedEntityTypeId)->get();

        $this->entityTypes = EntityType::get();
    }

    public function render()
    {
        return view('livewire.eav');
    }
}
