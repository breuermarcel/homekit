<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\GasResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\GasRequest;
use App\Models\Gas;

class GasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GasResource::collection(Gas::all());
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
        return new GasResource(Gas::findOrFail($uuid));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GasRequest $request, string $uuid)
    {
        $gas = Gas::firstOrFail($uuid);

        $gas->update($request->validated());

        return new GasResource($gas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $gas = Gas::firstOrFail($uuid);

        $gas->delete();

        return response()->noContent();
    }
}
