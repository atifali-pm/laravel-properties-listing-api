<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Http\Resources\PropertiesResource;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PropertiesResource
     */
    public function index(): PropertiesResource
    {
        return PropertiesResource::collection(Property::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePropertyRequest
     * @return PropertiesResource
     */
    public function store(StorePropertyRequest $request)
    {
        $this->validated();

        $property = Property::create([
            'broker_id' => $request->broker_id,
            'address' => $request->address,
            'city' => $request->city,
            'listing_type' => $request->listing_type,
            'description' => $request->description,
            'build_year' => $request->build_year
        ]);

        $property->characteristics()->create([
            'property_id' => $property->id,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'price_sqft' => $request->price_sqft,
            'property_type' => $request->property_type,
            'status' => $request->status,
            'sqft' => $request->sqft,
        ]);

        return new PropertiesResource($property);

    }

    /**
     * Display the specified resource.
     *
     * @param Property $property
     * @return PropertiesResource
     */
    public function show(Property $property)
    {
        return new PropertiesResource($property);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePropertyRequest $request
     * @param Property $property
     * @return PropertiesResource
     */
    public function update(UpdatePropertyRequest $request, Property $property): PropertiesResource
    {
        $property->update($request->only([
            'broker_id', 'address', 'listing_type', 'city', 'zip_code', 'description', 'build_year'
        ]));

        $property->characteristics()->where('property_id', $property->id)->update($request->only([
            'property_id', 'price', 'bedrooms', 'bathrooms', 'sqft', 'price_sqft', 'property_type', 'status'
        ]));

        return new PropertiesResource($property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return response()->json([
            'success' => true,
            'message' => 'Property has been deleted'
        ]);
    }
}
