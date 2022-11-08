<?php



/**

 * Class CreatePayoutsTable

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

 * Class CreatePayoutsTable

 */

class CreatePayoutsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create(

            'payouts',

            function (Blueprint $table) {

                $table->increments('id');

                $table->integer('user_id')->unsigned()->index()->nullable();

                $table->string('amount');

                $table->string('payment_method');

                $table->string('currency');

                $table->string('paypal_id');

                $table->string('status');

                $table->foreign('user_id')

                    ->references('id')->on('users')

                    ->onDelete('cascade');

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

        Schema::dropIfExists('payouts');

    }

}

