<?php

namespace App\Http\Livewire;

use App\Models\EntityType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReportGenerator extends Component
{
    public $entityTypes;

    public $entities;

    public $attributes;

    public $selectedEntityTypeId = 1;

    public $selectedAttributes = [];

    public function change()
    {
        try {
            $this->entities = DB::table('entities')->where('type_id', $this->selectedEntityTypeId)->get();

            $this->attributes = DB::table('attributes')->where('type_id', $this->selectedEntityTypeId)->get();

        } catch(\Illuminate\Database\QueryException $exception) {
        }
    }

    public function submit()
    {
        return $this;
    }

    public function mount()
    {
        $this->entities = DB::table('entities')->where('type_id', $this->selectedEntityTypeId)->get();

        $this->attributes = DB::table('attributes')->where('type_id', $this->selectedEntityTypeId)->get();

        $this->entityTypes = EntityType::get();
    }

    public function render()
    {
        return view('livewire.report-generator');
    }
}
