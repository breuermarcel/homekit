<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\WaterRequest;
use App\Http\Resources\WaterResource;
use App\Models\Water;

class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WaterResource::collection(Water::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WaterRequest $request)
    {
        $water = auth()->user()->waters()->create($request->validated());

        return new WaterResource($water);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        return new WaterResource(Water::firstOrFail($uuid));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WaterRequest $request, string $uuid)
    {
        $water = Water::firstOrFail($uuid);

        $water->update($request->validated());

        return new WaterResource($water);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $water = Water::firstOrFail($uuid);

        $water->delete();

        return response()->noContent();
    }
}
