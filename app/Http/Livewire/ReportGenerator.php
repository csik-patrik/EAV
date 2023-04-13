<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use App\Models\EntityType;
use App\Models\Value;
use Livewire\Component;

class ReportGenerator extends Component
{
    public $entityTypes;

    public $selectedEntityTypeId;

    public $selectedEntityType;
    public $selectedAttributes = [];

    public $attributes;

    public $values;

    public function changeSelectedEntityType()
    {
        $this->selectedAttributes = [];

        $this->attributes = Attribute::where('type_id', $this->selectedEntityTypeId)->get();

        $this->selectedEntityType = EntityType::where('id', $this->selectedEntityTypeId)->get();
    }

    public function generate()
    {
        $this->values = Value::where('type_id', $this->selectedEntityTypeId)
            ->whereIn('attribute_id', $this->selectedAttributes)
            ->orderBy('entity_id')
            ->get();

        // Get all the unique attributes from the values collection.
        $this->attributes = $this->values->pluck('attribute')->unique();

        // Serialize the indexing of the collection.
        $this->attributes = $this->attributes->values();
    }

    public function mount()
    {
        $this->entityTypes = EntityType::get();
    }

    public function render()
    {
        return view('livewire.report-generator');
    }
}
