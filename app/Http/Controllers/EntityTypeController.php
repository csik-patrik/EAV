<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntityTypeRequest;
use App\Http\Requests\UpdateEntityTypeRequest;
use App\Models\EntityType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EntityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $entityTypes = EntityType::all();

        return view('EntityType.index', compact('entityTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEntityTypeRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreEntityTypeRequest $request)
    {
        EntityType::create($request->all());

        return redirect()->route('entity-type.index')
            ->with('success', 'Successful insert!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEntityTypeRequest  $request
     * @param  EntityType  $entityType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntityTypeRequest $request, EntityType $entityType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EntityType  $entityType
     * @return RedirectResponse
     */
    public function destroy(EntityType $entityType)
    {
        try {
            $entityType->delete();

            return redirect()->route('entity-type.index')
                ->with('success', 'Successful delete!');
        } catch (\Illuminate\Database\QueryException $exception) {
            return redirect()->route('entity-type.index')
                ->with('failed', $exception->getMessage());
        }
    }
}
