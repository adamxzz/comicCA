<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use App\Http\Resources\DistributorCollection;
use App\Http\Resources\DistributorResource;
use App\Http\Requests\StoreDistributorRequest;
use App\Http\Requests\UpdateDistributorRequest;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return new DistributorCollection(Distributor::paginate(1));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreDistributorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistributorRequest $request)
    {
        $distributor = Distributor::create([
            'name' => $request->name,
            'biography' => $request->biography
        ]);

        return new DistributorResource($distributor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        return new DistributorResource($distributor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDistributorRequest $request, Distributor $distributor)
    {
        $distributor->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
    }
}
