<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntityTypeRequest;
use App\Http\Requests\UpdateEntityTypeRequest;
use App\Models\EntityType;

class EntityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entityTypes = EntityType::all();

        return view('EntityType.index', compact('entityTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntityTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntityTypeRequest $request)
    {
        $validated = $request->safe()->only(['label']);

        EntityType::create($validated);

        return redirect()->route('entity-type.index')
                        ->with('success', 'Successful insert!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntityTypeRequest  $request
     * @param  \App\Models\EntityType  $entityType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntityTypeRequest $request, EntityType $entityType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntityType  $entityType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntityType $entityType)
    {
        $entityType->delete();

        return redirect()->route('entity-type.index')
                        ->with('success', 'Successful delete!');
    }
}
