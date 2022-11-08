<?php

/**

 * Class RedirectIfAuthenticated.

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @link    https://maurofrappietro.com/

 */

namespace App\Http\Middleware;



use Closure;

use Illuminate\Support\Facades\Auth;



/**

 * Class RedirectIfAuthenticated

 *

 */

class RedirectIfAuthenticated

{

    /**

     * Handle an incoming request.

     *

     * @param \Illuminate\Http\Request $request request

     * @param \Closure                 $next    next

     * @param string|null              $guard   guard

     *

     * @return mixed

     */

    public function handle($request, Closure $next, $guard = null)

    {

        if (Auth::guard($guard)->check()) {

            return redirect('/');

        }



        return $next($request);

    }

}

