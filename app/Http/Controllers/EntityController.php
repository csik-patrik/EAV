<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntityRequest;
use App\Http\Requests\UpdateEntityRequest;
use App\Models\Entity;
use App\Models\EntityType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $entities = Entity::all();

        $entityTypes = EntityType::all();

        return view('Entity.index', compact('entities', 'entityTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEntityRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreEntityRequest $request)
    {
        Entity::create($request->all());

        return redirect()->route('entity.index')
            ->with('success', 'Successful insert!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function show(Entity $entity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function edit(Entity $entity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEntityRequest  $request
     * @param  Entity  $entity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntityRequest $request, Entity $entity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Entity  $entity
     * @return RedirectResponse
     */
    public function destroy(Entity $entity)
    {
        $entity->delete();

        return redirect()->route('entity.index')
                        ->with('success', 'Successful delete!');
    }
}
