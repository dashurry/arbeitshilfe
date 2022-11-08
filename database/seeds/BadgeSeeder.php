<?php

/**

 * Class BadgeSeeder.

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

 * Class BadgeSeeder

 */

class BadgeSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        DB::table('badges')->insert(

            [

                [

                    'title' => 'Gold',

                    'slug' => 'gold',

                    'image' => 'featured.png',

                    'color' => '#f1c40f',

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'title' => 'Silver',

                    'slug' => 'silver',

                    'image' => 'featured.png',

                    'color' => '#e67e22',

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'title' => 'Bronze',

                    'slug' => 'Bronze',

                    'image' => 'featured.png',

                    'color' => '#2ecc71',

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

            ]

        );

    }

}

