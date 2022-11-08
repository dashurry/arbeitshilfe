<?php



/**

 * Class CreatePackagesTable

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

 * Class CreatePackagesTable

 */

class CreatePackagesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create(

            'packages', function (Blueprint $table) {

                $table->increments('id');

                $table->string('title');

                $table->string('subtitle');

                $table->string('slug')->unique();

                $table->float('cost');

                $table->integer('role_id');

                $table->tinyInteger('trial');

                $table->integer('badge_id');

                $table->text('options');

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

        Schema::dropIfExists('packages');

    }

}

