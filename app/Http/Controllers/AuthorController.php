<?php

namespace App\Http\Controllers;

use App\Models\Author; 
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     * @OA\Get(
    * path="/api/authors",
    * description="Displays all the authors",
    * tags={"Authors"},
     *      @OA\Response(
        *          response=200,
        *          description="Task failed unsuccessfully, Returns a list of all the authors in JSON format"
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AuthorCollection(Author::all());
    }

    /**
     * Stores a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/api/author",
     *      operationId="store author",
     *      tags={"Authors"},
     *      summary="Create a new Author",
     *      description="Stores the author in the DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"title", "description", "genre", "author", "illustrator", "issues"},
     *            @OA\Property(property="name", type="string", format="string", example="Sample Name"),
     *            @OA\Property(property="address", type="string", format="string", example="Address of the Author"),
     *            @OA\Property(property="bio", type="string", format="string", example="The biography of the author")
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
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create([
            'name' => $request->name,
            'address' => $request->address,
            'bio' => $request->bio
        ]);

        return new AuthorResource($author);
    }

    /**
     * Displays the specified author by said ID.
     * @OA\Get(
    *     path="/api/authors/{id}",
    *     description="Gets a authors by ID",
    *     tags={"Authors"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Author id",
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
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    /**
     * Update the specified resource in storage.
     * @OA\Put(
    *     path="/api/author/{id}",
    *     description="Updates a Author by ID",
    *     tags={"Authors"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Author id",
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
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @OA\Delete(
     *    path="/api/author/{id}",
     *    operationId="delete author",
     *    tags={"Authors"},
     *    summary="Delete a Author",
     *    description="Delete Author",
     *    @OA\Parameter(name="id", in="path", description="Id of a Author", required=true,
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
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
