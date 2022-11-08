<?php



/**

 * Class CreateDeliveryTimeTable

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

 * Class CreateDeliveryTimeTable

 */

class CreateDeliveryTimeTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create(

            'delivery_times',

            function (Blueprint $table) {

                $table->increments('id');

                $table->string('title');

                $table->string('slug');

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

        Schema::dropIfExists('delivery_times');

    }

}

