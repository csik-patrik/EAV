<?php

namespace App\Http\Controllers;

use App\Models\EntityType;
use App\Http\Requests\StoreEntityTypeRequest;
use App\Http\Requests\UpdateEntityTypeRequest;

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

        return $entityTypes;
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
     * @param  \App\Http\Requests\StoreEntityTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntityTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntityType  $entityType
     * @return \Illuminate\Http\Response
     */
    public function show(EntityType $entityType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntityType  $entityType
     * @return \Illuminate\Http\Response
     */
    public function edit(EntityType $entityType)
    {
        //
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
        //
    }
}
