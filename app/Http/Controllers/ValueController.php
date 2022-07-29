<?php

namespace App\Http\Controllers;

use App\Models\Value;
use App\Http\Requests\StoreValueRequest;
use App\Http\Requests\UpdateValueRequest;
use App\Models\Entity;
use App\Models\EntityType;
use App\Models\Attribute;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = Value::orderBy('entity_id')->get();

        $entityTypes = EntityType::all();

        $entities = Entity::all();

        $attributes = Attribute::all();

        return view('Value.index',compact('values', 'entityTypes', 'entities', 'attributes'));
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
            'value']);
        
        Value::create($validated);
     
        return redirect()->route('value.index')
                        ->with('success','Successful insert!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Value  $value
     * @return \Illuminate\Http\Response
     */
    public function show(Value $value)
    {
        //
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
    public function destroy(Value $value)
    {
        $value->delete();

        return redirect()->route('value.index')
                        ->with('success','Successful delete!');
    }
}
