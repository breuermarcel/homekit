<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ElectricityRequest;
use App\Http\Resources\ElectricityResource;

class ElectricityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ElectricityResource::collection(auth()->user()->electricities);
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
        return new ElectricityResource(auth()->user()->electricities()->where('uuid', $uuid)->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ElectricityRequest $request, string $uuid)
    {
        $electricity = auth()->user()->electricities()->where('uuid', $uuid)->firstOrFail();

        $electricity->update($request->validated());

        return new ElectricityResource($electricity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $electricity = auth()->user()->electricities()->where('uuid', $uuid)->firstOrFail();

        $electricity->delete();

        return response()->noContent();
    }
}
