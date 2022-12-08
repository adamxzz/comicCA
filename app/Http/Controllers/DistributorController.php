<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\DistributorCollection;
use App\Http\Resources\DistributorResource;
use App\Http\Requests\StoreDistributorRequest;
use App\Http\Requests\UpdateDistributorRequest;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
 * @OA\Get(
 *     path="/api/distributor",
 *     description="Displays all the distributors",
 *     tags={"Distributors"},
     *      @OA\Response(
        *          response=200,
        *          description="Task failed unsuccessfully, Returns a list of distributors in a JSON format"
        *       ),
        *      @OA\Response(
        *          response=401,
        *          description="Unauthenticated",
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
 * )
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        return new DistributorCollection(Distributor::paginate(1));
    }

    /**
     * Stores a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/api/distributor",
     *      operationId="store distributor",
     *      tags={"Distributors"},
     *      summary="Create a new Distributor",
     *      description="Stores the distributor in the DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name", "biography"},
     *            @OA\Property(property="name", type="string", format="string", example="Sample Name"),
     *            @OA\Property(property="biography", type="string", format="string", example="Bit of text for the biography"),
     *          )
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
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
     * Displays the specified distributor by said ID.
     * @OA\Get(
    *     path="/api/distributors/{id}",
    *     description="Gets a distributors by ID",
    *     tags={"Distributors"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Distributor id",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer")
     *          ),
        *      @OA\Response(
        *          response=200,
        *          description="Successful task"
        *       ),
        *      @OA\Response(
        *          response=401,
        *          description="Unauthenticated",
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
 * )
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */

    public function show(Distributor $distributor)
    {
        return new DistributorResource($distributor);
    }

    /**
     * Update the specified resource in storage.
     * @OA\Put(
    *     path="/api/distributor/{id}",
    *     description="Updates a distributor by ID",
    *     tags={"Distributors"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Comic id",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer")
     *          ),
        *      @OA\Response(
        *          response=200,
        *          description="Successful task"
        *       ),
        *      @OA\Response(
        *          response=401,
        *          description="Unauthenticated",
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
        * )
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
     * @OA\Delete(
     *    path="/api/distributor/{id}",
     *    operationId="delete ",
     *    tags={"Distributors"},
     *    summary="Delete a Distributor",
     *    description="Delete Distributor",
     *    @OA\Parameter(name="id", in="path", description="Id of a Distributor", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Success",
     *         @OA\JsonContent(
     *         @OA\Property(property="status_code", type="integer", example="204"),
     *         @OA\Property(property="data",type="object")
     *          ),
     *       )
     *      )
     *     ) 
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
