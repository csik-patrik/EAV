<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use App\Models\EntityType;
use App\Models\Value;
use Livewire\Component;

class ReportGenerator extends Component
{
    public $entityTypes;
    public $selectedEntityTypeId = 1;
    public $selectedAttributes = [];
    public $reportGenerated = false;

    public function change()
    {
        $this->selectedAttributes = [];

        $this->attributes = Attribute::where('type_id', $this->selectedEntityTypeId)->get();
    }

    public function generate()
    {
        $this->values = Value::where('type_id', $this->selectedEntityTypeId)
            ->whereIn('attribute_id', $this->selectedAttributes)
            ->get();

        $this->attributes = $this->values->pluck('attribute')->unique();

        $this->reportGenerated = true;
    }

    public function mount()
    {
        $this->entityTypes = EntityType::get();
    }

    public function render()
    {
        $view = $this->reportGenerated ? 'Reports.report' : 'livewire.report-generator';

        return view($view, [
            'values' => $this->values ?? collect(),
            'attributes' => $this->attributes ?? collect()
        ]);
    }
}
