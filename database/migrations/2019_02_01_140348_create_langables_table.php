<?php



/**

 * Class CreateLangablesTable

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

 * Class CreateLangablesTable

 */

class CreateLangablesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('langables', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('language_id');

            $table->integer('langable_id');

            $table->string('langable_type');

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

        Schema::dropIfExists('langables');

    }

}

