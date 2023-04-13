<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Models\Attribute;
use App\Models\EntityType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $attributes = Attribute::orderBy('type_id')
            ->orderBy('attribute_label')
            ->get();

        $entityTypes = EntityType::all();

        return view('Attribute.index', compact('attributes', 'entityTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAttributeRequest $request
     * @return RedirectResponse
     */
    public function store(StoreAttributeRequest $request)
    {
        $validated = $request->safe()->only(['attribute_label', 'type_id']);

        Attribute::create($validated);

        return redirect()->route('attribute.index')
                        ->with('success', 'Successful insert!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttributeRequest  $request
     * @param Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attribute $attribute
     * @return RedirectResponse
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('attribute.index')
                        ->with('success', 'Successful delete!');
    }
}
