<?php



/**

 * Class CreateMessagesTable

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

 * Class CreateMessagesTable

 */

class CreateMessagesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create(

            'messages',

            function (Blueprint $table) {

                $table->increments('id');

                $table->integer('user_id')->unsigned()->index()->nullable(); 

                // $table->integer('user_id');

                $table->integer('receiver_id');

                $table->text('body');

                $table->tinyInteger('status');

                $table->timestamps();



                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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

        Schema::dropIfExists('messages');

    }

}

