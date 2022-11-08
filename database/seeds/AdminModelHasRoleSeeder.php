<?php

/**

 * Class AdminModelHasRoleSeeder

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @link    https://maurofrappietro.com/

 */

use Illuminate\Database\Seeder;



/**

 * Class AdminModelHasRoleSeeder

 */

class AdminModelHasRoleSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        DB::table('model_has_roles')->insert(

            [

                [

                    'role_id' => '1',

                    'model_id' => '1',

                    'model_type' => 'App\User',

                ],

            ]

        );

    }

}

