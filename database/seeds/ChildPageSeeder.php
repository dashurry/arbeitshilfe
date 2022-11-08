<?php

/**

 * Class ChildPageSeeder.

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @link    https://maurofrappietro.com/

 */



use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;



/**

 * Class ChildPageSeeder

 */

class ChildPageSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        DB::table('child_pages')->insert(

            [

                [

                    'parent_id' => 1,

                    'child_id'  => 3,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'parent_id' => 1,

                    'child_id'  => 2,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'parent_id' => 1,

                    'child_id'  => 5,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'parent_id' => 1,

                    'child_id'  => 6,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'parent_id' => 1,

                    'child_id'  => 7,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'parent_id' => 1,

                    'child_id'  => 8,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'parent_id' => 1,

                    'child_id'  => 9,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

            ]

        );

    }

}

