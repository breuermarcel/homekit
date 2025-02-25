<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\OilResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\OilRequest;
use App\Models\Oil;

class OilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OilResource::collection(Oil::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OilRequest $request)
    {
        $oil = auth()->user()->oils()->create($request->validated());

        return new OilResource($oil);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        return new OilResource(Oil::firstOrFail($uuid));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OilRequest $request, string $uuid)
    {
        $oil = Oil::firstOrFail($uuid);

        $oil->update($request->validated());

        return new OilResource($oil);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $oil = Oil::firstOrFail($uuid);

        $oil->delete();

        return response()->noContent();
    }
}
