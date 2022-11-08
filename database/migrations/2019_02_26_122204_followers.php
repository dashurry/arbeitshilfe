<?php



/**

 * Class Followers

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

 * Class Followers

 */

class Followers extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create(

            'followers', function (Blueprint $table) {

                $table->increments('id');

                $table->integer('follower')->nullable();

                $table->integer('following')->nullable();

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

        Schema::dropIfExists('followers');

    }

}

