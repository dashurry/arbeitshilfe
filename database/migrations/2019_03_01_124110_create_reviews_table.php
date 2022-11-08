<?php



/**

 * Class CreateReviewsTable

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

 * Class CreateReviewsTable

 */

class CreateReviewsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('reviews', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->unsigned()->index()->nullable();

            $table->integer('receiver_id');

            $table->integer('job_id');

            $table->text('feedback');

            $table->text('rating');

            $table->integer('avg_rating');

            $table->foreign('user_id')

                ->references('id')->on('users')

                ->onDelete('cascade');

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

        Schema::dropIfExists('reviews');

    }

}

