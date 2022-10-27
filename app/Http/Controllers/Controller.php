<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//the controller interacts with the model class to create data for the view
//swagger stuff
 /**
 * @OA\Info(
 *      version="2.0.0",
 *      title="Comic API",
 *      description="AdamZ Easy Comic API",

 *      @OA\Contact(
 *          email="N00191010@iadt.ie"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Get(
 *   path="/",
 *   description="HomePage"
 *   @OA\Response(response="default", description="Welcome page")
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
