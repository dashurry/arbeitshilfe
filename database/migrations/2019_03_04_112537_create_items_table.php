<?php



/**

 * Class CreateItemsTable

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

 * Class CreateItemsTable

 */

class CreateItemsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('items', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('invoice_id')->unsigned();

            $table->integer('product_id');

            $table->integer('subscriber');

            $table->string('item_name');

            $table->double('item_price', 2);

            $table->integer('item_qty');

            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices')

                ->onUpdate('cascade')->onDelete('cascade');

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('items');

    }

}

