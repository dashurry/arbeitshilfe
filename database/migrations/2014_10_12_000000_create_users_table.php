<?php



/**

 * Class CreateUsersTable

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @version <1.0.0>

 * @link    https://maurofrappietro.com/

 */



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



/**

 * Class CreateUsersTable

 */

class CreateUsersTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create(

            'users',

            function (Blueprint $table) {

                $table->increments('id');

                $table->string('first_name');

                $table->string('last_name');

                $table->string('slug')->unique();

                $table->string('email')->unique();

                $table->string('password');

                $table->string('badge_id')->nullable();

                $table->string('expiry_date')->nullable();

                $table->integer('location_id')->nullable();

                $table->string('verification_code')->nullable();

                $table->tinyInteger('user_verified')->nullable();

                $table->rememberToken();

                $table->timestamps();

            }

        );

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('users');

    }

}

