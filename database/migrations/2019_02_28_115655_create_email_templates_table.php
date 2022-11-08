<?php



/**

 * Class CreateEmailTemplatesTable

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

 * Class CreateEmailTemplatesTable

 */

class CreateEmailTemplatesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create(

            'email_templates',

            function (Blueprint $table) {

                $table->increments('id');

                $table->string('admin_email')->nullable();

                $table->integer('email_type_id')->nullable();

                $table->string('title');

                $table->string('subject');

                $table->text('content');

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

        Schema::dropIfExists('email_templates');

    }

}

