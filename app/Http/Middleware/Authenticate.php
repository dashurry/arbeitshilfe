<?php

/**

 * Class Authenticate.

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @link    https://maurofrappietro.com/

 */



namespace App\Http\Middleware;



use Illuminate\Auth\Middleware\Authenticate as Middleware;



/**

 * Class Authenticate

 *

 */

class Authenticate extends Middleware

{

    /**

     * Get the path the user should be redirected to when they are not authenticated.

     *

     * @param \Illuminate\Http\Request $request request

     *

     * @return string

     */

     // protected function redirectTo($request)

    // {

    //     if (! $request->expectsJson()) {

    //         return route('login');

    //     }

    // }





    /**

     * Get the path the user should be redirected to when they are not authenticated.

     *

     * @param \Illuminate\Http\Request $request request

     *

     * @return string

     */

    protected function redirectTo($request)

    {

        return route('login');

    }



}

