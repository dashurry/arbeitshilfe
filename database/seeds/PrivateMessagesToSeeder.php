<?php

/**

 * Class PrivateMessagesToSeeder.

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

 * Class PrivateMessagesToSeeder

 */

class PrivateMessagesToSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        DB::table('private_messages_to')->insert(

            [

                [

                    'private_message_id' => 1,

                    'recipent_id' => 21,

                    'message_read' => 0,

                    'read_date' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),



                ],

                [

                    'private_message_id' => 2,

                    'recipent_id' => 4,

                    'message_read' => 0,

                    'read_date' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),



                ],

                [

                    'private_message_id' => 3,

                    'recipent_id' => 21,

                    'message_read' => 0,

                    'read_date' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),



                ],

                [

                    'private_message_id' => 4,

                    'recipent_id' => 4,

                    'message_read' => 0,

                    'read_date' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),



                ],

            ]

        );

    }

}

