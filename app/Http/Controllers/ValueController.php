<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreValueRequest;
use App\Http\Requests\UpdateValueRequest;
use App\Models\Value;
use Illuminate\Support\Facades\DB;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = $this->getValuesByEntityId(null);

        $entityTypes = DB::table('entity_types')->get();

        $entities = DB::table('entities')->get();

        $attributes = DB::table('attributes')->get(); 

        return view('Value.index', compact('values', 'entityTypes',
                                    'entities', 'attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreValueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValueRequest $request)
    {
        $validated = $request->safe()->only([
            'type_id',
            'entity_id',
            'attribute_id',
            'value', ]);

        Value::create($validated);

        return redirect()->route('value.index')
                        ->with('success', 'Successful insert!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function show($entity_type_id)
    {
        $values = $this->getValuesByEntityId($entity_type_id);

        $entityTypes = DB::table('entity_types')->get();

        $entities = DB::table('entities')->get();

        $attributes = DB::table('attributes')->get(); 

        return view('Value.index', compact('values', 'entityTypes',
                                    'entities', 'attributes'));

        return view('Value.index', compact('values'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function edit(Value $value)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateValueRequest  $request
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateValueRequest $request, Value $value)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('values')->where('id', $id)->delete();

        return redirect()->route('value.index')
                        ->with('success', 'Successful delete!');
    }

    private function getValuesByEntityId($entity_type_id){
        
        if($entity_type_id==null){
            
            $values = DB::table('values')
            ->join('attributes', 'values.attribute_id', '=', 'attributes.attribute_id')
            ->join('entity_types', 'values.type_id', '=', 'entity_types.id')
            ->select(
                'values.id',
                'values.entity_id',
                'entity_types.entity_type_label',
                'attributes.attribute_label',
                'attributes.attribute_id',
                'values.value'
            )
            ->orderBy('values.entity_id')
            ->orderBy('attributes.attribute_id')
            ->get();
            
            return $values;
        }
        else{
            $values = DB::table('values')
            ->join('attributes', 'values.attribute_id', '=', 'attributes.attribute_id')
            ->join('entity_types', 'values.type_id', '=', 'entity_types.id')
            ->select(
                'values.id',
                'values.entity_id',
                'values.entity_id',
                'entity_types.entity_type_label',
                'attributes.attribute_label',
                'attributes.attribute_id',
                'values.value'
            )
            ->where('values.type_id', $entity_type_id)
            ->orderBy('values.entity_id')
            ->orderBy('attributes.attribute_id')
            ->get();

            return $values;
        }
        
    }
}