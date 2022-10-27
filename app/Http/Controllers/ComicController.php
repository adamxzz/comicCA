<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComicCollection;
use App\Http\Resources\ComicResource;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
 * @OA\Get(
 *     path="/api/comics",
 *     description="Displays all the comics",
 *     tags={"Comics"},
     *      @OA\Response(
        *          response=200,
        *          description="Task failed unsuccessfully, Returns a list of Comics in a JSON format"
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
        return new ComicCollection(Comic::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/api/comics",
     *      operationId="store",
     *      tags={"Comics"},
     *      summary="Create a new Comic",
     *      description="Stores the comic in the DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"title", "description", "genre", "author", "illustrator", "issues"},
     *            @OA\Property(property="title", type="string", format="string", example="Sample Title"),
     *            @OA\Property(property="description", type="string", format="string", example="Interesting bit of text"),
     *            @OA\Property(property="genre", type="string", format="string", example="The category of literature"),
     *            @OA\Property(property="author", type="string", format="string", example="Person"),
     *            @OA\Property(property="illustrator", type="string", format="string", example="Person"),
     *             @OA\Property(property="issues", type="integer", format="integer", example="1")
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
    public function store(Request $request)
    {
        $comic = comic ::create($request->only([
            'title','description','genre','author','illustrator','issues'
        ]));

        return new ComicResource($comic);
    }

    /**
     * Display the specified comic by said ID.
     * @OA\Get(
    *     path="/api/comics/{id}",
    *     description="Gets a comic by ID",
    *     tags={"Comics"},
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
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return new ComicResource($comic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $comic->update($request->only([
            'title','description','genre','author','illustrator','issues'
        ]));

        return new ComicResource($comic);
    }

    /**
     *The delete function.
     *
     * @OA\Delete(
     *    path="/api/comic/{id}",
     *    operationId="destroy",
     *    tags={"Comics"},
     *    summary="Delete a Comic",
     *    description="Delete Comic",
     *    @OA\Parameter(name="id", in="path", description="Id of a Comic", required=true,
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
     *  )

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
