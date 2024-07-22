<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OilResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\OilRequest;

class OilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OilResource::collection(auth()->user()->oils);
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
        return new OilResource(auth()->user()->oils()->where('uuid', $uuid)->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OilRequest $request, string $id)
    {
        $oil = auth()->user()->oils()->where('uuid', $id)->firstOrFail();

        $oil->update($request->validated());

        return new OilResource($oil);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $oil = auth()->user()->oils()->where('uuid', $uuid)->firstOrFail();

        $oil->delete();

        return response()->noContent();
    }
}
