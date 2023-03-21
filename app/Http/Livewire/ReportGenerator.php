<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use App\Models\Entity;
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

    public $reportGenerated = false;

    public function change()
    {
        try {

            $this->selectedAttributes = [];

            $this->entities = Entity::where('type_id', $this->selectedEntityTypeId)->get();

            $this->attributes = Attribute::where('type_id', $this->selectedEntityTypeId)->get();

        } catch(\Illuminate\Database\QueryException $exception) {

        }
    }

    public function generate(){
        $this->reportGenerated = true;
    }

    public function mount()
    {
        $this->entityTypes = EntityType::get();
    }

    public function render()
    {
        if(!$this->reportGenerated){
            return view('livewire.report-generator');
        }
        return view('livewire.report-generated');
    }
}
