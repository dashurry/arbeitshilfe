<?php

/**

 * Class CheckForMaintenanceMode.

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @link    https://maurofrappietro.com/

 */

namespace App\Http\Middleware;



use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;



/**

 * Class CheckForMaintenanceMode

 *

 */

class CheckForMaintenanceMode extends Middleware

{

    /**

     * The URIs that should be reachable while maintenance mode is enabled.

     *

     * @var array

     */

    protected $except = [

        //

    ];

}

