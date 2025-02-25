<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ElectricityRequest;
use App\Http\Resources\ElectricityResource;
use App\Models\Electricity;

class ElectricityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ElectricityResource::collection(Electricity::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ElectricityRequest $request)
    {
        $electricity = auth()->user()->electricities()->create($request->validated());

        return new ElectricityResource($electricity);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        return new ElectricityResource(Electricity::firstOrFail($uuid));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ElectricityRequest $request, string $uuid)
    {
        $electricity = Electricity::firstOrFail($uuid);

        $electricity->update($request->validated());

        return new ElectricityResource($electricity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $electricity = Electricity::firstOrFail($uuid);

        $electricity->delete();

        return response()->noContent();
    }
}
