<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GasResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\GasRequest;

class GasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GasResource::collection(auth()->user()->gases);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GasRequest $request)
    {
        $gas = auth()->user()->gases()->create($request->validated());

        return new GasResource($gas);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        return new GasResource(auth()->user()->gases()->where('uuid', $uuid)->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GasRequest $request, string $id)
    {
        $gas = auth()->user()->gases()->where('uuid', $id)->firstOrFail();

        $gas->update($request->validated());

        return new GasResource($gas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $gas = auth()->user()->gases()->where('uuid', $uuid)->firstOrFail();

        $gas->delete();

        return response()->noContent();
    }
}
