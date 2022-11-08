<?php



/**

 * Class PrivateMessages

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

 * Class PrivateMessages

 */

class PrivateMessages extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create(

            'private_messages',

            function (Blueprint $table) {

                $table->increments('id');

                $table->integer('author_id');

                $table->integer('proposal_id');

                $table->text('content');

                $table->text('attachments')->nullable();

                $table->tinyInteger('notify');

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

        Schema::dropIfExists('private_messages');

    }

}

