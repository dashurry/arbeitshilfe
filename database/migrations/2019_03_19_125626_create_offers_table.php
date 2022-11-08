<?php



/**

 * Class CreateOffersTable

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

 * Class CreateOffersTable

 */

class CreateOffersTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create(

            'offers', function (Blueprint $table) {

                $table->increments('id');

                $table->integer('user_id');

                $table->integer('freelancer_id');

                $table->integer('project_id');

                $table->text('description')->nullable();

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

        Schema::dropIfExists('offers');

    }

}

