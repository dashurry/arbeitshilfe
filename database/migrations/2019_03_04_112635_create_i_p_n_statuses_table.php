<?php



/**

 * Class CreateIPNStatusesTable

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

 * Class CreateIPNStatusesTable

 */

class CreateIPNStatusesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('i_p_n_statuses', function (Blueprint $table) {

            $table->increments('id');

            $table->text('payload');

            $table->string('status');

            $table->timestamps();

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('i_p_n_statuses');

    }

}

